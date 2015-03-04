<?php 
/**
 * Dispatcher for ajax
 *
 */
	//INCLUDE
	include_once("../app/config/param.inc.php");
	include_once("../app/config/connect.bdd.php");
	include_once("../core/function/function_start_session.php");

	//START SESSION
	my_session_start(SESSION_NAME);

	//CONNEXION TO THE DATA BASE
	$connect = cnx_site_local( 'pdo' );

	// DOSSIER
	if(isset($_GET["module"]))
	{
		$module = $_GET["module"];
	}
	else
	{
		return false;
	}
	//PAGE
	if(isset($_GET["action"]))
	{
		$action = $_GET["action"];
	}
	else
	{
		return false;
	}

	
	$url = "../app/controller/".$module."/".$action.".contr.php";

	if(file_exists($url))
	{		
		include($url);
	}
	else
	{
		return false ;
	}
?>