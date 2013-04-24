<?php
/*
The prime factors of 13195 are 5, 7, 13 and 29.

What is the largest prime factor of the number 600851475143 ?
 * 
 */

//use bcmod functions to handle large numbers that PHP integers can't handle
//check if number is prime
function is_prime($num)
{
    if($num === 2)
        return true;

    for($i = 2; $i <= sqrt($num); $i++)
    {
        if(bcmod((string) $num, (string) $i) == '0')
            return false;
    }
    
    return true;
}



$num = 600851475143;
$largest_prime_factor = 0;

//calculate largest prime factor
for($i = 2; $i <= $num; $i++)
{
    if(bcmod((string) $num, (string) $i) == '0')
    {
        if($i > $largest_prime_factor)
            $largest_prime_factor = $i;
        $num = bcdiv($num, $i);
        $i--;
    }
}

print $largest_prime_factor;

?>
