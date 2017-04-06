<?php
error_reporting(0);
$hostname = "59.175.144.103";
$username = "root";
$password = "ZHpark1742";
$con = mysql_connect($hostname.':3306',$username,$password);
mysql_query("set names 'utf8'"); 
mysql_select_db("zspark");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
?>