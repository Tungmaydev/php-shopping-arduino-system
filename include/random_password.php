<?php

//function random_password($len)
//{
//	
//	srand((double) microtime() * 1000000);  
//	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
//	$ret_str = "";
//	$num = strlen($chars);
//	for($i = 0; $i < $len; $i++)
//	{
//		$ret_str.= $chars[rand()%$num];
//		$ret_str.=""; 
//	}
//	return $ret_str; 
//}
//// echo random_password(8); 
//$passw = random_password(7); 


function random_password($max_length = 5){
 $text = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
 $text_length = mb_strlen($text, 'UTF-8');
 $pass = '';
 for($i=0;$i<$max_length;$i++){
 $pass .= @$text[rand(0, $text_length)];
 }
 return $pass;
 }

 $passw = random_password(5);
?>