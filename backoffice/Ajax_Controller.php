<?php
test
if(isset($_GET['module']))
{
	$module = ucfirst($_GET['module']);
}
else
{
	$module = "Page";
}

$urlController = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'controller/' . $module . 'Controller.php';

if(!file_exists($urlController))
{
	$module = "Page";
	$urlController = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'controller/' . $module . 'Controller.php';
}

//Chargement du moteur d'affichage de vues
include_once('../core/CoreView.php');

//Chargement de coreController
include_once('../core/CoreController.php');

//Chargement de coreModel
include_once('../core/CoreModel.php');

//Chargement du Controller
include_once('controller/' . $module . 'Controller.php');

//Lancement du module
$controller = $module . 'Controller';
new $controller();


/**
* Action Ajax de traitement de POST
**/

public function formAjax(){
	if (isset($_POST["ajax1"])) {
		$flux = array (
					"Field1" => $_POST["ajax1"],
					"Field2" => $_POST["ajax2"],
					"Retour" => "Field1 = " . $_POST["ajax1"] . " -- Field2 = " . $_POST["ajax2"])
		echo json_encode($flux);
	}
}
