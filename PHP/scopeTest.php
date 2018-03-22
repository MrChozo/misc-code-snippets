<?php

// function setFoo() {
// 	$foo = 'bar';
// 	printThing();
// 	exit;
// }

// function printThing() {
// 	printf($foo);
// }

// setFoo();
// Error
// Didn't think so


function calc($a, $b) {
  $c = $a + $b;

  function dumbReturn($c) {
    return $c;
  }
  
  return dumbReturn($c);
}

var_dump(calc(1, 2)); // 3
