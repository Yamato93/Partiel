<?php
	header('Content-type: text/html; charset=UTF-8'); 
	define('BACKOFFICE', false);
	//include ("model/model.php");

	include_once("../app/config/param.inc.php");
	include_once("../app/config/connect.bdd.php");
	include_once("../core/function/function_start_session.php");
	include_once("../core/function/function_notification.php");
	include_once("../core/function/function_log.php");
	my_session_start(SESSION_NAME);
	//print_r(BASE_DIR);
	//die();
	$debug = array();
	//$_SESSION["requetes"] = array();
	
	try {
		$connect = cnx_site_local( 'pdo' );
	}
	catch(Exception $e) { 
		exit($e); 
	} 

	// DOSSIER
	if(isset($_GET["module"]))
	{
		$module = $_GET["module"];
	}
	else
	{
		$module = "index";
	}
	//PAGE
	if(isset($_GET["action"]))
	{
		$action = $_GET["action"];
	}
	else
	{
		$action = "index";
	}
	
	$url = "../app/controller/".$module."/".$action.".contr.php";

	log_call($url);

	if(file_exists($url))
	{		
		//include("../app/include/header.inc.php");

		include($url);
		
		//include("../app/include/footer.inc.php");
	}
	else
	{
		include_once("../app/controller/others/404.contr.php");
	}
	//include_once("../core/function/function_debug_status.php");
?>