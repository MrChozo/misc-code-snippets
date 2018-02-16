<?php
// Thousand millionth isEmpty test

$value = "0";

if (!empty($value) || $value === "0")
{
	var_dump($value);
	exit;
}
printf("no dice");
exit;
