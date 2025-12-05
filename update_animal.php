<?php
include "connection.php";

$id = $_POST["id"];


$nom = $_POST["nom"];
$type = $_POST["type"];
$habitat = $_POST["habitat"];
$image = $_POST["image"];

if (!empty($nom)) {
    $sql = "update animals set nom = '$nom' where ID = $id ";

    $conn->query($sql);
}
if (!empty($type)) {
    $sql = "update animals set Type_alimentaire = '$type' where ID = $id ";
    $conn->query($sql);
}
if (!empty($habitat)) {
    $sql = "update animals set idHab = '$habitat' where ID = $id ";
    $conn->query($sql);
}
if (!empty($image)) {
    $sql = "update animals set image = '$image' where ID = $id ";
    $conn->query($sql);


    header("location: index.php");
    exit;
}
