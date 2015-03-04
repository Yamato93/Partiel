<?php


	function email_validate($mail)
	{ 
		return filter_var($mail, FILTER_VALIDATE_EMAIL) && preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail); 
	}