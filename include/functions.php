<?php

//AWESOME FUNCTION

function getUniqueToken($length = 5){
	$generation_string = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQURSTUVWXYZ_-";
	$generated_string_length = $length;
	$token = "";
	for($i=1; $i<=$generated_string_length; $i++){
	  $token .= $generation_string[rand(0, (strlen($generation_string)-1))];
	}
	return $token;
}

