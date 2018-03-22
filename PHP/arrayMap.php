<?php
$foo = array("<p>bar</p>", "baz");

$bar = array_map("strip_tags", $foo);

var_dump($bar);
