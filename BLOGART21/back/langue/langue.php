<?
/////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : langue.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
global $db; 
$maLangue = new LANGUE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
    <table border = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numLang&nbsp;</th>
            <th>&nbsp;lib1Lang&nbsp;</th>
            <th>&nbsp;lib2Lang&nbsp;</th>
            <th>&nbsp;numPays&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allLangues = $maLangue -> get_AllLangues(); 
    foreach($allLangues as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numLang']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['lib1Lang']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['lib2Lang'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numPays']; ?> &nbsp;</h4></td>
    <td>&nbsp;<a href="./updateLangue.php?id=<?= $ligne['numLang']; ?>"><i>Modifier</i></a>&nbsp;
	<br/></td>
	<td>&nbsp;<a href="./deleteLangue.php?id=<?= $ligne['numLang']; ?>"><i>Supprimer</i></a>&nbsp;
	<br/></td>
    </tr>
<?php
    }
?> 

    </tbody> 
    </table>
    <footer>
    <br /><br /><hr />
    <h2>Créez une langue <a href="./createLangue.php">Créer une Langue</a></h2>
    </footer>
<?php 

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
