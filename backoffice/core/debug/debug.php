<?php
	
	include_once("../../../app/config/param.inc.php");
	include_once("../../../core/function/function_start_session.php");
	my_session_start(SESSION_NAME);
	if(isset($debug))
	{
		$array_debug = $debug;
	}
	if(isset($_SESSION["requetes"]))
	{
		$array_requetes = $_SESSION["requetes"];
	}
	$array_session = $_SESSION;
	$array_request = $_REQUEST;
	$array_serveur = $_SERVER;
	$array_cookie = $_COOKIE;
	
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <script type="text/javascript" src="../jquery-1.11.1.min.js"></script>
	<style>
		.block-trace
		{
			background-color: grey;
			text-align: left;
			margin: 10px 0px 10px 0px;
		}
		.border-trace
		{
			border: black 1px solid;
			background-color: #a0a0a0;
			margin: 10px;
		}
	</style>
</head>
	<body>
		<div class="block-trace">
		<?php
			if(isset($array_debug))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$debug \ Print_R ----------"; ?>
						<br/>
						<?php print_r($array_debug); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			if(isset($array_requetes))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$requestes \ Requetes SQL ----------"; ?>
						<br/>
						<?php print_r($array_requetes); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			if(isset($array_session))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$_SESSION \ ----------"; ?>
						<br/>
						<?php print_r($array_session); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			if(isset($array_request))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$_REQUEST \ ----------"; ?>
						<br/>
						<?php print_r($array_request); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			if(isset($array_serveur))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$_SERVER \ ----------"; ?>
						<br/>
						<?php print_r($array_serveur); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			if(isset($array_cookie))
			{
			?>
				<div class="border-trace" >
					<pre>
						<?php echo "---------- Show \ \$_COOKIE \ ----------"; ?>
						<br/>
						<?php print_r($array_cookie); ?>
						<?php echo "----------------------------------------";?>
						<br/>
					</pre>
				</div>
			<?php
			}
			?>
		</div>
	</body>
</html>

	
		
	
