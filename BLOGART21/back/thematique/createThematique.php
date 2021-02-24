<?


require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . '/../../util/ctrlSaisies.php';
    require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
    global $db;
    $maThematique = new THEMATIQUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {

            header("Location: ./createThematique.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libThem'])) AND !empty($_POST['libThem']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
                if ((isset($_POST['numLang'])) AND !empty($_POST['numLang'])) {
                    
                    // Saisies valides
                    $erreur = false;

                    $libThem = ctrlSaisies(($_POST['libThem']));

                    $numLang = ($_POST['numLang']);

                    $maThematique->create($libThem, $numLang);

                    header("Location: ./thematique.php");
                    
                }
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initThematique.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Thematique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Thematique</h1>
    <h2>Ajout d'une thématique</h2>

    <form method="post" action="./createThematique.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire thématique...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->
        
        <div class="control-group">
            <label class="control-label" for="thematique"><b>Thematique&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text"  id="thematique" name="thematique" size="80" maxlength="80" value="<?= $libThem; ?>" autofocus="autofocus" />
        </div>
        <div class="control-group">
            <label for="numLang">Langue :</label>  
            <select id="numLang" name="numLang"  onchange="select()"> 
                <?php 
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM LANGUE ;';
                $result = $db->query($requete);
                $allLangue = $result->fetchAll();
                foreach ($allLangue AS $langue)
                {
                ?>
                <option value="<?php echo $langue['numLang'];?>"><?php echo $langue['lib1Lang'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="controls">
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
            <br>
        </div>
    

      </fieldset>
    </form>
<?php
require_once __DIR__ . '/footerThematique.php';
require_once __DIR__ . '/footer.php';
?>
</body>
</html>