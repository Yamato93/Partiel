<?php
	//*****************************************************************************
	//*****************************************************************************
	//***************************** Signin function *******************************
	//*****************************************************************************
	//*****************************************************************************
	function sign_in($connect, $dbname, $tablename, $logcol, $pwdcol, $login, $passwords, $userstatus)
	{
		try
		{
			if($userstatus == "admin_connect")
			{
				$suffix = "Back_";
			}
			if($userstatus == "user_connect")
			{
				$suffix = "Front_";
			}
			$info = array(
		"Le nom de la function : ".__FUNCTION__,
		"Le nom du document : ".__FILE__,
		"Le numero de la ligne : ".__LINE__);
	
			$query = ("SELECT 
							*
					   FROM 
					        ".$dbname.".".$tablename."
					  WHERE 
							".$logcol." = :login
						AND 
							".$pwdcol." = :pwd");		
			
			$curseur = $connect -> prepare($query);
			
			$curseur -> bindValue(":login", $login, PDO::PARAM_STR);
			$curseur -> bindValue(":pwd", md5($passwords), PDO::PARAM_STR);
			
			$curseur -> execute();
			
			$data_user = $curseur -> fetchAll(PDO::FETCH_OBJ);
			$curseur ->closeCursor();
			
				$debug_tableau = array($info ,$query);
				$_SESSION["requetes"] = $query;		

			if(count($data_user) >= 1)
			{
				$_SESSION["User"] = current($data_user);
				$_SESSION[$userstatus] = true;
				if (isset($_POST['relog']))
				{
					if(!setcookie($suffix."Login", $login,time()+3600*24*31))
					{
						die("cookie ne peut etre enregistré !");
					}
					if(!setcookie($suffix."Passwords",$passwords,time()+3600*24*31))
					{
						die("cookie ne peut etre enregistré !");
					}
				}	
	
				return true;
			}
			else
			{
				$userstatus = false;
				return false;
				//return array("Valeur" => count($se_connecter2));
			}			//var_dump($se_connecter);
		}
		catch (Exception $e)
		{
		    echo 'Message' . $e -> getMessage();
		}
	}
?>