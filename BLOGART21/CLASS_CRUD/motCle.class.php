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