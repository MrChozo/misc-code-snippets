<?php
$foo = 'a:2:{s:7:"options";a:5:{i:0;s:12:"<?="Hello"?>";i:1;s:1:"b";i:2;s:1:"c";i:3;s:1:"d";i:4;s:1:"e";}s:7:"default";s:0:"";}';

var_dump(unserialize($foo));
