<?php
/*
Euler published the remarkable quadratic formula:

n² + n + 41

It turns out that the formula will produce 40 primes for the consecutive values n = 0 to 39.
 *  However, when n = 40, 402 + 40 + 41 = 40(40 + 1) + 41 is divisible by 41, and certainly when n = 41, 41² + 41 + 41 is clearly divisible by 41.

Using computers, the incredible formula  n²  79n + 1601 was discovered, which produces 80 primes for the consecutive values n = 0 to 79. 
 * The product of the coefficients, 79 and 1601, is 126479.

Considering quadratics of the form:

n² + an + b, where |a|  1000 and |b|  1000

where |n| is the modulus/absolute value of n
e.g. |11| = 11 and |4| = 4
Find the product of the coefficients, a and b, 
 * for the quadratic expression that produces the maximum number of primes for consecutive values of n, starting with n = 0.
 * 
 */
function is_prime($num)
{
    
    if($num === 2)
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

//n² + an + b;
$bestChain = 0;
$bestCoef = array();
for($a = -999; $a < 1000; $a++)
{
    for($b = -999; $b < 1000; $b++)
    {
        $n = 0;
        $chain = 0;
        while(is_prime(pow($n, 2) + $a * $n + $b))
        {
            $chain++;
            $n++;
        }
        
        if($chain > $bestChain)
        {
            $bestChain = $chain;
            $bestCoef = [$a, $b];
            
            print "n^2 + $a" . "n + $b set a new record of $bestChain primes.\n";
            
            
        }
        //print "n^2 + " . $a . "n + $b" . " created a chain of $chain primes.\n";
        $n = 0;
        $chain = 0;
    }
}

print $bestCoef[0] * $bestCoef[1];
?>
