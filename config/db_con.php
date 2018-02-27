<?php
// $hostname = "pma.terasol.in";
// $username = "action";
// $password = "fN9GRursBFCDpYUt";
// $db_name = "action";
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "repo";


// Create connection
$db_con = mysqli_connect($hostname, $username, $password, $db_name);

// Check connection
if (!$db_con) {
    die("Connection failed: " . mysqli_connect_error());

}
else{
    // mysqli_select_db($db_con, $db_name);
    // echo "Connected Successfully";
}
?>
