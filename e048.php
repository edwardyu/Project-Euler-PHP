<?php
/*
The series, 11 + 22 + 33 + ... + 1010 = 10405071317.

Find the last ten digits of the series, 11 + 22 + 33 + ... + 10001000.
 * 
 */

$sum = 0;
for($i = 1; $i <= 1000; $i++)
{
    $sum = bcadd($sum, bcpow($i, $i));
}

print substr($sum, -10);
?>
