<?php

function insert_admins($connect, $dbname, $tablename, $name, $password, $lvl)
{
	try 
	{
		$query="INSERT INTO ".$dbname.".".$tablename." (ADM_NAME, ADM_PASSWORD, ADM_LVL) 
		VALUES (:NAME, :PASSWORD, :LVL)";

		$curseur = $connect -> prepare($query);
		//var_dump($curseur);
		// $post contient le $_POST
		$curseur -> bindValue(':NAME', $name, PDO::PARAM_STR);
		$curseur -> bindValue(':PASSWORD', md5($password), PDO::PARAM_STR);
		$curseur -> bindValue(':LVL', $lvl, PDO::PARAM_INT);
		$retour = $curseur -> execute();
		$curseur -> closeCursor();
		return true;

	}

	catch (Exception $e)
	{
		die ('Erreur de Requete' . $e -> getMessage());
		return false;
	}
}
	