<?php
/*
A Pythagorean triplet is a set of three natural numbers, a  b  c, for which,

a2 + b2 = c2
For example, 32 + 42 = 9 + 16 = 25 = 52.

There exists exactly one Pythagorean triplet for which a + b + c = 1000.
Find the product abc.
 * 
 */

for($a = 1; $a < 1000; $a++)
{
    for($b = 1; $b < 1000; $b++)
    {
        $c = 1000 - $a - $b;
        
        if($a + $b +$c === 1000 && pow($a, 2) + pow($b, 2) == pow($c, 2) && $c > 0)
        {
            print $a * $b * $c;        
            exit;
        }
    }
}
?>
