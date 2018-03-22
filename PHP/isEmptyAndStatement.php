<?php

// Proving that if the !empty() is the first part of an AND statement an error won't be thrown by the second part of the statement when the variable is found undefined by the !empty().



// Commented out to make $line_data undefined
// $line_data = array('foo' => true);

$return = false;
 // Doesn't throw error on $line_data['foo'] portion
if (!empty($line_data) && $line_data['foo'] === true)
{
	$return = true;
}


var_dump($return); // Returns false