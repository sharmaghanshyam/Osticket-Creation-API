<?php 
/*
	Author : Ghanshyam Sharma
	Created On : 01-05-2016
	Purpose : API to ticket creation


*/
error_reporting(0);
$domain='http://yourdomain.com/support/';

if($_POST){
$token = '55941bf02fb567124c66e4561d247051a6e59775'; // __CSRFToken__
$a ='open'; // hidden a
$topicId = '1'; // hidden topicId
$email = $_POST['email']; // Email = 161a74037808c8cc
$name = $_POST['name']; // Name = 2d247057c5ca795d
$program = $_POST['program']; // Program = 413ba874292bbf99[]
$status =$_POST['status']; // Status = bcd8d9dc418d2aec[]   Numeric
$topicq = $_POST['topicques']; // Topic question = 1dea7a8c0d685fdc
$message = 'Ticket details'; // Message = message


include('ost-api.php');

}
?>



<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 -->
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
		<script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
		<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>

  
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

   <link href="https://eonasdan.github.io/bootstrap-datetimepicker/css/base.css" rel="stylesheet">
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

  
  
</head>
<body>
<div class="container">


<div class="row">
  <div class="col-sm-6">
<form id="ticketForm" class="form-signin" method="post" action="" enctype="multipart/form-data">
  
    <h2 class="form-signin-heading">Ticket Details</h3>


	<label for="a4a27abe710b3bb7" class="required">  Email Address:</label>
        <input type="text"  id="email" size="40" maxlength="64" class="form-control" placeholder="Email address" name="email" value=""/>
             
    <label for="2a3fdbd78988d035" class="required">  Full Name:</label>
                    
        <input type="text" id="name"     size="40" maxlength="64" class="form-control" placeholder="Full Name"  name="name"  value=""/>
    <label for="1df56123d76ffd96" class="required">            Program:</label>
                    <select name="program"  id="program" class="form-control"  >
                        <option value="">&mdash; Select &mdash;</option>
                            <option value="BHSc" >BHSc</option>
                            <option value="Global Health" >Global Health</option>
                            <option value="HRM" >HRM</option>
                            <option value="Medicine" >Medicine</option>
                            <option value="Midwifery" >Midwifery</option>
                            <option value="Nursing" >Nursing</option>
                            <option value="Occupational Therapy" >Occupational Therapy</option>
                            <option value="Physician Assistant" >Physician Assistant</option>
                            <option value="Physiotherapy" >Physiotherapy</option>
                            <option value="Rehabilitation" >Rehabilitation</option>
                    </select>
                                    
       <label for="b67fb2ae68bdaf52" class="">
                Status:</label>
                    <select name="status"  class="form-control"   id="status"     data-prompt="Select" >
                        <option value="">&mdash; Select &mdash;</option>
							<option value="a">A</option>
								<option value="b">B</option>
									<option value="c">C</option>
                         	<option value="Other">Other</option>
                    </select><br>
         			
				<label for="f5a0f5d1274c0c11" >          What is your topic or question? :</label>
                    
        <input type="text"  id="topicques"  size="16" maxlength="30" class="form-control" placeholder="Topic Or Question"   name="topicques" value=""/>
        
		
		  
<hr/>
  <p style="text-align:center;">
        <input type="submit" class="btn" style="background-color:rgba(122,0,60,1);color:#FFF;" value="Create Ticket">
        <input type="reset" name="reset" class="btn" style="background-color:grey!important;color:#FFF;" value="Reset">
    </p>
</form>
</div>

</div></div>

</body>
</html>