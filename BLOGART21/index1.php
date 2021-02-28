<?
///////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - 23 Janvier 2021
//
//  Script  : index1.php 	-		BLOGART21 (Etud)
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion des CRUD</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
				div {
					padding-top: 60px;
					padding-bottom: 40px;
					margin-bottom: 0px;
					margin-left: 60px;
				}
        span {
            background-color: yellow;
        }
    </style>
</head>
<body>
	<br />
	<h1>Panneau d'Admin : Gestion des CRUD - BLOGART21</h1>
	<small><span><i>CRUD fini et valide (reste à tester et à intégrer)</i></span></small>
	<br /><hr />
	<div>
	Gestion du CRUD :
	<a href="./back/angle/angle.php"><span>Angle</span></a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/article/article.php">Article </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/comment/comment.php">Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/commentplus/commentplus.php">Réponse sur Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/langue/langue.php"><span>Langue</span></a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/likeart/likeart.php">Like Article </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/likecom/likecom.php">Like Commentaire </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/membre/membre.php">Membre </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/motcle/motcle.php">Mot-clé </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/motclearticle/motclearticle.php">Mot-clé Article </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/statut/statut.php"><span>Statut (*)</span></a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/thematique/thematique.php">Thématique </a>
	<br /><br />
	Gestion du CRUD :
	<a href="./back/user/user.php">User </a>
	</div>
	<br>
	<hr>
	<h3><i>- - Etudiants - -</i></h3>
<?
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
