<?php

/**
*	Task 1
*   Hashing function
*   Mark: 3 (1-5)
*/
function hashOrder(int $number): string {
	if (! ($number > 0 && $number <= 9999999)) {
		throw new InvalidArgumentException("Parameter Number is out of range");
	}
	
	$rotationMask = [
		0 => 5,
		1 => 3,
		2 => 6,
		3 => 8,
		4 => 7,
		5 => 2,
		6 => 4,
		7 => 9,
		8 => 0,
		9 => 1
	];
		
	$newNumber = $numberString = sprintf("%'.07d", $number);
	for($i=0; $i<strlen($numberString); $i++){
		$newNumber[$i] = $rotationMask[$numberString[$i]];
	}
		
	return (string) $newNumber;
}




//Script:
$unique = [];

echo "Starting test ....".PHP_EOL;
$start = microtime(true);

for ($i=1; $i<=9999999; $i++) {
  $result = hashOrder($i);

  if (!preg_match("/^[0-9]{7}$/", $result)) {
    throw new InvalidArgumentException("Result {$result} does not match regex");
  }

  if (!empty($unique[$result])) {
    throw new InvalidArgumentException("Colision detected for key {$i}:{$unique[$result]} and result {$result}");
  }

  $unique[$result] = $i;
}

$time_elapsed_secs = microtime(true) - $start;

if ($time_elapsed_secs > 60) {
  throw new InvalidArgumentException("Could not finish test in 60 seconds");
}

echo "Finished in {$time_elapsed_secs}";