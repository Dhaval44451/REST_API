<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
include('db.php');
$api_key="dhaval1234";
if ($_REQUEST['api_key'] == $api_key  &&  $_REQUEST['email']!="") {
	
	$email=$_REQUEST['email'];
    $result = mysqli_query(	
	$con,
	"SELECT * FROM `info_tbl` WHERE email='$email'");
	if(mysqli_num_rows($result)>0){	
	 $query="DELETE FROM `info_tbl` WHERE email='$email'";
	 $result1=mysqli_query($con,$query);
	 if($result1){
	 echo json_encode(array("message"=> "Record Deleted","status"=> TRUE));	
     }
 }else{
     echo json_encode(array("message"=> "Record Not found","status"=> FALSE)); 
     }
 	
}else{
	 $response3=array('response'=>'Invalid Request');
	 echo json_encode($response3); 
	}
?>