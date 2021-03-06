<?php
require_once __DIR__ . '../../CONNECT/database.php';
class MEMBRE{
    function get_AllMembres()
	{
		global $db;
		$query = $db->query('SELECT * FROM membre');
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}

    function get_1Membre($numMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE numMemb = ?';

		$request = $db->prepare($query);
	
		$request->execute(array($numMemb));
	
		$result = $request->fetch();
	
		$request->closeCursor();
		return ($result);
    }

    function get_AllMembreByStatut($idStat){
        global $db;

        $query = 'SELECT * FROM membre WHERE idStat = ?';

        $request = $db->prepare($query);

        $request->execute(array($idStat));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresWithStatut(){
        global $db;

        $query = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat';

        $request = $db->prepare($query);

        $request->execute();

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_1MembreWithStatut($numMemb){
        global $db;

        $query = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat WHERE numMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($numMemb));

        $result = $request->fetch();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByMail($eMailMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE eMailMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($eMailMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByPseudo($pseudoMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE pseudoMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($pseudoMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }
    function get_ExistPseudo($pseudoMemb){
        global $db;
        $query = 'SELECT * FROM membre WHERE pseudoMemb = ?;'; 
        $result = $db->prepare($query); 
        $result->execute([$pseudoMemb]); 
        return($result->rowCount());
    }
    function get_AllMembresByNom($nomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE nomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($nomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

    function get_AllMembresByPrenom($prenomMemb){
        global $db;

        $query = 'SELECT * FROM membre WHERE prenomMemb = ?';

        $request = $db->prepare($query);

        $request->execute(array($prenomMemb));

        $result = $request->fetchAll();

        $request->closeCursor();
        return ($result);
    }

	function create($prenomMemb, $nomMemb, $pseudoMemb, $eMail1Memb, $dtCreMemb, $pass1Memb, $souvenirMemb, $accordMemb, $idStat)
	{
		global $db;
		try {
			$db->beginTransaction();
			$query = $db->prepare('INSERT INTO membre (prenomMemb, nomMemb, pseudoMemb, eMailMemb, passMemb, dtCreaMemb, souvenirMemb, accordMemb, idStat) VALUES (:prenomMemb, :nomMemb, :pseudoMemb, :eMailMemb, :passMemb, :dtCreaMemb, :souvenirMemb, :accordMemb, :idStat)');
			$query->execute([
				'prenomMemb' => $prenomMemb,
				'nomMemb' => $nomMemb,
				'pseudoMemb' => $pseudoMemb,
				'eMailMemb' => $eMail1Memb,
				'passMemb' => $pass1Memb,
				'dtCreaMemb' => date("Y-m-d H:i:s"),
                'souvenirMemb' => $souvenirMemb,
                'accordMemb' => $accordMemb,
                'idStat'=>$idStat
			]);
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			$db->rollBack();
			$query->closeCursor();
			die('Erreur create MEMBRE : ' . $e->getMessage());
		}
	}

    function update($numMemb, $prenomMemb, $nomMemb, $pseudoMemb, $eMailMemb, $passMemb, $idStat)
	{
		global $db;
		try {
			$db->beginTransaction();
			$query = $db->prepare('UPDATE membre SET prenomMemb=:prenomMemb, nomMemb=:nomMemb, pseudoMemb=:pseudoMemb, eMailMemb=:eMailMemb, passMemb=:passMemb, idStat = :idStat WHERE numMemb=:numMemb');
			$query->execute([
				'numMemb' => $numMemb,
				'prenomMemb' => $prenomMemb,
				'nomMemb' => $nomMemb,
				'pseudoMemb' => $pseudoMemb,
				'eMailMemb' => $eMailMemb,
				'passMemb' => $passMemb,
                'idStat' => $idStat
			]);
			$db->commit();
			$query->closeCursor();
		} catch (PDOException $e) {
			$db->rollBack();
			$query->closeCursor();
			die('Erreur update MEMBRE : ' . $e->getMessage());
		}
	}


    function delete($numMemb){
        global $db;
        try {
            $query = "DELETE FROM membre WHERE numMemb = ?";

              $db->beginTransaction();

            $request = $db->prepare($query);

            $request->execute(array($numMemb));

            $db->commit();
            $request->closeCursor();

        }
        catch (PDOException $e) {
                die('Erreur delete MEMBRE : ' . $e->getMessage());
                $db->rollBack();
                $request->closeCursor();
        }
    }
}