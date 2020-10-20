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

    private function decode($inputString)
    {
        $out = [];

        $noEntities = html_entity_decode($inputString);

        parse_str($noEntities, $out);

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

$line = readline('Query string? ');
readline_add_history($line);

if (! empty($line)) {
    $decoder = new QueryDecoder($line);
    $decoder->printDecoded();
} else {
    echo 'No arg passed - URL query string expected as only argument.';
}
exit;
