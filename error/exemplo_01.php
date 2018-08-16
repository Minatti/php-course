<?php  
function error_handler($code, $message, $line, $file){

	echo json_encode(array(
		"code"=>$code,
		"message"=>$message,
		"line"=>$line,
		"file"=>$file
	));
}

set_error_handler("error_handler");
echo 100 / 0;
?>