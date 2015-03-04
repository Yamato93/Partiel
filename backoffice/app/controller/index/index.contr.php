<?php
if(isset($_SESSION['User']))
{

include_once("../../core/function/function_select_everything.php");
include_once("../app/model/index/addadmin.model.php");

if(isset($_POST['name']))
{
	
	if(isset($_POST['pwd']))
	{
		if(!isset($_POST['lvl']))
		{
			$_POST['lvl'] = 1;
		}
		if(!insert_admins($connect, BASE, "DT_ADMIN", $_POST['name'], $_POST['pwd'], $_POST['lvl']))
		{
			echo "insert echoué";
			die();
		}
	}
}


$list = select_everything($connect, BASE, "DT_ADMIN", "ADM_ID", "ASC", $limit = null, $offset = null);

include_once("../app/view/index/index.view.php");
}
else
{
	header('location:index.php?module=login&action=logout');
	exit;
}