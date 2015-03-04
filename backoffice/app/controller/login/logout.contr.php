<?php
include_once("../../core/function/function_signout.php");

sign_out();

header("location:index.php");
exit();