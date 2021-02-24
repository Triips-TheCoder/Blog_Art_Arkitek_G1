<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class THEMATIQUE{
		function get_1Thematique(){

		}

		function get_AllThematiques(){
			global $db;
			$query = 'SELECT * FROM THEMATIQUE;';
			$result = $db->query($query);
			$allThematiques = $result->fetchAll();
			return($allThematiques);

		}
		function get_AllThematiquesByLang($numLang){
			global $db;
			$query = $db->prepare('SELECT * FROM thematique WHERE numLang = :numLang');
			$query->execute([
				'numLang' => $numLang
			]);
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			return ($result);
		}
	
		
		function create($libThem, $numLang){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO THEMATIQUE (libThem, numLang) VALUES (?,?);';
			  $result = $db->prepare($requete);
			  $result->execute(array($libThem, $numLang));

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert THEMATIQUE : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

        function update(){

        try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur update COMMENT : ' . $e->getMessage());
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