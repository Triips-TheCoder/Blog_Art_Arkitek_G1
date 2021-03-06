<?
/////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : article.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
global $db; 
$monArticle = new ARTICLE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
    <table class='table-bordered' = '3' bgcolor = 'aliceblue'>
    <thead>
        <tr>
            <th>&nbsp;numArt&nbsp;</th>
            <th>&nbsp;libTitrArt&nbsp;</th>
            <th>&nbsp;libChapoArt&nbsp;</th>
            <th>&nbsp;libAccrochArt&nbsp;</th>
            <th>&nbsp;parag1Art&nbsp;</th>
            <th>&nbsp;libSsTitr1Art&nbsp;</th>
            <th>&nbsp;parag2Art&nbsp;</th>
            <th>&nbsp;libSsTitr2Art&nbsp;</th>
            <th>&nbsp;parag3Art&nbsp;</th>
            <th>&nbsp;libConclArt&nbsp;</th>
            <th>&nbsp;urlPhotoArt&nbsp;</th>
            <th>&nbsp;numAngl&nbsp;</th>
            <th>&nbsp;numThem&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php 
    $allArticles = $monArticle -> get_AllArticles(); 
    foreach($allArticles as $ligne){ 
?>
    <tr>
    <td><h4>&nbsp;  <?php echo $ligne['numArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libTitrArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['libChapoArt'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libAccrochArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['parag1Art']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libSsTitr1Art']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo  $ligne['parag2Art'];?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libSsTitr2Art']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp;  <?php echo $ligne['parag3Art']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['libConclArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['urlPhotArt']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numAngl']; ?> &nbsp;</h4></td>
    <td><h4>&nbsp; <?php echo $ligne['numThem']; ?> &nbsp;</h4></td>
    <td><a href="./updateArticle.php?id=<?= $ligne['numArt'];?>"><i>Modifier</i></a></td>
    <td><a href="./deleteArticle.php?id=<?= $ligne['numArt'];?>"><i>Supprimer</i></a></td>
    </tr>
    

<?php
    }
?> 
    </tbody> 
    </table>
<?php 
require_once __DIR__ . '/footerArticle.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
