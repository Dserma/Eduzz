<?php

/*
 * Phone
 */
function pre($expression, bool $json = true, bool $stop = true)
{
	echo '<pre>';

	if($json)
		echo print_r($expression); 
	else
		var_dump($expression);

	if($stop)
		die();
}

function assets($file = null)
{
	return url('/') . "/resources/assets/{$file}";
}
