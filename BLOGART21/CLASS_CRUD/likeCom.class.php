<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class LIKECOM{
		function get_1LikeCom($numMemb, $numSeqCom, $numArt)
		{
			global $db;
			$query = $db->prepare("SELECT * FROM likecom WHERE numMemb=:numMemb AND numSeqCom=:numSeqCom AND numArt=:numArt");
			$query->execute([
				'numMemb' => $numMemb,
				'numSeqCom' => $numSeqCom,
				'numArt' => $numArt
			]);
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		function get_AllLikesCom(){
			global $db;
			$query = 'SELECT * FROM LIKECOM;';
			$result = $db->query($query);
			$allLikesCom = $result->fetchAll();
			return($allLikesCom);

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

	function createOrUpdate($numMemb, $numSeqCom, $numArt)
	{
		global $db;
		try {
			$db->beginTransaction();
			$query = $db->prepare('INSERT INTO likecom (numMemb, numSeqCom, numArt, likeC) VALUES (:numMemb, :numSeqCom, :numArt, 1) ON DUPLICATE KEY UPDATE likeC = !likeC');
			$query->execute([
				'numMemb' => $numMemb,
				'numSeqCom' => $numSeqCom,
				'numArt' => $numArt
			]);
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			$db->rollBack();
			$query->closeCursor();
			die('Erreur insertOrUpdate LIKECOM : ' . $e->getMessage());
		}
	}
}	