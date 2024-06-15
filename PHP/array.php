<?php
$foo = [
  -1 => [
    'key' => -1,
    'title' => "Will Call",
    'cost' => number_format(0, 2)
  ]
];

$return = array();
$return[-1]['key'] = -1;
$return[-1]['title'] = "Will Call";
$return[-1]['cost'] = number_format(0, 2);

var_dump($foo === $return);
exit;

