<?php
/*
 * The number 3797 has an interesting property. Being prime itself, it is possible to continuously remove digits from left to right, and remain prime at each stage: 3797, 797, 97, and 7. Similarly we can work from right to left: 3797, 379, 37, and 3.

Find the sum of the only eleven primes that are both truncatable from left to right and right to left.

NOTE: 2, 3, 5, and 7 are not considered to be truncatable primes.
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

function truncate($num)
{
    $num = (string) $num;
    $trunctables = array();
    for($i = 0; $i < strlen($num); $i++)
    {
        $trunctables[] = substr($num, $i);
    }
    
    for($i = strlen($num); $i > 0; $i--)
    {
        $trunctables[] = substr($num, 0, $i);
    }
    
    return $trunctables;
}

//print_r(truncate('3797'));

function is_trunctable_prime($int)
{
    $array = truncate($int);
    foreach($array as $num)
    {
        if(!is_prime($num))
            return false;
    }
    
    return true;
}

$count = 0;
$num = 11;
$sum = 0;
while($count < 11)
{
    if(is_trunctable_prime($num))
    {
        $count++;
        $sum += $num;
        
        print "$num is the $count" . "th trunctable prime.\n";
    }
    
    $num += 2;
}

print $sum;
?>
