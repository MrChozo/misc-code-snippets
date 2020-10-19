<?php

function decodePrint($queryString)
{
    $out = [];
    parse_str($queryString, $out);
    print_r($out);
}

if (! empty($argv[1])) {
    $queryString = $argv[1];
    decodePrint($queryString);
} else {
    echo 'No arg passed - URL query string expected as only argument.';
}
exit;
