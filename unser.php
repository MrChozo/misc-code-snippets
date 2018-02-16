<?php
$string = 'a:2:{s:7:"options";a:1:{i:0;s:0:"";}s:7:"default";s:0:"";}';

$unser = unserialize($string);
var_dump($unser);

/*
array(2) {
  ["options"]=>
  array(1) {
    [0]=> string(0) ""
  }
  ["default"]=>
  string(0) ""
}
*/