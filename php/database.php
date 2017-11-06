<?php
$host = "localhost";
$user = "root";
$pass = "umesi";
$dbase = "numbergame";

$cxn = mysqli_connect($host,$user,$pass,$dbase) or die(mysqli_error($cxn));
?>