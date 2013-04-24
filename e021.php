<?php
/*
Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
If d(a) = b and d(b) = a, where a  b, then a and b are an amicable pair and each of a and b are called amicable numbers.

For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.

Evaluate the sum of all the amicable numbers under 10000.
 * 
 */

function sum_of_divisors($num)
{
    $sum = 0;
    
    for($i = 1; $i <= $num / 2; $i++)
    {
        if($num % $i == 0)
            $sum += $i;
    }
    
    return $sum;
}

$sum = 0;
for($i = 1; $i < 10000; $i++)
{
    $a = sum_of_divisors($i);
    $b = sum_of_divisors($a);
    
    if($i == $b && $a != $i)
    {
        $sum += $a;
        $sum += $i;
    }
        
}
print $sum / 2;
?>
