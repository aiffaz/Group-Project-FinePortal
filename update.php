<?php
session_start();
if (isset($_GET["ID"])) {
  $user = $_GET["ID"];
require_once 'dbconfig.php';}
$result = mysqli_query($conn,"SELECT * FROM bill WHERE ID = $user");

if (mysqli_num_rows($result) > 0) {
// output data of each row
$row = mysqli_fetch_assoc($result);
$ID = $row['ID'];
$stud_id = $row['stud_id'];
$stud_name = $row['stud_name'];
$stud_prog = $row['stud_prog'];
} else {
echo "0 results";
}
mysqli_close($conn);

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

.box {
  border-radius: 5px;
  background-color: #FFFFFF;
  padding: 30px;
  width: 500px;
  margin: auto;
}

body {
  font-family: 'Poppins', sans-serif;
  background-color:#DDA0DD;
}

label{
  float: left;
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

<br><br><h1>UPDATE BILL</h1><br>
<div class="box">
  <form action="read.php" method="post">
    <label for="bill">No. Bill</label>
    <input type="text" id="bill" name="id" value="<?php echo $ID?>"><br>

    <label for="name">Full Name</label>
    <input type="text" id="name" name="stud_name" value="<?php echo $stud_name?>"><br>

    <label for="stdid">Student ID</label>
    <input type="text" id="stdid" name="stud_id" value="<?php echo $stud_id?>"><br>

    <label for="program">Program Code</label>
    <input type="text" id="program" name="stud_prog" value="<?php echo $stud_prog?>"><br>
    <center>
    <input type="submit" value="Update" class="btn btn-primary" name="updateBill">
    <input type="reset" value="Clear" class="btn btn-danger">
    </center>

    <?php
    if (isset($_POST['updateBill'])){

      $id = $_POST["ID"];
      $stud_name = $_POST["stud_name"];
      $stud_id = $_POST["stud_id"];
      $stud_prog = $_POST["stud_prog"];

    require_once "dbconfig.php";

    $sql = "UPDATE bill SET
    id = '$ID',
    stud_name = '$stud_name',
    stud_id = '$stud_id',
    stud_prog = '$stud_prog',
    WHERE id = '$ID'";

    if (mysqli_query($conn, $sql)) {
    echo '<script>alert("The bill is updates successfully")</script>';
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    }
    ?>
  </form>
</div>
</body>
</html>
