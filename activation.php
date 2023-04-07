<?php
if (isset($_GET['e_hash'])) {
    include_once("_sys/db_connection.php");
	$e_hash = $_GET['e_hash'];
	$sql = "SELECT * FROM user_account WHERE e_hash='$e_hash' LIMIT 1";
    $query = mysqli_query($db_connection, $sql);
	$numrows = mysqli_num_rows($query);
	if($numrows == 0){
		header("location: _msg.php?msg=Your credentials are not matching anything in our system");
    	exit();
	}
	$sql = "UPDATE user_account SET activated='1' WHERE e_hash='$e_hash' LIMIT 1";
    $query = mysqli_query($db_connection, $sql);
	
	$checksql = "SELECT * FROM user_account WHERE e_hash='$e_hash' AND activated='1' LIMIT 1";
    $checkquery = mysqli_query($db_connection, $checksql);
	$numrows = mysqli_num_rows($checkquery);
    if($numrows == 0){
		header("location: _msg.php?msg=activation_failure");
    	exit();
    } else if($numrows == 1) {
		header("location: _msg.php?msg=Account activation was successful!");
    	exit();
    }
} else {
	header("location: _msg.php?msg=missing_GET_variables");
    exit(); 
}
?>