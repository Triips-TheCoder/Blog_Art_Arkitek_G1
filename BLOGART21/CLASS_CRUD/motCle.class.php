<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MOTCLE{
		function get_1MotCle($numMotCle){
            global $db; 
            $query = 'SELECT * FROM MOTCLE'; 
            $result = $db->query($query); 
            $allMotsCle = $result->fetchAll(); 
            return($allMotsCle);
		}

		function get_AllMotsCLe(){
			global $db;
			$query = 'SELECT * FROM MOTCLE;';
			$result = $db->query($query);
			$allMotsCle = $result->fetchAll();
			return($allMotsCle);

		}
		function get_AllMotClesByLang($numLang){
			global $db;
			$query = 'SELECT * FROM MOTCLE MC INNER JOIN LANGUE LG ON MC.numLang = LG.numLang WHERE LG.numLang = ?;';
			$result = $db->prepare($query);
			$result->execute([$numLang]);
			$allNbMotCleByIdStat = $result->fetchAll();
			return($allNbMotCleByIdStat);
	
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

        function update($numSeqCom, $numArt){

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

		function delete($numSeqCom, $numArt){

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