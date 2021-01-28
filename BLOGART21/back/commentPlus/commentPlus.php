<?
/////////////////////////////////////////////////////
//
//  CRUD COMMENTPLUS (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : commentPlus.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/commentPLus.class.php'; 
global $db; 
$monCommentPlus = new COMMENTPLUS;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire Plus</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Commentaire Plus</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numSeqCom&nbsp;</th>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;numSeqComR&nbsp;</th>
            <th>&nbsp;numArtR&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allCommentsPlus = $monCommentPlus -> get_AllCommentsPlus(); 
    foreach($allCommentsPlus as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numSeqCom']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['numSeqComR'];?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['numArtR']; ?> &nbsp;</h4></td>
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