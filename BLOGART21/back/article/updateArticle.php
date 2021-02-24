<?php

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe
require_once __DIR__ . '/../../CLASS_CRUD/article.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
$article = new ARTICLE();
$angle = new ANGLE();
$thematique = new THEMATIQUE();

// Init variables form
include __DIR__ . '/initArticle.php';
$error = null;
$fileName = null;
$saved = null;


// Controle des saisies du formulaire
if (isset($_GET['id'])) {
    $result = $article->get_1Article($_GET['id']);
    $libTitrArt = ctrlSaisies($result->libTitrArt);
    $libChapoArt = ctrlSaisies($result->libChapoArt);
    $libAccrochArt = ctrlSaisies($result->libAccrochArt);
    $parag1Art = ctrlSaisies($result->parag1Art);
    $libSsTitr1Art = ctrlSaisies($result->libSsTitr1Art);
    $parag2Art = ctrlSaisies($result->parag2Art);
    $libSsTitr2Art = ctrlSaisies($result->libSsTitr2Art);
    $parag3Art = ctrlSaisies($result->parag3Art);
    $libConclArt = ctrlSaisies($result->libConclArt);
    $urlPhotArt = ctrlSaisies($result->urlPhotArt);
    $selectedAngl = ctrlSaisies($result->numAngl);
    $selectedThem = ctrlSaisies($result->numThem);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            !empty($_POST['libTitrArt']) && !empty($_POST['libChapoArt']) && !empty($_POST['libAccrochArt'])
            && !empty($_POST['parag1Art']) && !empty($_POST['libSsTitr1Art']) && !empty($_POST['parag2Art'])
            && !empty($_POST['libSsTitr2Art']) && !empty($_POST['parag3Art']) && !empty($_POST['libConclArt'])
            /*&& !empty($_POST['urlPhotArt'])*/ && !empty($_POST['numAngl']) && !empty($_POST['numThem'])
        ) {
            $numArt = ctrlSaisies($_GET['id']);
            $libTitrArt = $_POST['libTitrArt'];
            $libChapoArt = $_POST['libChapoArt'];
            $libAccrochArt = $_POST['libAccrochArt'];
            $parag1Art = $_POST['parag1Art'];
            $libSsTitr1Art = $_POST['libSsTitr1Art'];
            $parag2Art = $_POST['parag2Art'];
            $libSsTitr2Art = $_POST['libSsTitr2Art'];
            $parag3Art = $_POST['parag3Art'];
            $libConclArt = $_POST['libConclArt'];
            $urlPhotArt = $saved ?: $urlPhotArt;
            $numAngl = $_POST['numAngl'];
            $numThem = $_POST['numThem'];

            if (strlen($parag1Art) >= 10 && strlen($parag2Art) >= 10 && strlen($parag3Art) >= 10) {
                // Modification effective de l'article'
                $article->update(
                    $numArt,
                    $libTitrArt,
                    $libChapoArt,
                    $libAccrochArt,
                    $parag1Art,
                    $libSsTitr1Art,
                    $parag2Art,
                    $libSsTitr2Art,
                    $parag3Art,
                    $libConclArt,
                    $urlPhotArt,
                    $numAngl,
                    $numThem
                );
                header('Location: ./article.php');
            } else {
                $error = 'La longueur minimale des paragraphes est de 1000 caractères';
            }
        } else if (!empty($_POST['Submit']) && $_POST['Submit'] === 'Initialiser') {
            header('Location: ./updateArticle.php?id=' . $_GET['id']);
        } else {
            $error = 'Merci de renseigner tous les champs du formulaire.';
        }
    }
}

