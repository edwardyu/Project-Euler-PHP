<?php
/*
An irrational decimal fraction is created by concatenating the positive integers:

0.123456789101112131415161718192021...

It can be seen that the 12th digit of the fractional part is 1.

If dn represents the nth digit of the fractional part, find the value of the following expression.

d1  d10  d100  d1000  d10000  d100000  d1000000
 * 
 */

//create the fraction
$fraction = '';
$i = 1;
while(strlen($fraction) <= 1000000)
{
    $fraction = $fraction . $i;
    $i++;
}

print $fraction[1 - 1] * $fraction[10 - 1] * $fraction[100 - 1] * $fraction[1000 - 1] 
        * $fraction[10000 - 1] * $fraction[100000 - 1] * $fraction[1000000 - 1];
?>
