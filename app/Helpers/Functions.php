<?php

    function pre($expression, bool $json = true, bool $stop = true){
	echo '<pre>';

	if($json)
		echo print_r($expression); 
	else
		var_dump($expression);

//	if($stop)
//		die();
    }

