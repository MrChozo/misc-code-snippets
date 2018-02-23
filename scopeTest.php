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

  function plus5() {
    // $c is local and undefined
    var_dump($c); // NULL
    return $c + 5;
  }
  
  return plus5();
}

var_dump(calc(1, 2)); // 5
