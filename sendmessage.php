<?php
require_once "dbconfig.php";

				if(isset($_POST['mobile']) && isset ($_POST['msg']))
				{
						// Your Account SID and Auth Token from twilio.com/console
						$sid = 'ACe0e5fce0095c0a36f62c3f8c78ea834f';
						$token = 'ca9db6231ca29299c6a4e57ae22f1376';

						$client = new Twilio\Rest\Client($sid, $token);
						$message = $client ->msg->create(
					
							$_POST['mobile'], array (
								 'from' =>'+19257019194',
								  'body' => $_POST['msg']
							
							)
						);	
				
					if($message->sid){
					
					echo "Message sent successfully";
					}  
				
		       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UiTM FinEPortal</title>
  <link rel="icon" href="fineportal.png" sizes="32x32" type="image/png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
h1 {
  text-align: center;
}

.header {
  overflow: hidden;
  background-color: #FFFFFF;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header a.warning {
  background-color: #FFD700;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }

  .header-right {
    float: none;
  }
}

input[type=text], select {
  width: 100%;
  padding: 10px 18px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 12px 18px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

  .box {
  border-radius: 5px;
  background-color: #FFFFFF;
  padding: 30px;
  width: 700px;
  margin: auto;
}
  
body {
  font-family: 'Poppins', sans-serif; background-color:#DDA0DD;
}

</style>
</head>
<body>
<div class="header">
  <a href="#default" class="logo">FinePortal</a>
  <div class="header-right">
    <a class="active" href="mainPage.html">Home</a>
    <a href="aboutUs.html">About Us</a>
    <a class="warning" href="logout.php">Logout</a>
  </div>
</div>

<br><br><h1>SEND SMS</h1><br>
<div class="box">

<form action="read.php" method="">
       Mobile Number:<br>
       <input type = "text" placeholder = "Mobile Number" name ="mobile">
	   
	   <br><br>
	   
	   Message/ Progress:<br>
	   <textarea  placeholder = "Message" name ="msg"></textarea> <br><br>
	   
	   <input type = "submit" value="Send" onclick="alert('Message sent successfully')";>
	   
	   </form>
       </div>