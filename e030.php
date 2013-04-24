<?php
/*
Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:

1634 = 14 + 64 + 34 + 44
8208 = 84 + 24 + 04 + 84
9474 = 94 + 44 + 74 + 44
As 1 = 14 is not a sum it is not included.

The sum of these numbers is 1634 + 8208 + 9474 = 19316.

Find the sum of all the numbers that can be written as the sum of fifth powers of their digits
 * 
 */

function is_fith_power($num)
{
    $digits = str_split($num);
    foreach($digits as &$value)
    {
        $value = pow($value, 5);
    }
    
    if(array_sum($digits) == $num)
        return true;
    else
        return false;
}

$sum = 0;
for($i = 2; $i <= pow(9, 5) * 6; $i++)
{
    if(is_fith_power($i))
    {
        $sum += $i;
        print "$i can be written as the sum of fifth powers of its digits.\n";
    }
}

print $sum;
?>
