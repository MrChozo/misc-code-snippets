<?php
// $start_date = date('m-d-y', strtotime("first day of january this year"));

// echo $start_date;

// // 01-01-18




$total_days = 0;
$current_date = strtotime("today");
$start_date = strtotime("first day of january this year");

while ($start_date < $current_date)
{
    if (date("N", $start_date) <= 5)
    {
	    printf($total_days."\n");
        $total_days++;
    }
	$start_date = $start_date + 86400;
}
