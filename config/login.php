<?php

// Inialize session
session_start();

// Include database connection settings
include('db_con.php');

// Let's connect to host
// mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed,       perhaps the service is down!');
// Select the database
// mysqli_select_db($db_name) or DIE('Database name is not available!');


// Retrieve username and password from database according to user's input

$login = mysqli_query($db_con, "SELECT * FROM users WHERE (`name` = '" .       mysqli_real_escape_string($db_con, $_POST['email']) . "') and (`password` = '" .     mysqli_real_escape_string($db_con, md5($_POST['password'])) . "')");

// Check username and password match

 if (mysqli_num_rows($login) == 1) {
    // Set username session variable
    $_SESSION['username'] = $_POST['email'];
    if($_SESSION['username'] == "shivam@root.in"){
        // Jump to Admin Dashboard page
        header('Location: ../admin/blank.php');
    }
    else{
        //Jump to Normal Viewing Page
        header('Location: ../admin/view-gr-data.php');
    }
}
else {
    // Jump to login page
    // header('Location:career.php');
    $_SESSION['msg'] = "Sorry! Enter Valid Details";
    header('Location: ../index.php');
}

?>
