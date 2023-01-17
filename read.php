<?php
session_start();
require_once 'dbconfig.php';
$result = mysqli_query($conn,"SELECT * FROM bill");
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
  width: 1000px;
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

<br><br><h1>LIST STUDENT'S BILL</h1><br>
<div class="box">
    <table align="center" border="1">

    <tr>
      <td>Bill ID</td>
      <td>Student Name</td>
      <td>Student ID</td>
      <td>Program Code</td>
      <td align="center">Action</td>
    </tr>
  <?php
  if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
  ?>
  <tr style="text-align: center">
    <td><?php echo $row["ID"] ?></td>
    <td><?php echo $row["stud_name"] ?></td>
    <td><?php echo $row["stud_id"] ?></td>
    <td><?php echo $row["stud_prog"] ?></td>
    <td>
      <a href="update.php?ID=<?php echo $row["ID"] ?>" class="btn btn-primary">Update</a>
      <a href="delete.php?ID=<?php echo $row["ID"] ?>" class="btn btn-danger" onclick="alert('Deleted successfully')";>Delete</a>
      <a href="sendmessage.php" class="btn btn-info">Send Message</a>
    </td>
  </tr>
  <?php
    $i++;
    }
  ?>
  </table>
  <?php
  }
  else{
    echo "No result found";
  }
?>
</body>
</html>
