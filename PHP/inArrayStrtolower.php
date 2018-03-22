<?php

$valid_extensions = array('foo', 'bar');
$extension = "";
$filename = "foobar";


$file_data = pathinfo($filename);



if (!empty($file_data['extension']))
{
	$extension = $file_data['extension'];
}


// Check for valid extension
if (!in_array(strtolower($extension),$valid_extensions))
{
	$result['reason'] = "Upload failed, invalid filetype. Only the following file extensions are allowed: ." .implode(", .", $valid_extensions);
	echo var_dump($result);
	exit;
}

echo var_dump($extension);
exit;

