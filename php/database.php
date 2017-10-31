<?php
$host = "localhost";
$user = "root";
$pass = "umesi";
$dbase = "numbergame";

//$host = "webapp-mysqldbserver-786180ec-3837.mysql.database.azure.com";
//$user = "mysqldbuser@webapp-mysqldbserver-786180ec-3837";
//$pass = "Cloud123";
//$dbase = "numbergame";

$cxn = mysqli_connect($host,$user,$pass,$dbase) or die(mysqli_error($cxn));
?>