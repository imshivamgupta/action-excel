<?php
include "db_con.php";

$id = $_POST['id'];

// Delete record
$query = "UPDATE `gr` SET `status`= 0 WHERE `auto_key`=".$id;
mysqli_query($db_con,$query);

echo 1;
?>
