<?php

class QueryString
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

    public function decode($inputString)
    {
        $out = [];
        parse_str($inputString, $out);

        return (is_array($out)) ? $out : [];
    }

    private function setDecodedArray($string)
    {
        $this->decodedArray = $this->decode($string);
    }

    private function setInputString($string)
    {
        $this->inputString = $string;
    }
}



if (! empty($argv[1])) {
    $queryString = new QueryString($argv[1]);
    print_r($queryString->getDecodedArray());
} else {
    echo 'No arg passed - URL query string expected as only argument.';
}
exit;
