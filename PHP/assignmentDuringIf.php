<?php
function myFunction() {
    return "1";
}
function ifAssignment($foo) {
    if ( ($foo = myFunction()) ) {
        echo "The IF statement was true.\n";
    }
    return $foo;
}

var_dump( ifAssignment(null) );
