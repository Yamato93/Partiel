<?php

function log_call($variable, $lib=""){
if(!file_exists("../log/call.log.txt"))
	{
		mkdir('../log',0777, true);
		file_put_contents("../log/call.log.txt", "");
	}
	if(is_array($variable)){
		foreach ($variable as $key => $value) {
			file_put_contents("../log/call.log.txt", "-------------"
				."$key => $value \r\n".file_put_contents("../log/call.log.txt"));
		}
		file_put_contents("../log/call.log.txt", date("[j/m/y H:i:s]")." - $lib = \r\n".file_get_contents("../log/call.log.txt"));
	}
	else{
		file_put_contents("../log/call.log.txt", date("[j/m/y H:i:s]")." - $lib = $variable \r\n".file_get_contents("../log/call.log.txt"));
	}
}