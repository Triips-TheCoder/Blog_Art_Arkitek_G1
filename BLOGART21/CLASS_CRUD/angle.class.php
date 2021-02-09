<?
require_once __DIR__ . '../../CONNECT/database.php';

class ANGLE {
    function get_1Article($numAngl){
        global $db; 
        $query = 'SELECT * FROM ANGLE (numAngl) VALUES (?);'; 
        $result = $db->query($query); 
        $angle = $result->fetch(); 
        return($angle); 

    }

    function get_AllAngles(){
        global $db; 
        $query = 'SELECT * FROM ANGLE;'; 
        $result = $db->query($query);
        $allAngles = $result->fetchAll(); 
        return($allAngles); 
    }

    function get_AllAnglesByLang($numLang){
        global $db;
        $query = 'SELECT * FROM ANGLE AN INNER JOIN LANGUE LG ON AN.numLang = LG.numLang WHERE LG.numLang = ?;';
        $result = $db->prepare($query);
        $result->execute([$numLang]);
        $allNbAnglesByIdStat = $result->fetchAll();
        return($allNbAnglesByIdStat);

    }
    function create($numAngl,$libAngl,$numLang){
        try {
            $db->beginTransaction(); 
            $query = 'INSERT INTO ANGLE (numAngl, libAngl, numLang) VALUES (?, ?, ?);'; 
            $request = $db->prepare($query);
            $request->execute([$numAngl, $libAngl, $numLang]);
            $db->commit(); 
            $request->closeCursor(); 
        }
        catch (PDOException $e){
            $db->rollBack();
            $request->closeCursor();
            die('Erreur insert ANGLE : ' . $e->getMessage());
        }
    }
    
    function update($numAngl, $libAngl, $numLang){
        try {
            $db->beginTransaction(); 
            $db->commit(); 
            $request->closeCurosr(); 
        }
        catch(PDOException $e){
            $db->rollBack(); 
            $request->closeCursor(); 
            die('Erreur insert ANGLE : ' . $e->getMessage()); 
        }
    }

    
    function delete($numAngl, $libAngl, $numLang){

        try {
      $db->beginTransaction();



                $db->commit();
                $request->closeCursor();

        }
        catch (PDOException $e) {
                $db->rollBack();
                $request->closeCursor();
                die('Erreur delete ANGLE : ' . $e->getMessage());
        }
    }
}