<?php
/*
 * The number, 1406357289, is a 0 to 9 pandigital number because it is made up of each of the digits 0 to 9 in some order, but it also has a rather interesting sub-string divisibility property.

Let d1 be the 1st digit, d2 be the 2nd digit, and so on. In this way, we note the following:

d2d3d4=406 is divisible by 2
d3d4d5=063 is divisible by 3
d4d5d6=635 is divisible by 5
d5d6d7=357 is divisible by 7
d6d7d8=572 is divisible by 11
d7d8d9=728 is divisible by 13
d8d9d10=289 is divisible by 17
Find the sum of all 0 to 9 pandigital numbers with this property.
 */

//adds a string to each element in the array. concat('h',['ey']) will return ['hey','ehy', 'eyh'] 
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

$pandigitals = permutate('0123456789');
$sum = 0;
foreach($pandigitals as $num)
{
    $num = (string) $num;
    if(($num[1] . $num[2] . $num[3]) % 2 == 0 && ($num[2] . $num[3] . $num[4]) % 3 == 0 
            && ($num[3] . $num[4] . $num[5]) % 5 == 0 && ($num[4] . $num[5] . $num[6]) % 7 == 0
            && ($num[5] . $num[6] . $num[7]) % 11 == 0 && ($num[6] . $num[7] . $num[8]) % 13 == 0
            && ($num[7] . $num[8] . $num[9]) % 17 == 0)
    {
        $sum += $num;
    }
}

print $sum;
?>
