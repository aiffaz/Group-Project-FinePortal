<?php
session_start();

if($_SESSION["stud_name"] && $_SESSION["stud_id"]) {
	unset($_SESSION["stud_id"]);
	unset($_SESSION["stud_name"]);
	header("Location:login.php");
  exit;
}
?>
