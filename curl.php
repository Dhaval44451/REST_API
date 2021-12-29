<?php
if (isset($_POST['email']) && $_POST['email']!="") {
	$email = $_POST['email'];
	$api_key="dhaval1234";
	$url = "http://localhost/REST_API/read.php?api_key=".$api_key."&email=".$email;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	//echo $response;
	
	$result = json_decode($response);
	// print_r($result);
	
	echo "<table>";
	echo "<tr><td>Phone:</td><td>$result->phone</td></tr>";
	echo "<tr><td>Firstname:</td><td>$result->firstname</td></tr>";
	echo "<tr><td>Lastname:</td><td>$result->lastname</td></tr>";
	echo "<tr><td>Email:</td><td>$result->email</td></tr>";
	echo "</table>";
	curl_close($client);
}
    ?>