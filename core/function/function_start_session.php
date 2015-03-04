<?php
	//*****************************************************************************
	//*****************************************************************************
	//******** Fonction afin de crée et commencer une session (page login) ********
	//*****************************************************************************
	//*****************************************************************************
	function my_session_start($name = "")
	{

		session_name($name);
		session_start();
		$_SESSION["session_connect"] = true;
		//On récupère l'adresse IP du clientn en prévoyant le cas du proxy
		//$ip = !empty($_SERVER['HHTP_X_FOR']) ? $_sSERVER
		
		$securite = $_SERVER["HTTP_USER_AGENT"];
		
		if(!isset($_SESSION["SESSION_SECU"]))
		{
			$_SESSION["SESSION_SECU"] = $securite;
			
			return true;
		}
		else
		{
			if($_SESSION["SESSION_SECU"] != $securite)
			{
				session_regenerate_id();
				$_SESSION = array();
				
				
				//Tentative de hack detruire la session
				die("alert : la session semble corrompue !");
			}
			else
			{
				// Tout va bien, retourner true
				return true;	
			}
		}
	}
?>