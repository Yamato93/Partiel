<div class="site-header">
    <div class="site-logo">
        <a href="index.php?module=index&action=index">
            <img src="public/img/discoverit.svg" alt="Discover It" />
        </a>
    </div>
    <nav class="header-nav">
    <?php
    	if(isset($_SESSION['User']))
    	{
	    	if($_SESSION['User']->USE_LASTNAME != '')
	    	{
		    	$user_name = $_SESSION['User']->USE_LASTNAME;
	    	}
	    	else
	    	{
		    	$user_name = $_SESSION['User']->USE_MAIL;
	    	}
    ?>
    		 <a href="index.php?module=users&action=users">Hello, <?php echo $user_name; ?></a>
	    	 <a href="index.php?module=users&action=logout">Log out</a>
	<?php
    	}
    	else
    	{
	?>
			<a href="index.php?module=users&action=login">Log in / Sign in</a>
			<a href="landing.php">Professional ?</a>
	<?php
    	}
    ?>
       
        <a href="https://www.facebook.com/discover.fr" target="_blank"></a>
        <a href="https://twitter.com/DiscoverIt_fr" target="_blank"></a>
        <a href="https://plus.google.com/115867732065766652271" target="_blank"></a>
    </nav>
</div>