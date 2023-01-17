<?php
require_once "dbconfig.php";
$sql = "DELETE FROM bill WHERE ID='" . $_GET["ID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo ''<script>alert(Bill deleted successfully)</script>'';
} else {
    echo "Error deleting bill: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
