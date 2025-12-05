<?php
include "connection.php";

$nom = $_POST["nom"];
$type = $_POST["type"];
$habitat = $_POST["habitat"];
$image = $_POST["image"];

if (!empty($nom) && !empty($type) && !empty($habitat) && !empty($image)) {

    $sql = "INSERT INTO animals (Nom, Type_alimentaire, idHab, image)
            VALUES ('$nom', '$type', '$habitat', '$image')";

    $conn->query($sql);
}

header("location: index.php");
exit;
?>
