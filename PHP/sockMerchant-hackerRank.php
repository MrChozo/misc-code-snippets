<?php
/* Complete the sockMerchant function below.
 *
 * From Hacker Rank:
 *   John works at a clothing store. He has a large pile of socks that he must pair by
 *   color for sale. Given an array of integers representing the color of each sock,
 *   determine how many pairs of socks with matching colors there are.
 *
 *   For example, there are `n = 7` socks with colors `ar = [1,2,1,3,1,2]`. There is one
 *   pair of color 1 and one of color 2. There are three odd socks left, one of each
 *   color. The number of pairs is 2.
 *
 * Pseudocode:
 *   loop through all socks
 *       get unique socks
 *
 *   loop through unique socks
 *       count total of each color
 *       compare and calculate matches
 *       add matches to total pairs
 *
 *
 * example:
 *   $n = 9
 *   $ar = [10, 20, 20, 10, 10, 30, 50, 10, 20]
 *   returns  3
 */
function sockMerchant($n, $ar) {
    $pair = 2;
    $total_pairs = 0;

    $unique_socks = array_unique($ar);

    foreach ($unique_socks as $sock) {
        $color = array_keys($ar, $sock);
        $count = count($color);
        $remainder = $count % $pair;
        $matches = ($count - $remainder) / $pair;

        $total_pairs += $matches;
    }
    return $total_pairs;
}

// My 3v4l.org "main"
$n = 15;
$ar = [6, 5, 2, 3, 5, 2, 2, 1, 1, 5, 1, 3, 3, 3, 5];
var_dump(sockMerchant($n, $ar)); // Should be 6

// Their "main"
/*
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $ar_temp);

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
*/