<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UiTM FinEPortal</title>
    <link rel="icon" href="fineportal.png" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body{
          font-family: 'Poppins', sans-serif;
          text-align: center;
          background-color:#DDA0DD;
        }
        .wrapper{
          width: 360px; padding: 20px;
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
        input[type=password], select {
          width: 100%;
          padding: 10px 18px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        .box {
          border-radius: 5px;
          background-color: #FFFFFF;
          padding: 30px;
          width: 500px;
        }

        label{
          float: left;
        }

    </style>
</head>
<body>
  <?php
  session_start();
  $message="";
  if(count($_POST)>0) {
  $conn = mysqli_connect("localhost", "root", "", "financial") or die('Unable To connect');
  $result = mysqli_query($conn,"SELECT ID, stud_id, stud_name FROM bill WHERE ID='" . $_POST["ID"] . "' and stud_id = '". $_POST["stud_id"]."'");
  $row  = mysqli_fetch_array($result);
  if(is_array($row)) {
  $_SESSION["ID"] = $row['ID'];
  $_SESSION["stud_id"] = $row['stud_id'];
  $_SESSION["stud_name"] = $row['stud_name'];
  } else {
  $message = "Invalid Username or Password!";
  }
  }
  if(isset($_SESSION["stud_name"]) || isset($_SESSION["stud_id"])) {
  header("Location:mainPage.html");
  }
  ?>
  <center>
        <h1>Login</h1>
        <hr>
        <p>Please fill in your credentials to login.</p>

        <div class="box">
          <form action="" method="post">
            <label for="user">Username</label>
            <input type="text" id="username" name="ID" placeholder="Username.."><br>

            <label for="pws">Password</label>
            <input type="password" id="pws" name="stud_id" placeholder="Password.."><br>

            <input type="submit" value="Login" class="btn btn-primary">
            <input type="reset" value="Clear" class="btn btn-danger">
          </form>
        </div>
  </center>
</body>
</html>
