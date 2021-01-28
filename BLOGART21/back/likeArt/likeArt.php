<?
/////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : likeArt.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeArt.class.php'; 
global $db; 
$monLikeArt = new LIKEART;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Art</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type='text/css'>
    body{
        color: black; 
    }
    </style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Like Art</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numMemb&nbsp;</th>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;likeA&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allLikesArt = $monLikeArt -> get_AllLikesArt(); 
    foreach($allLikesArt as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['likeA'];?> &nbsp;</h4></td>
    </tr>
    
<?php
    }
?> 
    </tbody> 
    </table>
<?php 
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
