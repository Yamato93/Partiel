<?php

function delete($connect, $dbname, $tablename, $colname, $id)
{
	try
	{
			$info = array(
				"Le nom de la function : ".__FUNCTION__,
				"Le nom du document : ".__FILE__,
				"Le numero de la ligne : ".__LINE__);
			
									
			$query = "SELECT *
						FROM ".$dbname.".".$tablename."
						WHERE ".$colname." = :ID";
						
			$curseur = $connect -> prepare($query);
			$curseur -> bindValue(":ID", $id, PDO::PARAM_STR);
			$curseur -> execute();
			$data_id = $curseur -> fetchAll(PDO::FETCH_OBJ);
			$curseur ->closeCursor();
			
			$debug_tableau = array($info ,$query);
			$_SESSION["requetes"] = $query;		
			
			if(count($data_id) >= 1)
			{
				$info = array(
				"Le nom de la function : ".__FUNCTION__,
				"Le nom du document : ".__FILE__,
				"Le numero de la ligne : ".__LINE__);
				
				$query2 = "DELETE FROM ".$dbname.".".$tablename." WHERE ".$colname." = ".$id;
				
				$curseur = $connect -> prepare($query2);
				// $post contient le $_POST
				$curseur -> bindParam(':suppr', $id);
			    $curseur -> execute();
				$curseur -> closeCursor();	
							
				$debug_tableau = array($info ,$query2);
				$_SESSION["requetes"] = $query2;	
				return true;
			}
			else
			{
				return false;
			}		
			
    }
    catch ( Exception $e ) 
	{
	   die('Erreur Mysql : '.$e->getMessage());
	}
		
}