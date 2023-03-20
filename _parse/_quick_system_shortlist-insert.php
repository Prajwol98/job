<?php
include_once("../_sys/check_login_status.php");
if($user_ok != true || $log_email == "") {
	exit();
}
?><?php
mysqli_query($db_connection, "UPDATE job_post SET is_active='1' WHERE deadline_date < NOW()");
$job_shortlist_note = "";
$rej_note = "";
$acpt_note = "";
$sql = "SELECT * FROM job_post WHERE is_active='1'";
$queryx = mysqli_query($db_connection, $sql);
while ($row = mysqli_fetch_array($queryx, MYSQLI_ASSOC)) {
	$job_id = $row["id"];
	$job_type = $row["job_type"];
	$company_id = $row["company_id"];
	$created_date = strftime("%b %d, %Y at %I:%M %p", strtotime($row["created_date"]));
	$deadline_date = $row["deadline_date"];
	$deadline_mhs = $row["deadline_mhs"];
	$job_title = $row["job_title"];
	$job_description = $row["job_description"];
	$limit_num = $row['shortlist_limit'];
	$count = 0;
	
	$company_sql = "SELECT company_name from company_profile where e_hash='$company_id'";
	$company_result = mysqli_query($db_connection,$company_sql);
	$company_array = mysqli_fetch_assoc($company_result);
	$company_name = $company_array['company_name'];

	$j_sql = "SELECT * FROM job_post_activity WHERE job_post_id='$job_id' ORDER BY seeker_result DESC";
	$j_query = mysqli_query($db_connection, $j_sql);
	$numrows = mysqli_num_rows($j_query);
	$num_apply = floor($numrows*($limit_num/100));
	
	while($row = mysqli_fetch_assoc($j_query)){
		$job_p_id = $row["job_post_id"];
		$user = $row["e_hash"];
		$rej_note ='<h3 style="color: orange;"><u>Message From '.$company_name.'</u> </h3><br><h4 style="margin-top: 5px;color: purple;"> This message is to inform you that the system has selected the best candidate for the job '.$job_title.'. You were not matched with the job . We Suggest to keep on applying for other jobs. We appreciate you taking the time to apply for employment with our company and wish you best of luck in your future endevour.</h4>';
		$acpt_note ='<h3 style="color: orange;"><u>Message From '.$company_name.'</u> </h3><br><h4 style ="margin-top:5px;color: #3d983e;"> Congratulations! You have been shortlisted as the best candidate for the job '.$job_title.'. You will receive an email with more information, once the company approves this selection. Until then, keep your head up.</h4>';
		if($count == $num_apply){
			$sql0 ="UPDATE notifications SET note ='$rej_note' WHERE e_hash='$user' AND job_post_id='$job_p_id'";
			$query0 = mysqli_query($db_connection,$sql0);
		}
		else{
			$query = mysqli_query($db_connection, "UPDATE notifications SET note='$acpt_note' WHERE e_hash='$user' AND job_post_id='$job_p_id'");
			$count++;
		}
	}	
}
echo $job_shortlist_note;
?>