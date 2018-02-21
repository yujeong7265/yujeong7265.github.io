<?
$host = "localhost";
$user = "dbwjd7265";
$passwd = "!72dbwjd65!";

$connect = mysql_connect($host, $user, $passwd) or die ("mysql Server Connection Error");
mysql_select_db('dbwjd22',$connect) or die ("DB Connection Error");
?>