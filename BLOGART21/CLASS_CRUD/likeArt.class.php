<?php
// CRUD LIKEART (ETUD)

require_once __DIR__ . '../../CONNECT/database.php';

class LIKEART
{
	function get_1LikeArt($numMemb, $numArt)
	{
		global $db;
		$query = $db->prepare("SELECT * FROM likeart WHERE numMemb=:numMemb AND numArt=:numArt");
		$query->execute([
			'numMemb' => $numMemb,
			'numArt' => $numArt
		]);
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	function get_AllLikesArt()
	{
		global $db;
		$query = $db->query('SELECT * FROM likeart');
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}

	function get_AllLikesArtByArticle($numArt)
	{
		global $db;
		$query = $db->prepare('SELECT * FROM likeart WHERE numArt = :numArt');
		$query->execute([
			'numArt' => $numArt
		]);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}

	function get_AllLikesArtByMembre($numMemb)
	{
		global $db;
		$query = $db->prepare('SELECT * FROM likeart WHERE numMemb = :numMemb');
		$query->execute([
			'numMemb' => $numMemb
		]);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		return ($result);
	}

	function createOrUpdate($numMemb, $numArt)
	{
		global $db;
		try {
			$db->beginTransaction();
			$query = $db->prepare('INSERT INTO likeart (numMemb, numArt, likeA) VALUES (:numMemb, :numArt, 1) ON DUPLICATE KEY UPDATE likeA = !likeA');
			$query->execute([
				'numMemb' => $numMemb,
				'numArt' => $numArt
			]);
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			$db->rollBack();
			$query->closeCursor();
			die('Erreur insertOrUpdate LIKEART : ' . $e->getMessage());
		}
	}
}	// End of class