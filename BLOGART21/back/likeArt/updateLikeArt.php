<?php
///////////////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Code Modifié - 12 Février 2021
//
//  Script  : createLikeArt.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe
require_once __DIR__ . '/../../CLASS_CRUD/likeart.class.php';
$likeart = new LIKEART();

// Init variables form
include __DIR__ . '/initLikeArt.php';
$error = null;

// Controle des saisies du formulaire
if (isset($_GET['numMemb']) && isset($_GET['numArt'])) {
    $numMemb = $_GET['numMemb'];
    $numArt = $_GET['numArt'];
    $result = $likeart->get_1LikeArt($numMemb, $numArt);
    if ($result) $likeart->createOrUpdate($numMemb, $numArt);
}
header('Location: ./likeArt.php');
?>