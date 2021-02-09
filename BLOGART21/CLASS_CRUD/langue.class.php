<?
	// CRUD LANGUE (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LANGUE{
		function get_1Langue($numLang){
			global $db;
            $query = 'SELECT * FROM LANGUE WHERE numLang = ?;';
            $result = $db->prepare($query);
            $result->execute([$numLang]);
            return($result->fetch());

		}

		function get_1LangueByPays($numLang){
			global $db;

			$query = 'SELECT * FROM langue INNER JOIN pays ON langue.numPays = pays.numPays WHERE numLang = ?';

			$request = $db->prepare($query);
	
			$request->execute(array($numLang));
	
			$result = $request->fetch();
	
			$request->closeCursor();
			return ($result);
		}

		function get_AllLangues(){
			global $db;
			$query = 'SELECT * FROM LANGUE;';
			$result = $db->query($query);
			$allLangues = $result->fetchAll();
			return($allLangues);
		}

		function get_AllLanguesByPays(){
			


		}

		function create($numLang, $lib1Lang, $lib2Lang, $numPays){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO LANGUE (numLang,lib1Lang,lib2Lang,numPays) VALUES (?,?,?,?);';
			  $result = $db->prepare($requete);
			  $result->execute(array($numLang,$lib1Lang,$lib2Lang,$numPays));

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert STATUT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($numLang, $lib1Lang, $lib2Lang, $numPays){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE LANGUE SET lib1Lang = ?, lib2Lang = ?, numPays = ? WHERE numLang = ?";
				$result = $db->prepare($requete);
				$result->execute(array($lib1Lang, $lib2Lang, $numPays, $numLang));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete STATUT : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}
			
		function delete($numLang){
			global $db;
	
			try {
				$db->beginTransaction();
				$requete= "DELETE FROM LANGUE WHERE numLang = ?; ";
				$result = $db->prepare($requete);
				$result->execute([$numLang]);
				$count = $result->rowCount(); 
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete LANGUE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}
	}	// End of class