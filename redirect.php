<?php


require 'config.php';


if(!empty($_GET['token'])){
	$token = $_GET['token'];
	$query = "SELECT * FROM data WHERE token  = '$token'";
	$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1) {
			header("Location: ".mysqli_fetch_assoc($result)['url']);
		}else {
			header("HTTP/1.0 404 Not Found");
		}
}else{
	header("HTTP/1.0 404 Not Found");
}