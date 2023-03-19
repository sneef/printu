<?php

/*
* Task 2
* Unique string
* Mark: 2 (1-5)
*/

function findUniqueString(string $s) {
	$length = strlen($s);
	
	if (!preg_match("/^[a-z]+$/", $s) || !($length >= 1 && $length <= pow(10,5)) ) {
		return null;
	}
	
	for($i=0; $i<$length; $i++) {
		if( substr_count($s, $s[$i]) === 1) {
			return $i+1;
		}
	}
	
	return -1;
}


//testing:

echo findUniqueString('hashthegame');