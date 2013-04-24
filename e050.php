<?php
/*
 * The prime 41, can be written as the sum of six consecutive primes:

41 = 2 + 3 + 5 + 7 + 11 + 13
This is the longest sum of consecutive primes that adds to a prime below one-hundred.

The longest sum of consecutive primes below one-thousand that adds to a prime, contains 21 terms, and is equal to 953.

Which prime, below one-million, can be written as the sum of the most consecutive primes?
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

//generate primes from 1 to 1 million
$primes = array(2);
for($i = 3; $i < 1000000; $i += 2)
{
    if(is_prime($i))
        $primes[] = $i;
}

//check if a prime number can be written as a sum
//@return number of terms a sum contains, 0 if it cannot be written as a sum.
function is_sum($prime)
{
    global $primes;

    for($i = 0; $primes[$i] < $prime; $i++)
    {
        $terms = 0;
        $sum = 0;
        for($k = $i; $sum <= $prime; $k++)
        {
            $sum += $primes[$k];
            $terms++;
            if($sum == $prime)
            {
                return $terms;
            }
        }
    }
    
    return 0;
}

//print is_sum(953);

//for each prime, check if that prime can be written as a sum
$max_terms = 0;
$max_prime = 0;
foreach($primes as $prime)
{
    $terms = is_sum($prime);
    if($terms > $max_terms)
    {
        $max_terms = $terms;
        $max_prime = $prime;
        print "Prime: $max_prime" . "\t" . "Terms: $max_terms \n";
    }
}

print $max_prime;
print "\n" . $max_terms;

?>
