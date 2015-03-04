<?php

	if((defined('DEBUG') && DEBUG ))
	{
	?>
		<link href="../core/debug/barre_debug.css" rel="stylesheet"/>
		<div class="barre_debug">
			<div class="container_debug">
				<span class="list_block">Page chargée en <span id="chargement">????</span> ms</span>
				<span class="list_block"><a target="_blank" href="<?php echo BUG_BASE_DIR ?>/core/debug/debug.php">Fichier de débug</a></span>
				<span class="list_block"><a target="_blank" href="<?php echo BUG_BASE_DIR ?>/www/index.php?module=users&action=logout">Detruire Session</a></span>
				
			</div>
		</div>
	<?php
	}
	
?>


