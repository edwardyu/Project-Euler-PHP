<?php
/*
 * We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once. For example, 2143 is a 4-digit pandigital and is also prime.

What is the largest n-digit pandigital prime that exists?
 */
function concat($string, $array)
{
    $newArray = array();
    foreach($array as $value)
    {
        for($i = 0; $i <= strlen($value); $i++)
        {
            $newArray[] = substr($value, 0, $i) . $string . substr($value, $i);
        }
    }
        
    
    return $newArray;
}

//print_r(concat('e', ['bob','store','cigarette']));

function permutate($string)
{
    
    $substring = substr($string, 1);
    
    if(strlen($string) == 0 || strlen($string) == 1)
    {
        return array($string);
    }
        
    else
        return concat($string[0], permutate($substring));
    
    
}

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

function generate_pandigitals($digits)
{
    $string = '';
    for($i = 1; $i <= $digits; $i++)
        $string .= $i;
    
    return permutate($string);
}
//print_r(generate_pandigitals(3));
//generate all pandigital numbers then check if any are prime.

for($digits = 7; $digits >= 1; $digits--)
{
    $pandigitals = generate_pandigitals($digits);
    rsort($pandigitals);
    foreach($pandigitals as $value)
    {
        if(is_prime($value))
        {
            print $value;
            exit();
        }
    }
}


?>
