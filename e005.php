<?php
/*
2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.

What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?
 * 
 */

function divisible_to_20($num)
{
    if($num == 0)
        return false;
    
    for($i = 2; $i <= 20; $i++)
    {
        if($num % $i != 0)
            return false;
    }
    
    return true;
}

$divisible_number = 0;

while(!divisible_to_20($divisible_number))
{
    $divisible_number += 2 * 3 * 5 * 7 * 11 * 13 * 17 * 19;
}

print $divisible_number;
?>
