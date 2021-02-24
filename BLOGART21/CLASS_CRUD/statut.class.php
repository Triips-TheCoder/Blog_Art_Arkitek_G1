<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class STATUT{
		function get_1Statut($idStat){
			global $db;
            $query = 'SELECT * FROM STATUT WHERE idStat = ?;';
            $result = $db->prepare($query);
            $result->execute([$idStat]);
            return($result->fetch());
		}

		function get_AllStatuts(){
			global $db;
			$query = 'SELECT * FROM STATUT;';
			$result = $db->query($query);
			$allStatuts = $result->fetchAll();
			return($allStatuts);

		}

		function create($libStat){
			global $db;
			try {
          $db->beginTransaction();
				$query = 'INSERT INTO STATUT (libStat) VALUES (?);';
				$request = $db->prepare($query);
				$request->execute([$libStat]);
				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert STATUT : ' . $e->getMessage());
			}
		}

		function update($idStat, $libStat){
			global $db; 
			try {
				$db->beginTransaction();
				$query = 'UPDATE STATUT SET libStat = ? WHERE idStat = ?;';
				$request = $db->prepare($query); 
				$request->execute([$libStat, $idStat]);
				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur update STATUT : ' . $e->getMessage());
			}
		}


		function delete($idStat){
			global $db;
			try {
				$query = "DELETE FROM statut WHERE idStat = ?";
	
				$db->beginTransaction();
				 
				$request = $db->prepare($query);
	
				$request->execute(array($idStat));
	
				$db->commit();
				 $request->closeCursor();
			 } catch (PDOException $e) {
				 die('Erreur delete STATUT : ' . $e->getMessage());
				 $db->rollBack();
				 $request->closeCursor();
			 }
		}
	}	