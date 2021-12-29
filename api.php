<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
include('db.php');
$api_key="dhaval1234";
if ($_REQUEST['api_key'] == $api_key  && $_REQUEST['firstname']!="" && $_REQUEST['lastname']!="" && $_REQUEST['email']!="" && $_REQUEST['phone']!="" ) {

	//echo "Success";
	$firstname=addslashes($_REQUEST['firstname']);
	$lastname=addslashes($_REQUEST['lastname']);
	$email=addslashes($_REQUEST['email']);
	$phone=addslashes($_REQUEST['phone']);
	$arr=["firstname"=>$firstname,"lastname"=>$lastname,"email"=>$email,"phone"=>$phone];
	$select_sql="SELECT email,phone FROM info_tbl Where email='$email' or phone='$phone'";
	$results=mysqli_query($con, $select_sql);
    if (mysqli_num_rows($results) > 0) {
    echo json_encode(["response"=>"Email or Phone No already exists"]);	
  // output data of each row
  // while($row = mysqli_fetch_assoc($results)) {
  //    $emailid= $row["email"];
  //    $phone1=$row["phone"];
    
  // }
    }else{
  $sql = "INSERT INTO `info_tbl`(`firstname`, `lastname`, `email`, `phone`) VALUES ('$firstname','$lastname','$email','$phone');";
	if (mysqli_query($con, $sql)) {
	  array_push($arr,["response"=>"Record created successfully"]);

	  echo json_encode($arr);
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}

	
	}

	// $apikey = $_GET['api_key'];
	else{
	echo json_encode(["response"=>"Invalid Request"]);
}
?>