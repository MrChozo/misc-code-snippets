<?php
// function is_field_populated($value)
// {
// 	if (!isset($value) || $value === null || str_replace(" ","",$value) == "")
// 	{
// 		return false;
// 	}
// 	else
// 	{
// 		return true;
// 	}
// }

// $value = "0";

// var_dump(is_field_populated($value));

$values = array("", 0, 0.0, "0", NULL, FALSE, array(), $var);

foreach ($values as $value) {
	var_dump(isset($value));
}





// if (!empty($f['element_' . $field_id]))


// if (!isset($f['element_' . $field_id]) || $f['element_' . $field_id] == null)
