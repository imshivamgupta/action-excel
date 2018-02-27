<?php
include "db_con.php";

$id = $_POST['id'];
$grComp = $_POST['grComp'];
$grInvoice = $_POST['grInvoice'];
$grDate = $_POST['grDate'];
$grAmount = $_POST['grAmount'];
$grUserId = $_POST['grUserId'];
$grUserName = $_POST['grUserName'];


//Update record
$query = "UPDATE `gr` SET `company_name`='$grComp', `invoice_no`='$grInvoice', `date`='$grDate', `amount`='$grAmount', `user_id`='$grUserId',`username`='$grUserName' WHERE `auto_key`='$id'";



if(mysqli_query($db_con,$query)){
    echo "Updated";
}else {
    echo "Error updating record: " . mysqli_error($db_con);
}

?>
