<?php
include "db_con.php";

$id = $_POST['id'];
$userId = trim($_POST['userId']);
$userName = $_POST['userName'];
$userPass = trim($_POST['userPass']);

// $query="";
// if(){

// }else{

// }


if (empty($userId) || empty($userName) || empty($userPass)) {
    echo 'You must enter a valid details' ;

} else {
    //Update record
    $query = "UPDATE `users` SET `user_id`='$userId',`name`='$userName',`password`='".md5($userPass)."' WHERE `auto_key`='$id'";

    if(mysqli_query($db_con,$query)){
        echo "Updated";
    }else {
        echo "Error updating record: " . mysqli_error($db_con);
    }

}







?>
