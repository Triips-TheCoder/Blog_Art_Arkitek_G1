<?
require_once __DIR__ . '../../CONNECT/database.php';

class ARTICLE{

	function get_1Article($numArt){
		global $db;
		$query = $db->prepare("SELECT * FROM article WHERE numArt=:numArt");
		$query->execute([
			'numArt' => $numArt
		]);
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

    function get_AllArticles(){
        global $db;
        $query = 'SELECT * FROM ARTICLE;';
        $result = $db->query($query); 
        $allArticles = $result->fetchAll();  
        return($allArticles); 
    }

	function get_AllArticlesByAngle($numAngl)
    {
        global $db;

        $query = 'SELECT * FROM article WHERE numAngl = ?';

        $request = $db->prepare($query);

        $request->execute(array($numAngl));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

   	function create(
		$dtCreArt,
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
	) {
		global $db;
		require_once __DIR__ . '/getNextNumAngl.php';
		//$numAngl = getNextNumAngl($numLang);
		try {
			$db->beginTransaction();
			$query = $db->prepare(
				'INSERT INTO article (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, 
				libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numAngl, numThem)
				VALUES (:dtCreArt, :libTitrArt, :libChapoArt, :libAccrochArt, :parag1Art, :libSsTitr1Art, 
				:parag2Art, :libSsTitr2Art, :parag3Art, :libConclArt, :urlPhotArt, :numAngl, :numThem)'
			);
			$query->execute([
				'dtCreArt' => $dtCreArt,
				'libTitrArt' => $libTitrArt,
				'libChapoArt' => $libChapoArt,
				'libAccrochArt' => $libAccrochArt,
				'parag1Art' => $parag1Art,
				'libSsTitr1Art' => $libSsTitr1Art,
				'parag2Art' => $parag2Art,
				'libSsTitr2Art' => $libSsTitr2Art,
				'parag3Art' => $parag3Art,
				'libConclArt' => $libConclArt,
				'urlPhotArt' => $urlPhotArt,
				'numAngl' => $numAngl,
				'numThem' => $numThem
			]);
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			$db->rollBack();
			$query->closeCursor();
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