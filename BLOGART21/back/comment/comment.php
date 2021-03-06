<?
/////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : comment.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php'; 
global $db; 
$monComment = new COMMENT; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>
    <table class='table-bordered' border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numSeqCom&nbsp;</th>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;dtCreCom&nbsp;</th>
            <th>&nbsp;libCom&nbsp;</th>
            <th>&nbsp;attModOk&nbsp;</th>
            <th>&nbsp;affComOk&nbsp;</th>
            <th>&nbsp;notifComKOAff&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allComments = $monComment -> get_AllComments(); 
    foreach($allComments as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numSeqCom']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['dtCreCom'];?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['libCom']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['attModOK']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['affComOK'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['notifComKOAff'];?> &nbsp;</h4></td>
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
