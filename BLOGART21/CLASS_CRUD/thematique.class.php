<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class THEMATIQUE{
		function get_1Thematique($numThem)
		{
			global $db;
			$queryText = 'SELECT * FROM thematique WHERE numThem = :numThem';
			$query = $db->prepare($queryText);
			$query->bindParam(':numThem', $numThem);
			$query->execute();
			$result = $query->fetch();
			$query->closeCursor();
			return ($result);
		}

		function get_AllThematiques(){
			global $db;
			$query = 'SELECT * FROM THEMATIQUE;';
			$result = $db->query($query);
			$allThematiques = $result->fetchAll();
			return($allThematiques);

		}

	function get_AllThematiquesByLang($numLang)
	{
		global $db;
		$queryText = 'SELECT * FROM thematique WHERE numLang = :numLang';
		$query = $db->prepare($queryText);
		$query->bindParam(':numLang', $numLang);
		$query->execute();
		$result = $query->fetchAll();
		$query->closeCursor();
		return ($result);
	}
	
		
	function create($numThem, $libThem, $numLang){
		global $db;
		try {
			$queryText = "INSERT INTO thematique (numThem, libThem, numLang) VALUES (:numThem, :libThem, :numLang)";
			$db->beginTransaction();
			$query = $db->prepare($queryText);
			$query->bindParam(':numThem', $numThem);
			$query->bindParam(':libThem', $libThem);
			$query->bindParam(':numLang', $numLang);
			$query->execute();
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			die('Erreur insert THEMATIQUE : ' . $e->getMessage());
			$db->rollBack();
			$query->closeCursor();
		}
	}

	function update($numThem, $libThem, $numLang){
		global $db;
		try {
			$db->beginTransaction();
			$queryText = "UPDATE thematique SET libThem = :libThem , numLang =  :numLang WHERE numThem = :numThem ";
			$query = $db->prepare($queryText);
			$query->bindParam(':numThem', $numThem);
			$query->bindParam(':libThem', $libThem);
			$query->bindParam(':numLang', $numLang);
			$query->execute();
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			die('Erreur update THEMATIQUE : ' . $e->getMessage());
			$db->rollBack();
			$query->closeCursor();
		}
	}
		function delete(){

      try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();

			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur delete COMMENT : ' . $e->getMessage());
			}
		}

	}	// End of class