$perpectives = $angle->get_AllAngles();
$thematics = $thematique->get_AllThematiques();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container">
        <div class="d-flex flex-column">
            <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
            <hr>

            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <h2>Modification d'un article</h2>

                    <?php if ($error) : ?>
                        <div class="alert alert-danger"><?= $error ?: '' ?></div>
                    <?php endif ?>

                    <form class="form" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ?: '' ?>" />

                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                <label for="libTitrArt"><b>Titre de l'article</b></label>
                                <input class="form-control" type="text" name="libTitrArt" id="libTitrArt" maxlength="100" value="<?= $libTitrArt ?>" placeholder="Un bon titre putaclic" autofocus="autofocus" />
                            </div>
                            <!-- <div class="form-group mb-3 col-6">
                                <label for="urlPhotArt"><b>URL de l'image</b></label>
                                <input class="form-control" type="url" name="urlPhotArt" id="urlPhotArt" maxlength="100" value="<?= $urlPhotArt ?>" placeholder="https://www.example.com/"/>
                            </div> -->
                            <div class="form-group mb-3 col-6">
                                <label for="urlPhotArt"><b>Image :</b></label>
                                <input type="file" class="form-control" name="urlPhotArt">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="libChapoArt"><b>Chapeau</b></label>
                            <textarea class="form-control" type="text" name="libChapoArt" id="libChapoArt" cols="30" rows="2" maxlength="500" placeholder="Chapeau vert (car je suis plein d'ideés)"><?= $libChapoArt ?></textarea>
                            <span class="pull-right label label-default" id="count_message" style="background-color: smoke; margin-top: -20px; margin-right: 5px;"></span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="libAccrochArt"><b>Accroche</b></label>
                            <input class="form-control" type="text" name="libAccrochArt" id="libAccrochArt" maxlength="100" value="<?= $libAccrochArt ?>" placeholder="Une super accroche" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="libSsTitr1Art"><b>Paragraphe 1</b></label>
                            <input class="form-control" type="text" name="libSsTitr1Art" id="libSsTitr1Art" maxlength="100" value="<?= $libSsTitr1Art ?>" placeholder="Titre 1er article" />
                            <textarea class="form-control" type="text" name="parag1Art" id="parag1Art" cols="30" rows="3" maxlength="1200" placeholder="Premièrement..."><?= $parag1Art ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="libSsTitr2Art"><b>Paragraphe 2</b></label>
                            <input class="form-control" type="text" name="libSsTitr2Art" id="libSsTitr2Art" maxlength="100" value="<?= $libSsTitr2Art ?>" placeholder="Titre 2eme article" />
                            <textarea class="form-control" type="text" name="parag2Art" id="parag2Art" cols="30" rows="3" maxlength="1200" placeholder="Ensuite..."><?= $parag2Art ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="parag3Art"><b>Paragraphe 3</b></label>
                            <textarea class="form-control" type="text" name="parag3Art" id="parag3Art" cols="30" rows="3" maxlength="1200" placeholder="Dans ce troisième paragraphe..."><?= $parag3Art ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="libConclArt"><b>Conclusion</b></label>
                            <textarea class="form-control" type="text" name="libConclArt" id="libConclArt" cols="30" rows="2" maxlength="800" placeholder="En conclusion..."><?= $libConclArt ?></textarea>
                        </div>

                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                <label for="numAngl"><b>Angle :</b></label>
                                <select name="numAngl" class="form-control" id="numAngl">
                                <option value="" selected disabled hidden>--Sélectionner un angle--</option>
                                    <?php 
                                    global $db;
                                    $requete = 'SELECT * FROM ANGLE ;';
                                    $result = $db->query($requete);
                                    $allAngles = $result->fetchAll();
                                    foreach ($allAngles AS $row)
                                    {
                                    ?>
                                    <option value="<?php echo $row['numAngl'];?>"><?php echo $row['libAngl'];?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="numThem"><b>Thématique :</b></label>
                                <select name="numThem" class="form-control" id="numThem">
                                <option value="">--Choississez une thématique--</option>
                                    <?php 
                                    global $db;
                                    $requete = 'SELECT * FROM THEMATIQUE ;';
                                    $result = $db->query($requete);
                                    $allThematiques = $result->fetchAll();
                                    foreach ($allThematiques AS $row)
                                    {
                                    ?>
                                    <option value="<?php echo $row['numThem'];?>"><?php echo $row['libThem'];?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Initialiser" name="Submit" class="btn btn-primary" />
                            <input type="submit" value="Valider" name="Submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>

            <?php
            require_once __DIR__ . '/footerArticle.php';

            require_once __DIR__ . '/footer.php';
            ?>
        </div>
    </main>

</body>

</html>