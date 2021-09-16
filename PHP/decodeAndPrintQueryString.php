<?php

class QueryDecoder
{
    private $inputString;
    private $decodedArray;

    public function __construct($string)
    {
        $this->setInputString($string);
        $this->setDecodedArray($string);
    }

    public function getDecodedArray()
    {
        return $this->decodedArray;
    }

    public function getInputString()
    {
        return $this->inputString;
    }

    public function printDecoded()
    {
        print_r($this->getDecodedArray());
    }

    private function setDecodedArray($string)
    {
        $this->decodedArray = $this->proper_parse_str($string);
    }

    private function setInputString($string)
    {
        $this->inputString = $string;
    }

    // From php.net comments. Deals with duplicate keys.
    private function proper_parse_str($str)
    {
        $arr = [];

        /*
         * TODO: Remove everything to the left of the initial query question mark, in case "PROGRAM.pgm" is
         * included with the query string
         *
         * if (criteria)
         * $str = substr,($str, '.pgm?');
         */

        $pairs = explode('&', $str);

        foreach ($pairs as $i) {
            list($name, $value) = explode('=', $i, 2);

            if (isset($arr[$name])) {
                if (is_array($arr[$name])) {
                    $arr[$name][] = $value;
                }
                else {
                    $arr[$name] = [$arr[$name], $value];
                }
            }
            else {
                $arr[$name] = $value;
            }
        }
        return $arr;
    }
}

$line = readline('Query string? ');
readline_add_history($line);

if (! empty($line)) {
    $decoder = new QueryDecoder($line);
    $decoder->printDecoded();
} else {
    echo "You didn't enter anything. \n";
    echo "Please answer with a URL-encoded query string. E.g.:\n";
    echo "\n";
    echo "TASK=beginmanage&rrn=000009607&SmurfID=30748409450320201020096273262135&rnd=33356\n";
}
exit;
