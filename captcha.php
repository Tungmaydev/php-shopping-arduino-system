<?php
session_start();
include("src/jpgraph_antispam-digits.php"); 

$spam = new AntiSpam();  
$chars = $spam->Rand(4); 
$_SESSION['captcha'] = $chars;

$spam->Stroke();
?>
