<?php
$printme = strtotime("11/28/17 4:26:00");
printf($printme.": ");
printf(date("m/d/y g:i:s",$printme)."\n");


$strtotime = array("1511768880", "1511811256", "1511385249");

foreach($strtotime as $stt) {
	printf($stt.": ");
	printf(date("m/d/y g:i:s",$stt)."\n");
}
exit;


// Output:
// 	1511754480: 11/27/17 3:48:00
// 	1511768880: 11/27/17 7:48:00
// 	1511811256: 11/27/17 7:34:16
// 	1511385249: 11/22/17 9:14:09


// Time codes copied from:
// 	Job - Melody Petersen - 2017-11-27 - 1511768880-0538e165  // now renamed
// 	Job - Sissel Heide - 2017-11-27 - 1511811256-fc4a5133
// 	Job - Sissel Heide - 2017-11-22 - 1511385249-bca3b368



// 247f8g6nfna0sdlk2bf9q6s773-3ec666d3