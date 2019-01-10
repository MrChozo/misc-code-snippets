<?php
// Double-checking to make sure return in a foreach works as expected

function foreachMe($array) {
    foreach ($array as $value) {
        if (empty($value)) {
            return false;
        }
        echo $value, " ";
        echo "notempty\n";
    }
    return true;
}

$foo = ['foo', 'bar', ''];

var_dump(foreachMe($foo));
