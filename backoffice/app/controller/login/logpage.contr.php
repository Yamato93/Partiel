<?php

	
	include_once("../../core/function/function_signin.php");
	
	
	if(isset($_POST["login"]) && isset($_POST["pwd"]))
	{
		$login = $_POST["login"];
		$passwords = $_POST["pwd"];
		/*sign_in($connect, $dbname, $tablename, $logcol, $pwdcol, $login, $passwords, $userstatus(admin or user (info form param.inc.php))*/
		/* $dbname, $tablename, $logcol, $pwscol are for SQL request */
		if(sign_in($connect, BASE, "DT_ADMIN", "ADM_NAME", "ADM_PASSWORD", $login, $passwords, CONNECT))
		{
			header("location:index.php?module=index&action=index");
		}
		else
		{
			header("location:index.php?module=login&action=logpage");
		}
	}
	else
	{
		if(isset($_SESSION[CONNECT]) and ($_SESSION[CONNECT] != false))
		{
			include_once("../app/view/index/index.view.php");
		}
		else
		{
			include_once("../app/view/login/logpage.view.php");
		}

	}