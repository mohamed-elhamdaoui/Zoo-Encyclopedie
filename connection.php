<?php

$host = 'localhost';
$user = 'momo';
$pass = 'momo1';
$port = 3307;
$dbname = 'zoo';

$conn = new mysqli($host , 
                    $user, 
                    $pass , 
                    $dbname,
                    $port) ;

if($conn->connect_error){
    die('Connexion Failed '.$conn->connect_error);
}




?>