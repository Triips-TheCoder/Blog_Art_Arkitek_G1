<?
/////////////////////////////////////////////////////
//
//  CRUD LIKECOM (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : likeCom.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/likeCom.class.php'; 
global $db; 
$monLikeCom = new LIKECOM;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type='text/css'>
    .error {
        padding: 2px;
        border: solid 0px black;
        color: red;
        font-style: italic;
        border-radius: 5px;
    }
    a {
    text-decoration: none; 
    }   
    
    .title {
        margin: 20px 0; 
    }
</style>
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Like Com</h1>
    <table class='table-bordered' border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numMemb&nbsp;</th>
            <th>&nbsp;numSeqCom&nbsp;</th>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;likeC&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allLikesCom = $monLikeCom -> get_AllLikesCom(); 
    foreach($allLikesCom as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numSeqCom']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['numArt'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['likeC'];?> &nbsp;</h4></td>
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
