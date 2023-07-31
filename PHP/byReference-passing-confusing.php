<?php
// Pulled from:
// https://slack.engineering/taking-php-seriously-cf7a60065329 linked to
// https://dl.acm.org/citation.cfm?id=2660199 (Figure 2)

$foo = true;
if ($foo) {
function weirdArg(&$x) { $x = 'surprise!'; }
} else {
function weirdArg($x) { return $x + 1; }
}

$init = 13;
echo "weirdArg(\$init): ";
var_dump(weirdArg($init));
echo "\$x: ";
var_dump($x);

// $foo = true   returns NULL
// $foo = false  returns 14
