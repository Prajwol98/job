<?php
include_once("../_sys/check_login_status.php");
include_once("../phpmailer.php");
if($user_ok != true || $log_email == "") {
	exit();
}
?><?php
if(isset($_POST['jobid']) && isset($_POST['userhash'])){
	$jobid =  $_POST['jobid'];
	$userhash = $_POST['userhash'];
	$emailtext = $_POST['emailtext'];
	$emailtext = str_replace("&amp;","&",$emailtext);
	$emailtext = stripslashes($emailtext);
	$emailtext = htmlspecialchars($emailtext);
	$emailtext = mysqli_real_escape_string($db_connection, $emailtext);
	$email_text = html_entity_decode($emailtext);
	
	$mysql = "SELECT email FROM user_account WHERE e_hash='$userhash' LIMIT 1";
	$mysql1 = "select company_name from company_profile where e_hash='$log_email'";
	$_query = mysqli_query($db_connection, $mysql);
	$query1 = mysqli_query($db_connection, $mysql1);
	while ($row = mysqli_fetch_array($_query, MYSQLI_ASSOC)) {
		$email = $row["email"];
	}
	while($row1 = mysqli_fetch_assoc($query1)){
		$comapany_name = $row1["company_name"];
	}
	$customMailer = new CustomMailer();
    $subject = $comapany_name." Candidate Acceptance Letter";
    $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>';
    $message .= '<p style="padding:10px;background-color: rgb(217, 226, 245);">'.$email_text.'</p>';
	$message .= '</body></html>';
	$customMailer->sendMail($email, $subject, $message);			
	echo "email_sent";	
}
?>