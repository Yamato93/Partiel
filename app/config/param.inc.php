<?php
/********** **********/
/**
 ** Constantes for every document
 **/
 	/*********************
	Name for the session
	*********************/
	define('SESSION_NAME', "Discoverit_session");
	
	/***********************
	Max post per page
	***********************/
	define('MAX_PAGE', 10);
	
	/*********************
	Prefixe BDD
	*********************/
	define('PREFIX_BASE', "");
	
	$server_name = explode ( "/" , $_SERVER['REQUEST_URI']);
	$server_name = $server_name[1];
	if (($_SERVER["HTTP_HOST"] == "local.discoverit.dev") or ($_SERVER["HTTP_HOST"] == "127.0.0.1"))
	{
		/*********************
	BDD name
	*********************/
	define('BASE', "eemi_discoverit");
	}
	if (($_SERVER["HTTP_HOST"] == "localhost:8888") or ($_SERVER["HTTP_HOST"] == "127.0.0.1"))
	{
		/*********************
	BDD name
	*********************/
	define('BASE', "khauv");
	}
	else if (($_SERVER["HTTP_HOST"] == "localhost") or ($_SERVER["HTTP_HOST"] == "127.0.0.1"))
	{
		/*********************
	BDD name
	*********************/
	define('BASE', "khauv");
	}
	else if (($_SERVER["HTTP_HOST"] == "ns366377.ovh.net") && ($server_name == "khauv") )
	{
		/*********************
	BDD name
	*********************/
	define('BASE', "khauv");
	}
	else if (($_SERVER["HTTP_HOST"] == "ns366377.ovh.net") && ($server_name == "dupont") )
	{
	/*********************
	BDD name
	*********************/
	define('BASE', "dupont");
	}
	else if (($_SERVER["HTTP_HOST"] == "ns366377.ovh.net") && ($server_name == "alexandr") )
	{
		/*********************
	BDD name
	*********************/
	define('BASE', "alexandr");
	}

	/*********************
	Name for the site
	*********************/
	define('SITE_NAME', "MonExpo.com");
	
	/*********************
	SITE URL <?php echo BASE_DIR ?>
	*********************/
	define('BASE_DIR',"http://".$_SERVER["HTTP_HOST"].dirname($_SERVER['SCRIPT_NAME']));
	define('BASE_DIR_TMP', dirname($_SERVER['SCRIPT_FILENAME']));
	define('BUG_BASE_DIR', "http://".$_SERVER["HTTP_HOST"].dirname(dirname($_SERVER['SCRIPT_NAME'])));
	/*********************
	Name for the site
	*********************/
	define('COOKIE_LOG', "Login");
	define('COOKIE_PASS', "Password");
	/********************************
	var in session for being connect
	********************************/
	if((!defined('BACKOFFICE') || !BACKOFFICE))
	{
		define('CONNECT', "user_connect");
	}
	else
	{
		define('CONNECT', "admin_connect");
	}
	
/**
 ** Config localhost
 **/
	if (in_array($_SERVER['HTTP_HOST'], array('localhost', '127.0.0.1', 'local.discoverit.dev', 'localhost:8888'))) // ($_SERVER["HTTP_HOST"] == "localhost") or ($_SERVER["HTTP_HOST"] == "127.0.0.1"))
	{
		define('DEBUG', TRUE);
	}
/**
 ** Config online host
 **/
	else if ($_SERVER["HTTP_HOST"] == "ns366377.ovh.net")
	{
		define('DEBUG', FALSE);
	}
	
	if((defined('DEBUG') && DEBUG ))
	{
		//include_once("../app/debug/debug.php");
		ini_set('display_errors', 1);
		error_reporting(E_ALL & ~E_DEPRECATED);
	}
	else
	{
		ini_set('display_errors', 0);
		error_reporting(0);
	}
?>
