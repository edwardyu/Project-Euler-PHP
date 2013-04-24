<?php
/*
The number, 197, is called a circular prime because all rotations of the digits: 197, 971, and 719, are themselves prime.

There are thirteen such primes below 100: 2, 3, 5, 7, 11, 13, 17, 31, 37, 71, 73, 79, and 97.

How many circular primes are there below one million?
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

function rotate($string)
{
    $rotations = array($string);
    for($i = 1; $i < strlen($string); $i++)
    {
        $string = substr($string, 1) . $string[0];
        $rotations[] = $string;
    }
    
    return $rotations;
}

function is_circular_prime($num)
{

        $rotations = rotate((string) $num);
        foreach($rotations as $value)
        {
            if(!is_prime($value))
                return false;
        }
        
        return true;

}


$count = 1;
for($i = 3; $i < 1000000; $i += 2)
{
    if(is_circular_prime($i))
    {
        print "$i \n";
        $count++;
    }
}

print "Number of circular primes: $count";


//print_r(rotate('197'));
?>
