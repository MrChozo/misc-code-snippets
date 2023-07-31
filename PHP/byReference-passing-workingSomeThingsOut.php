<?php
// Working out a small issue when extracting a method in Terra Nova's Select-side code

echo "// Works, but there's lots of duplication\n";
function trimme(&$GenusAndSeries, &$CommonName, &$Cultivar, &$USPPStatus, &$EUBRStatus, &$PlantSeries)
{
    $GenusAndSeries = trim($GenusAndSeries, " ");
    $CommonName = trim($CommonName, " ");
    $Cultivar = trim($Cultivar, " ");
    $USPPStatus = trim($USPPStatus, " ");
    $EUBRStatus = trim($EUBRStatus, " ");
    $PlantSeries = trim($PlantSeries, " ");
}

$GenusAndSeries = 'oieanwf o ';
$CommonName = ' buplahse ';
$Cultivar = 'okinekoi jlfl ';
$USPPStatus = ' ioekarokf';
$EUBRStatus = 'oieanrsoiteni';
$PlantSeries = ' koien';

trimme($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
var_dump($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);


echo "\n";
echo "\n";


echo "// No work-ie :(\n";
echo "// I guess because using \$foo creates another set of references\n";
function trimme2(&$GenusAndSeries, &$CommonName, &$Cultivar, &$USPPStatus, &$EUBRStatus, &$PlantSeries)
{
    $foo = [$GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries];

    foreach ($foo as $key => &$value) {
        $value = trim($value, ' ');
    }
}

$GenusAndSeries = 'oieanwf o ';
$CommonName = ' buplahse ';
$Cultivar = 'okinekoi jlfl ';
$USPPStatus = ' ioekarokf';
$EUBRStatus = 'oieanrsoiteni';
$PlantSeries = ' koien';

trimme2($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
var_dump($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);


echo "\n";
echo "\n";


echo "// Variable variables aren't my favorite, but it ain't bad\n";
function trimme3(&$GenusAndSeries, &$CommonName, &$Cultivar, &$USPPStatus, &$EUBRStatus, &$PlantSeries)
{
    $foo = [
        'GenusAndSeries',
        'CommonName',
        'Cultivar',
        'USPPStatus',
        'EUBRStatus',
        'PlantSeries'
    ];

    foreach ($foo as $value) {
        $$value = trim($$value, ' ');
    }

    unset($$value); // because PhpStorm warned me about potential side-effects(?)

    // ... but that may have been in a different context.
    // I believe it only unsets this scope's version of the variable
    // ... which I don't think I need to do here.
}

$GenusAndSeries = 'oieanwf o ';
$CommonName = ' buplahse ';
$Cultivar = 'okinekoi jlfl ';
$USPPStatus = ' ioekarokf';
$EUBRStatus = 'oieanrsoiteni';
$PlantSeries = ' koien';

trimme3($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
var_dump($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);


echo "\n";
echo "\n";


echo "// Now turn it into a varidic function!\n";
function trimme4(&...$muh_args)
{
    foreach ($muh_args as $key => &$arg) {
        $arg = trim($arg, " ");
    }
}

$GenusAndSeries = 'oieanwf o ';
$CommonName = ' buplahse ';
$Cultivar = 'okinekoi jlfl ';
$USPPStatus = ' ioekarokf';
$EUBRStatus = 'oieanrsoiteni';
$PlantSeries = ' koien';

trimme4($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
var_dump($GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);


echo "\n";
echo "\n";


echo "// Double-check that adding another param won't hurt\n";
function trimme5(&$i_do_something_else, &...$muh_args)
{
    $i_do_something_else = str_replace(' ', '', $i_do_something_else);

    foreach ($muh_args as $key => &$arg) {
        $arg = trim($arg, " ");
    }
}

$TooManySpaces = 'koaefk okiek-   aowifeonaioei _ceikoar';
$GenusAndSeries = 'oieanwf o ';
$CommonName = ' buplahse ';
$Cultivar = 'okinekoi jlfl ';
$USPPStatus = ' ioekarokf';
$EUBRStatus = 'oieanrsoiteni';
$PlantSeries = ' koien';

trimme5($TooManySpaces, $GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
var_dump($TooManySpaces, $GenusAndSeries, $CommonName, $Cultivar, $USPPStatus, $EUBRStatus, $PlantSeries);
