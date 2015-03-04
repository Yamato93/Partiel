<?php

include_once("../../core/function/function_delete.php");

if(delete($connect, BASE, "DT_ADMIN", "ADM_ID", $_GET['del']))
{
	header('location:index.php?module=index&action=index&message=suppr-ok');
	exit;
}
else
{
	header('location:index.php?module=index&action=index&message=suppr-no-ok');
	exit;
}


	