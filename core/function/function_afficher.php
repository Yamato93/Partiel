<?php

function fonction_print_r($valeur)
	{
		
		echo "<pre>";
		echo "<div style='border-color: black; border-size: 1xp; border-style:solid; width: 300px; color:white; background-color:black;' >";
		echo "<<<<<<<<< fonction print_r >>>>>>>><br/>";
		echo "</div>";
		print_r($valeur);
		echo "<br/><<<<<<<<<<<<<<>>>>>>>>>>>>><br/>";
		echo "</pre>";
		
	}
	function fonction_print_r2($valeur, $valeur2)
	{
		
		echo "<pre>";
		echo "<div style='border-color: black; border-size: 1xp; border-style:solid; width: 300px; color:white; background-color:black;' >";
		echo "<<<<<<<<< fonction print_r >>>>>>>><br/>";
		echo "</div>";
		print_r($valeur);
		echo "<br/>";
		print_r($valeur2);
		echo "<br/><<<<<<<<<<<<<<>>>>>>>>>>>>><br/>";
		echo "</pre>";
		
	}
	function fonction_print_r3($valeur, $valeur2, $valeur3)
	{
		
		echo "<pre>";
		echo "<div style='border-color: black; border-size: 1xp; border-style:solid; width: 300px; color:white; background-color:black;' >";
		echo "<<<<<<<<< fonction print_r >>>>>>>><br/>";
		echo "</div>";
		print_r($valeur);
		echo "<br/>";
		print_r($valeur2);
		echo "<br/>";
		print_r($valeur3);
		echo "<br/><<<<<<<<<<<<<<>>>>>>>>>>>>><br/>";
		echo "</pre>";
		
	}
	
	function fonction_var_dump($valeur)
	{

		echo "<pre>";
		echo "<<<<<<<<< fonction var_dump >>>>>>>><br/>";
		var_dump($valeur);
		echo "<<<<<<<<<<<<<<>>>>>>>>>>>>><br/>";
		echo "</pre>";
		
	}