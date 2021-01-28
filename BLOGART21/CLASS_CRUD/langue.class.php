<?
	// CRUD LANGUE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LANGUE{
		function get_1Langue($numLang){
			global $db;
		
		}

		function get_1LangueByPays($numLang){


		}

		function get_AllLangues(){
			global $db;
			$query = 'SELECT * FROM LANGUE;';
			$result = $db -> query($query); 
			$allLangues = $result -> fetchAll();
			return($allLangues); 
		}

		function get_AllLanguesByPays(){

		}

		function create($numLang, $lib1Lang, $lib2Lang, $numPays){

			try {
            $db->beginTransaction();
			$query = 'INSERT INTO LANGUE (numLang, lib1Lang, lib2Lang, numPays) VALUES (?, ?, ?, ?);'; 
			$request = $db->prepare($query); 
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays]); 
            $db->commit();
			$request->closeCursor();


					
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert LANGUE : ' . $e->getMessage());
			}
		}

		function update($numLang, $lib1Lang, $lib2Lang, $numPays){

			try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert LANGUE : ' . $e->getMessage());
			}
		}

		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numLang){

			try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();

			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur delete LANGUE : ' . $e->getMessage());
			}
		}
	}	// End of class
