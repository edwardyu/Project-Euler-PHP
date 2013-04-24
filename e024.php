<?php
/*
 * A permutation is an ordered arrangement of objects. 
 * For example, 3124 is one possible permutation of the digits 1, 2, 3 and 4. If all of the permutations 
 * are listed numerically or alphabetically, we call it lexicographic order. The lexicographic permutations of 0, 1 and 2 are:

012   021   102   120   201   210

What is the millionth lexicographic permutation of the digits 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9?
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

//print_r(permutate('i'));
//print_r(permutate('is'));
//print_r(permutate('hey'));
$numbers = permutate('0123456789');
sort($numbers);

//print_r($numbers);

//print count($numbers);
print $numbers[999999];
?>
