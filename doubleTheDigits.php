<?php

function doubleNumbers($singleDigit) {
	$doubledDigit = (int) $singleDigit * 2;
	$return = $doubledDigit;
	if ($doubledDigit >= 10) {
		$return = 1 + $doubledDigit % 10;
	}
	return $return;
}

echo "Enter a digit (0-9): ";

$handle = fopen('php://stdin', "r");
$line = fgets($handle);

echo "doubleNumbers returns: ".doubleNumbers($line);


?>
