<!DOCTYPE html>
<html lang="fr">
<?php
session_start();

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
    <header>
        <video class="absolute Backgroundvideo" autoplay muted loop playsinline style="filter: brightness(0.6);">
            <source src="../../ImageVideo/entete/videoBackground.mp4" type="video/mp4">
        </video>
<?php

include("../module/enTete.php");
include("../module/titre.php");
include("../module/formule.php");
include("../module/nettoyage.php");
include("../module/footer.php");

?>

