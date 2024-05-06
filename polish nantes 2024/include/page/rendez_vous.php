<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
if (!isset($_SESSION['id_client'])) {

    echo '<meta http-equiv="refresh" content="0;url=../page/index.php">';

}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-black">
    
<?php

$host = "127.0.0.1:3307";
$dbname = "polish_nantes";
$username = "admin11";
$password = "ADmin11carca-";


try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}


include("../module/enTete.php");
include("../module/rendez_vous_module.php");



include("../module/footer.php");

?>
