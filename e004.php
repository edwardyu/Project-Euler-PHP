<?php
/*
A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91 * 99.

Find the largest palindrome made from the product of two 3-digit numbers.
 * 
 */

function is_palindrome($num)
{
    $num = (string) $num;
    
    if(strlen($num) == 0 || strlen($num) == 1)
        return true;
    else
       return $num[0] == $num[strlen($num) - 1] && is_palindrome(substr($num, 1, -1)); 
    
}

/* the easy way to find a palindrome
 * 
function is_palindrome($str)
{
    return $str == strrev($str);
}

*/
$largest_palindrome = 0;

for($i = 100; $i <= 999; $i++)
{
    for($j = 100; $j <= 999; $j++)
    {
        $product = $j * $i;
        
        if(is_palindrome($product) && $product > $largest_palindrome)
            $largest_palindrome = $product;
    }
}

print $largest_palindrome;
?>
