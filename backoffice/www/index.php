<?php
	header('Content-type: text/html; charset=UTF-8'); 
	define('BACKOFFICE', true);
	include_once("../../app/config/param.inc.php");
	include_once("../../app/config/connect.bdd.php");
	include_once("../../core/function/function_start_session.php");
	my_session_start(SESSION_NAME);
	
	$debug = array();
	$_SESSION["requetes"] = array();
	
	
	
	$connect = cnx_site_local( 'pdo' );
	// DOSSIER
	if(isset($_GET["module"]))
	{
		$module = $_GET["module"];
	}
	else
	{
		$module = "login";
	}
	//PAGE
	if(isset($_GET["action"]))
	{
		$action = $_GET["action"];
	}
	else
	{
		$action = "logpage";
	}
	
	$url = "../app/controller/".$module."/".$action.".contr.php";
		
			
	if(file_exists($url))
	{
		include($url);
	}
	else
	{
		include_once("../app/controller/others/404.contr.php");
	}
	include_once("../../core/function/function_debug_status.php");
?>