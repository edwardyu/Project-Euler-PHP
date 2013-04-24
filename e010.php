<?php
/*
The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

Find the sum of all the primes below two million.
 * 
 */

function generate_primes($max)
{
    $i = 3;
    //$num_primes = 1;
    $nums = [];
    //print 1 . ' '. 2;
    
    //$primes = [2];
    (double) $sum = 2;
    while($i < $max)
    {
        if(!in_array($i, $nums))
        {
            //$primes[] = $i;
            //print $i;
            //$num_primes++;
            
            $sum += $i;
            $j = $i;
            
            while($j <= $max/$i)
            {
                $nums[] = $i * $j;
                $j++;
            }
        }
        
        $i += 2;
    }
    
    //return $primes;
    return $sum;
}

//print generate_primes(2000000);

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

$sum = 2;
for($i = 3; $i < 2000000; $i += 2)
{
    if(is_prime($i))
    {
        $sum += $i;
    }
}

print $sum;