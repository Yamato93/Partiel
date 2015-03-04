<?php

function select_everything($connect, $dbname, $tablename ,$order_by = null, $order = null, $limit = null, $offset = null)
{
	try
	{
		//echo "Le nom de la function : ".__FUNCTION__." / Le nom du document : ".__FILE__." / Le numero de la ligne : ".__LINE__;
			$info = array(
				"Le nom de la function : ".__FUNCTION__,
				"Le nom du document : ".__FILE__,
				"Le numero de la ligne : ".__LINE__);
				
			$query = "SELECT *
						FROM ".$dbname.".".$tablename;
						
			if($order_by != null and $order != null)
			{
				$query .= " ORDER BY $order_by $order";
			}
			if($limit != null)
			{
				$query .= " LIMIT $limit";
			}
			if($offset != null)
			{
				$query .= " OFFSET $offset";
			}
			
			$curseur = $connect -> prepare($query);
			$curseur -> execute();
			$retour = $curseur -> fetchAll(PDO::FETCH_OBJ);
			$curseur ->closeCursor();
			$debug_tableau = array($info ,$query);
			$_SESSION["requetes"] = $query;	
			return $retour;
    }
    catch ( Exception $e ) 
	{
	   die('Erreur Mysql : '.$e->getMessage());
	}
		
}
