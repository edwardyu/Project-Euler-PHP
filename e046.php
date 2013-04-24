<?php
/*
 * It was proposed by Christian Goldbach that every odd composite number can be written as the sum of a prime and twice a square.

9 = 7 + 212
15 = 7 + 222
21 = 3 + 232
25 = 7 + 232
27 = 19 + 222
33 = 31 + 212

It turns out that the conjecture was false.

What is the smallest odd composite that cannot be written as the sum of a prime and twice a square?
 */

function is_prime($num)
{
    if($num == 2)
        return true;
    
    if($num <= 1)
        return false;

    for($i = 2; $i <= sqrt($num); $i++)
    {
        if($num % $i == 0)
            return false;
    }
    
    return true;
}

//returns true if a number can be written as a prime + twice a square.
function goldbach($num)
{
    for($i = 1; $i * $i < $num; $i++)
    {
        if(is_prime($num - 2*$i * $i))
            return true;
    }
    
    return false;
}

//print var_export(goldbach(33));
//print var_export(goldbach(1));

//find first non golbach number
$i = 3;
$found = false;
while(!$found)
{
    if(!is_prime($i) && !goldbach($i))
    {
        $found = true;
        print $i;
    }
    else
        $i += 2;
}
?>
