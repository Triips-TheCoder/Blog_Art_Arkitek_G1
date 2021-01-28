<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class COMMENT{
		function get_1Comment($numSeqCom){
            global $db; 
            $query = 'SELECT * FROM COMMENT(numSeqCom) VALUES (?);'; 
            $result = $db->query($query); 
            $comment = $result->fetch(); 
            return($comment);
		}

		function get_AllComments(){
			global $db;
			$query = 'SELECT * FROM COMMENT;';
			$result = $db->query($query);
			$allComments = $result->fetchAll();
			return($allComments);

		}

		function create($libCom){

			try {
                $db->beginTransaction();
				$query = 'INSERT INTO COMMENT (libCom) VALUES (?);';
				$request = $db->prepare($query);
				$request->execute([$libCom]);
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
