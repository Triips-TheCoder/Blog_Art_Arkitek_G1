<?
require_once __DIR__ . '../../CONNECT/database.php';

class ARTICLE{
    function get_1Article($numArt){
        global $db; 
        $query = 'SELECT * FROM ANGLE (numArt) VALUES (?);'; 
        $result = $db->query($query); 
        $article = $result->fetch(); 
        return($article); 
    }

    function get_AllArticles(){
        global $db;
        $query = 'SELECT * FROM ARTICLE;';
        $result = $db->query($query); 
        $allArticles = $result->fetchAll();  
        return($allArticles); 
    }

    function create($numArt, $dtCreArt, $libTitrArt, $libChapoArt, 
                    $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art,
                    $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotoArt,
                    $numAngl,$numThem){

        try {
        $db->beginTransaction();
        $query = 'INSERT INTO ARTICLE (numArt,dtCreArt,libTitrArt,libChapoArt,
                                       libAccrochArt, parag1Art, libSsTitr1Art, parag2Art,
                                       libSsTitr2Art, parag3Art, libConclArt, urlPhotoArt,
                                       numAngl, numThem) VALUES (?, ?, ?, ?,
                                                                 ?, ?, ?, ?,
                                                                 ?, ?, ?, ?,
                                                                 ?, ?);'; 
        $request = $db->prepare($query); 
        $request->execute([$numArt, $dtCreArt, $libTitrArt, $libChapoArt, 
                           $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art,
                           $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotoArt,
                           $numAngl,$numThem]); 
        $db->commit();
        $request->closeCursor();        
        }
        catch (PDOException $e) {
                $db->rollBack();
                $request->closeCursor();
                die('Erreur insert ARTICLE : ' . $e->getMessage());
        }
    }

    function update($numArt, $dtCreArt, $libTitrArt, $libChapoArt, 
                    $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art,
                    $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotoArt,
                    $numAngl,$numThem){

        try {
      $db->beginTransaction();



                $db->commit();
                $request->closeCursor();
        }
        catch (PDOException $e) {
                $db->rollBack();
                $request->closeCursor();
                die('Erreur insert ARTICLE : ' . $e->getMessage());
        }
    }

    function delete($numArt){

        try {
      $db->beginTransaction();



                $db->commit();
                $request->closeCursor();

        }
        catch (PDOException $e) {
                $db->rollBack();
                $request->closeCursor();
                die('Erreur delete ARTICLE : ' . $e->getMessage());
        }
    }
}