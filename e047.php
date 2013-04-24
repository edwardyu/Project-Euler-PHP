<?php
/*
 * The first two consecutive numbers to have two distinct prime factors are:

14 = 2  7
15 = 3  5

The first three consecutive numbers to have three distinct prime factors are:

644 = 2²  7  23
645 = 3  5  43
646 = 2  17  19.

Find the first four consecutive integers to have four distinct prime factors. What is the first of these numbers?
 */

$start_time = microtime(true);

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

function get_prime_factors($num)
{
    $prime_factors = array();
    for($i = 1; $i <= $num; $i++)
    {
        if($num % $i == 0 && is_prime($i))
        {
            $prime_factors[] = $i;
            $num /= $i;
            $i--;
            
        }
    }
    return $prime_factors;
}

function get_num_unique_prime_factors($num)
{
    return count(array_unique(get_prime_factors($num)));
}

//print_r(get__prime_factors(14));
//print_r(get__prime_factors(128));

//find the first 4 numbers with 4 prime factors

$count = 0;
$i = 1;
$primes4 = array();
while($count < 4)
{
    if(get_num_unique_prime_factors($i) == 4)
    {
        $count++;
        $primes4[] = $i;
        if($count == 3)
            print_r($primes4);
        $i++;
    }
    else
    {
        $count = 0;
        $primes4 = array();
        $i++;
    }
}

print_r($primes4);
$end_time = microtime(true);
$time = $end_time - $start_time;
print "Execution time: $time s.";
?>
