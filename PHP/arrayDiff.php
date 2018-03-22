<?php

// $array1 = array("a" => "green", "red", "blue", "red");
// $array2 = array("b" => "green", "yellow", "red");
// $result = array_diff($array1, $array2);

// print_r($result);

// Array
// (
//     [1] => blue
// )


// $array1 = array("green", "red", "blue", "red");
// $array2 = array("b" => "green", "yellow", "red");
// $result = array_diff($array1, $array2);

// print_r($result);

// Array
// (
//     [2] => blue
// )


$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);

// Array
// (
//     [1] => blue
// )
