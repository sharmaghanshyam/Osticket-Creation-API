<?php

include_once INCLUDE_DIR.'class.api.php';
include_once INCLUDE_DIR.'class.user.php';

class UserApiController extends ApiController {

// create Custom User

    function createNewUser($data){
        

        $jsonReqUrl  = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $vars = json_decode($reqjson, true);   
         
         // Try and lookup by email address
        
        $user = User::lookupByEmail($vars['email']);
        
        if (!$user) {  
            $name = $vars['name'];            

            $user = new User(array(
                'name' => Format::htmldecode(Format::sanitize($name, false)),
                'created' => new SqlFunction('NOW'),
                'updated' => new SqlFunction('NOW'),
                //XXX: Do plain create once the cause
                // of the detached emails is fixed.
                'default_email' => UserEmail::ensure($vars['email'])
            ));
            // Is there an organization registered for this domain
            list($mailbox, $domain) = explode('@', $vars['email'], 2);
            if (isset($vars['org_id']))
                $user->set('org_id', $vars['org_id']);
            elseif ($org = Organization::forDomain($domain))
                $user->setOrganization($org, false);

            try {
                $user->save(true);
                $user->emails->add($user->default_email);
                // Attach initial custom fields
                $user->addDynamicData($vars);
            }
            catch (OrmException $e) {
                return null;
            }
            $type = array('type' => 'created');
            Signal::send('object.created', $user, $type);
            Signal::send('user.created', $user);
        }
        elseif ($update) {
            $errors = array();
            $user->updateInfo($vars, $errors, true);
        }
        
        if($user == $vars['name']){
            $response["user_name"] = $vars['name'];         
            $response["status_code"] = 201;
            $response["status_msg"] = "User Created successfully";
            
        }else{
             $response["status_code"] = 500;
             $response["status_msg"] = "Try again later or contact your system administrator";
        }
        echo json_encode($response);

    }

}

?>