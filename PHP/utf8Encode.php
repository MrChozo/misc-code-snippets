<?php

$file = array("Marion County Health Dept.","Yuritzy Gonzalez-Peña","","ygonzalezpena@co.marion.or.us","503-983-3072","","");

foreach ($file as $f) {
	var_dump(utf8_encode($f));
}