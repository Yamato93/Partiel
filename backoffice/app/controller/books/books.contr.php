<?php
if(isset($_SESSION['User']))
{

include_once("../../core/function/function_select_everything.php");
include_once("../app/model/index/addadmin.model.php");


$list = select_everything($connect, BASE, "DT_BOOKS", "BOOKS_ID", "ASC", $limit = null, $offset = null);

include_once("../app/view/books/books.view.php");
}
else
{
	header('location:index.php?module=login&action=logout');
	exit;
}