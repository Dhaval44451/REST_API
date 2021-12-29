<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
include('db.php');
$api_key="dhaval1234";
if (isset($_REQUEST['api_key']) && addslashes($_REQUEST['api_key']) == $api_key && addslashes($_REQUEST['email'])!="") {
	$email = addslashes($_REQUEST['email']);
	$result = mysqli_query(
	$con,
	"SELECT * FROM `info_tbl` WHERE email='$email'");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$phone=$row['phone'];
	response($email, $firstname, $lastname,$phone);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($email,$firstname,$lastname,$phone){
	$response['email'] = $email;
	$response['firstname'] = $firstname;
	$response['lastname'] = $lastname;
	$response['phone'] = $phone;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>