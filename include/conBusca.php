<?php
 $host = "localhost";
 $db = "projeto";
 $user = "root";
$pass = "";


$mysqli = new  mysqli($host,$user,$pass,$db);
if($mysqli -> connect_errno) {
    die("Falha de conexão");
}
?>