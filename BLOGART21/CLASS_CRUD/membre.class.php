<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class MEMBRE{
		function get_1Membre($numMemb){
            global $db; 
            $query = 'SELECT * FROM MEMBRE (numMemb) VALUES (?);'; 
            $result = $db->query($query); 
            $membre= $result->fetch($numMem); 
            return($membre); 
		}

		function get_AllMembres(){
			global $db;
			$query = 'SELECT * FROM MEMBRE;';
			$result = $db->query($query);
			$allMembres = $result->fetchAll();
			return($allMembres);

		}

		function createMembre($libsMembre){
			global $db;
			try {
          $db->beginTransaction();
				$query = 'INSERT INTO MEMBRE (libsMembre) VALUES (?);';
				$request = $db->prepare($query);
				$request->execute([$libsMembre]);
				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert MEMBRE : ' . $e->getMessage());
			}
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