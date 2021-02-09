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
			$query = 'SELECT * FROM THEMATIQUE TT INNER JOIN LANGUE LG ON TT.numLang = LG.numLang WHERE LG.numLang = ?;';
			$result = $db->prepare($query);
			$result->execute([$numLang]);
			$allThematiquesByIdStat = $result->fetchAll();
			return($allThematiquesByIdStat);
	
		}

		function create(){

			try {
                $db->beginTransaction();

				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert COMMENT : ' . $e->getMessage());
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