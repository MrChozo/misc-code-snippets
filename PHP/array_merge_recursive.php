<?php
$foo = [
   'foobar',
   'baxquz' => [
       1,
       'qux' => 'value'
   ]
];
$bar['baxquz'] = [
    'jim' => 'bob',
    'tex' => [
        'mex' => 'tacos'
    ]
];

$qux = array_merge_recursive($foo, $bar);
print_r($qux);
