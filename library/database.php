<?php
require_once 'config.php';

@$dbConn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
//error_reportinng(0));
//@ini_set('display_error','0');

//$dbConn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
//echo"hhh";
//$dbConn = mysql_connect ("localhost","root","")or die(mysql_error());
mysql_query('SET NAMES utf8');
date_default_timezone_set('Asia/Bangkok');
mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());

function dbQuery($sql)
{
	$result = mysql_query($sql) or die(mysql_error());
	
	return $result;
}

function dbAffectedRows()
{
	global $dbConn;
	
	return mysql_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQL_NUM) {
	return mysql_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
	return mysql_fetch_assoc($result);
}

function dbFetchRow($result) 
{
	return mysql_fetch_row($result);
}

function dbFreeResult($result)
{
	return mysql_free_result($result);
}

function dbNumRows($result)
{
	return mysql_num_rows($result);
}

function dbSelect($dbName)
{
	return mysql_select_db($dbName);
}

function dbInsertId()
{
	return mysql_insert_id();
}
//@mysql_connect("localhost", "root", "") or die(mysql_error());
//@mysql_select_db("store") or die(mysql_error());
// mysql_query("SET character_set_results=utf8");
// mysql_query("SET character_set_client=utf8");
// mysql_query("SET character_set_connection=utf8")
?>