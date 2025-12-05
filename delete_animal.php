<?php
include 'connection.php';

$id = $_POST["id"];
// echo $id;

$result = $conn->query("delete from animals where ID = $id");
header('location: index.php');
?>