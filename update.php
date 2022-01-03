<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
include('db.php');
$api_key="dhaval1234";
if ($_REQUEST['api_key'] == $api_key  && $_REQUEST['firstname']!="" && $_REQUEST['lastname']!="" && $_REQUEST['email']!="" && $_REQUEST['phone']!="" ) {
	$firstname=addslashes($_REQUEST['firstname']);
	$lastname=addslashes($_REQUEST['lastname']);
	$email=addslashes($_REQUEST['email']);
	$phone=addslashes($_REQUEST['phone']);
	//$arr=["firstname"=>$firstname,"lastname"=>$lastname,"email"=>$email,"phone"=>$phone];
	// echo "UPDATE `info_tbl` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone' WHERE email='$email'";
	// die(); 
    $result = mysqli_query(	
	$con,
	"SELECT * FROM `info_tbl` WHERE email='$email'");
	if(mysqli_num_rows($result)>0){
	 $query="UPDATE `info_tbl` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone' WHERE email='$email'";
	 $result1=mysqli_query($con,$query);
     $response1=array('response'=>'Record Updated Successfully');
	 echo json_encode($response1); 
     }else{
     $response2=array('response'=>'NO Record Found');
	 echo json_encode($response2); 
     }
}else{
	 $response3=array('response'=>'Invalid Request');
	 echo json_encode($response3); 
	}
?>