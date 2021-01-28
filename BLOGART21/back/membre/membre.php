<?
/////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : membre.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php'; 
global $db; 
$monMembre = new MEMBRE;

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
    <h1>BLOGART21 Admin - Gestion du CRUD Membres</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numMemb&nbsp;</th>
            <th>&nbsp;prenomMemb&nbsp;</th>
            <th>&nbsp;nomMemb&nbsp;</th>
            <th>&nbsp;pseudoMemb&nbsp;</th>
            <th>&nbsp;passMemb&nbsp;</th>
            <th>&nbsp;eMailMemb&nbsp;</th>
            <th>&nbsp;dtCreaMemb&nbsp;</th>
            <th>&nbsp;souvenirMemb&nbsp;</th>
            <th>&nbsp;accordMemb&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allMembres = $monMembre -> get_AllMembres(); 
    foreach($allMembres as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['prenomMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo  $ligne['nomMemb'];?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['pseudoMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['passMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['eMailMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['dtCreaMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['souvenirMemb']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['accordMemb']; ?> &nbsp;</h4></td>
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
