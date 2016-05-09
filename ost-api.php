<?php
#
#!/usr/bin/php -q
# Configuration: Enter the url and key. That is it.
#  url => URL to api/task/cron e.g #  http://yourdomain.com/support/api/tickets.json
#  key => API's Key (see admin panel on how to generate a key)
#  $data add custom required fields to the array.
#
#  Originally authored by jared@osTicket.com
#  Modified by ntozier@osTicket / tmib.net


// If 1, display things to debug.
$debug="0";

// You must configure the url and key in the array below.

$config = array(
        'url'=>'http://yourdomain.com/support/api/http.php/tickets.json',  // URL to site.tld/api/tickets.json
		'key'=>'KEYCODE'  // API Key goes here
);

		
# Fill in the data for the new ticket, this will likely come from $_POST.
# NOTE: your variable names in osT are case sensiTive. 
# So when adding custom lists or fields make sure you use the same case
# For examples on how to do that see Agency and Site below.
$data = array(
    'name'      =>      $name,  // from name aka User/Client Name
    'email'     =>      $email,  // from email aka User/Client Email
	'subject'   =>      'Ticket Created For '.$program,  // test subject, aka Issue Summary
	'program'	=>		$program,
    'status' 	=>		$status,  // phone number aka User/Client Phone Number
    'quest' 	=>		$topicq,
	'message'   =>      'Ticket created for '.$program.' Question : -'.$topicq,  // test ticket body, aka Issue Details.
    'ip'        =>      $_SERVER['REMOTE_ADDR'], // Should be IP address of the machine thats trying to open the ticket.
	'topicId'   =>      $topicId, // the help Topic that you want to use for the ticket 
	
	'attachments' => array()
);

# more fields are available and are documented at:
# https://github.com/osTicket/osTicket-1.8/blob/develop/setup/doc/api/tickets.md

if($debug=='1') {
  print_r($data);
  die();
}

# Add in attachments here if necessary
# Note: there is something with this wrong with the file attachment here it does not work.
/* $data['attachments'][] =
array('file.txt' =>
        'data:text/plain;base64;'
            .base64_encode(file_get_contents('/file.txt')));  // replace ./file.txt with /path/to/your/test/filename.txt
 
*/
#pre-checks
function_exists('curl_version') or die('CURL support required');
function_exists('json_encode') or die('JSON support required');

#set timeout
set_time_limit(30);

#curl post
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $config['url']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_USERAGENT, 'osTicket API Client v1.8');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Expect:', 'X-API-Key: '.$config['key']));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result=curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code != 201)
    die('Unable to create ticket: '.$result);

 $ticket_id = (int) $result;

 if(isset($ticket_id) && $ticket_id!='')
 {
	 echo "Ticket Created Sucessfully";
 }else{
	 echo "Ticket not created. Try again later.";
	 
 }
 
 
# Continue onward here if necessary. $ticket_id has the ID number of the
# newly-created ticket

function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}
?>