<?
	// CRUD USER (ETUD)

	require_once __DIR__ . '../../CONNECT/database.php';

	class USER{
		function get_1User($pseudoUser, $passUser){
			global $db; 
			$query = 'SELECT * FROM USER (pseudoUser,passUser) VALUES (?);'; 
			$result = $db->query($query); 
			$user = $result->fetch(); 
			return($user); 	

		}

		function get_AllUsers(){
			global $db; 
			$query = 'SELECT * FROM USER;';
			$result = $db->query($query); 
			$allUsers = $result->fetchAll(); 
			return($allUsers); 

		}

		function get_ExistPseudo($pseudoUser) {


		}

		function get_AllUsersByStat(){


		}

		function get_NbAllUsersByidStat($idStat){


		}

		function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
			try {
          $db->beginTransaction();
				$query ='INSERT INTO USER (pseudoUser, passUser, nomUser, prenomUser, emailUser, idStat) VALUES (?, ?, ?, ?, ?, ?);';
				$request = $db->prepare($query); 
				$request->execute([$pseudoUser, $passUser,$nomUser,$prenomUser,$emailUser,$idStat]); 
				$db->commit();
				$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur insert USER : ' . $e->getMessage());
			}
		}

		function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
      try {
          $db->beginTransaction();



					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur update USER : ' . $e->getMessage());
			}
		}

		function delete($pseudoUser, $passUser){
			global $db;
      try {
          $db->beginTransaction();


					$db->commit();
					$request->closeCursor();
			}
			catch (PDOException $e) {
					$db->rollBack();
					$request->closeCursor();
					die('Erreur delete USER : ' . $e->getMessage());
			}
		}

	}	// End of class
