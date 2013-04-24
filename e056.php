<?php
/*
 * A googol (10100) is a massive number: one followed by one-hundred zeros; 100100 is almost unimaginably large: one followed by two-hundred zeros. Despite their size, the sum of the digits in each number is only 1.

Considering natural numbers of the form, ab, where a, b  100, what is the maximum digital sum?
 */

function sum_of_digits($num)
{
    return array_sum(str_split((string) $num));
}

//print sum_of_digits(967);

$max_sum = 0;
for($a = 1; $a < 100; $a++)
{
    for($b = 1; $b < 100; $b++)
    {
        $sum = sum_of_digits(bcpow($a, $b));
        if($sum > $max_sum)
            $max_sum = $sum;
    }
}

print $max_sum;
?>
