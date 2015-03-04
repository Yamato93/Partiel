<?php

	//*****************************************************************************
	//*****************************************************************************
	//****************** Relog function (Cookie) *****************
	//*****************************************************************************
	//*****************************************************************************
	
	function relog($connect, $tablename, $logcol, $pwdcol, $logcookie, $pwdcookie, $userstatus)
	{
		if(!$userstatus)
		{
			if(isset($logcookie))
			{
				
				$query = "select * from '".$tablename."'
									where 
										'".$logcol."' = :logincookie
									and 
										'".$pwdcol."' = :passcookie";	
				
				$curseur = $connect -> prepare($query);
			$curseur -> bindValue(":logincookie", $logcookie, PDO::PARAM_STR);
			$curseur -> bindValue(":passcookie", $pwdcookie, PDO::PARAM_STR);
			
			$curseur -> execute();
			$data_user = $curseur -> fetchAll(PDO::FETCH_OBJ);
			$curseur ->closeCursor();
			
				$debug_tableau = array($info ,$query);
				$_SESSION["requetes"] = $query;		

			if(count($data_user) == 1)
			{
				$userstatus = true;
				$_SESSION["User_login"] = $logcookie;
				//header("location:index.php");
			}
			else
			{
				$userstatus = false;
				//header("location:index.php");
			}

				
		}
		catch (Exception $e)
		{
		    echo 'Message' . $e -> getMessage();
		}
	}
