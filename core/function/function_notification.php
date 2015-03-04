<?php
	//*****************************************************************************
	//*****************************************************************************
	//******** Fonctions afin d'enregistrer, et afficher les notifcations  ********
	//*****************************************************************************
	//*****************************************************************************
	// $LEVEL -> DANGER, SUCCESS
	// $CONTENT -> CONTENU
	function sessionize($level, $content)
	{
		$_SESSION['notif'] = array('level' => $level, 'content'=> $content);
	}
	function display_notification()
	{
		if (isset($_SESSION['notif'])) {
			echo '<div class="alert alert-'.$_SESSION['notif']['level'].'">
					<p> '.$_SESSION['notif']['content'].' </p>
				</div>';
			unset($_SESSION['notif']);
		}
	}
	
	
?>