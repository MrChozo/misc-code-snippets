<?php
$input = "foobar";
$output = serialize($input);

var_dump($output);
exit;


// string(13) "s:6:"foobar";"


$input = "foobar";
$input = array("foobar", "qux", "baz");
$input = array("foobar" => "foo", "quxbar" => "qux", "bazbar" => "baz");
$output = json_encode($input);

var_dump($output);
exit;

// string(8) ""foobar""
// string(22) "["foobar","qux","baz"]"
// string(46) "{"foobar":"foo","quxbar":"qux","bazbar":"baz"}"
