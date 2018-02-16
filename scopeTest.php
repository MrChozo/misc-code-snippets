<?php

function setFoo() {
	$foo = 'bar';
	printThing();
	exit;
}

function printThing() {
	printf($foo);
}

setFoo();
// Error
// Didn't think so
