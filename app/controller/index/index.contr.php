<?php

include_once("../core/function/function_select_everything.php");

$index_data = select_everything($connect, BASE, "DT_BOOKS" , "BOOKS_DATE_CREA", "DESC", 6);

//$_SESSION['requetes'] = $index_data;
include_once("../app/view/index/index.view.php");