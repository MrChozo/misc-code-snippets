<?php
$not_edited = 'a:1:{i:0;a:4:{s:9:"condition";s:4:"show";s:8:"field_id";s:3:"100";s:8:"operator";s:2:"is";s:12:"field_values";a:1:{i:0;s:3:"dos";}}}';
$edited = 'a:1:{i:0;a:4:{s:9:"condition";s:4:"show";s:8:"field_id";s:3:"100";s:8:"operator";s:2:"is";s:12:"field_values";s:0:"";}}';

$out0 = unserialize($not_edited);
$out1 = unserialize($edited);

print_r($out0);
print_r("\n");
print_r($out1);
