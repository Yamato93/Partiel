<?php

function update($connect, $dbname, $tablename, $colname, $id, $datapost)
{
	try
	{
			$info = array(
				"Le nom de la function : ".__FUNCTION__,
				"Le nom du document : ".__FILE__,
				"Le numero de la ligne : ".__LINE__);
			
			$column_name = "SELECT 
								COLUMN_NAME
							FROM  
								information_schema.columns
							WHERE  
								table_name = '".$tablename."'";
								
			$curseur = $connect -> prepare($column_name);
			$curseur -> execute();
			$retour = $curseur -> fetchAll(PDO::FETCH_ASSOC);
			$curseur ->closeCursor();
			$y = 0;
			foreach($retour as $key => $value)
			{
				foreach($value as $key => $value1)
				{
					$datatables[$y]=$value1;
				}
				$y++;
			}
			$combine = array_combine($datatables, $datapost);
			
			/*
			echo "<pre>";
			print_r($combine);
			echo "</pre>";
			die();
			*/
			
			$query = "SELECT *
						FROM ".$dbname.".".$tablename."
						WHERE ".$colname." = :ID";
						
			$curseur = $connect -> prepare($query);
			$curseur -> bindValue(":ID", $id, PDO::PARAM_STR);
			$curseur -> execute();
			$data_id = $curseur -> fetchAll(PDO::FETCH_OBJ);
			$curseur ->closeCursor();	
			
			if(count($data_id) >= 1)
			{
			
				$info = array(
				"Le nom de la function : ".__FUNCTION__,
				"Le nom du document : ".__FILE__,
				"Le numero de la ligne : ".__LINE__);
				
				$query2 = "UPDATE ".$dbname.".".$tablename." SET";
				$compteur = count($combine);
				$y=1;
				foreach ($combine as $value => $key)
				{
					
					$query2 .= " ".$value." = '".$key."'";
					if($y < $compteur)
					{
						$query2 .= ",";
					}
					$y++;
				}
						
				$query2 .= " WHERE ".$colname." = ".$id;

				$curseur = $connect -> exec($query2);				
				$debug_tableau = array($info ,$query2);
				$_SESSION["requetes"] = $debug_tableau;	
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