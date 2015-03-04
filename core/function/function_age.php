<?php
/**
 * Created by PhpStorm.
 * User: alexandredupont
 * Date: 28/01/15
 * Time: 17:23
 * @param $DateNaissance DATE(Y-m-d)
 * @return int (ex : 30)
 */
function ageFR($DateNaissance)
{
		
	// YYYY-MM-DD
    $DateNaissance = explode("-", $DateNaissance);
    $year = @date('Y');
    $month = @date('m');
    $day = @date('d');
    
    $age = $year - $DateNaissance[0];
    
    // 02/02 - 31/07
    if($month <= $DateNaissance[1] && $day < $DateNaissance[2])
    	$age--;
    	    	
    return $age;
    
}