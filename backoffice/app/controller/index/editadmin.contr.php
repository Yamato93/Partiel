<?php

include_once("../../core/function/function_update.php");
foreach($_SESSION['listadmin'] as $key => $value)
{
	if($value->ADM_ID == $_GET['id'])
	{
		$_SESSION['infoedit'] = $value;
	}
}

if($_SESSION['infoedit']->ADM_PASSWORD != $_POST['pwd'])
{
	$_POST['pwd'] = md5($_POST['pwd']);
}

$datamerge = array_merge(array('id' => $_GET['id']), $_POST);



if(update($connect, BASE, "DT_ADMIN", "ADM_ID", $_GET['id'], array_values($datamerge)))
{
	header('location:index.php?module=index&action=index&message=editok');
	exit;
}
else
{
	header('location:index.php?module=index&action=index&message=editnook');
	exit;
}