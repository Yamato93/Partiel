<?php

	function sign_out()
	{

		session_unset();
		session_destroy();
	
		if (!setcookie(COOKIE_LOG,"",time()-3600*24*31))
		{
			die("Le cookie ne peut être enregistré !");
		}
		if (!setcookie(COOKIE_PASS,"", time()-3600*24*31))
		{
			die("Le cookie ne peut être enregistré !");
		}
		if (!setcookie(SESSION_NAME,"",time()-3600*24*31))
		{
			die("Le cookie ne peut être enregistré !");
		}

	}