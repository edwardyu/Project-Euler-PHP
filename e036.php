<?php
/*
The decimal number, 585 = 10010010012 (binary), is palindromic in both bases.

Find the sum of all numbers, less than one million, which are palindromic in base 10 and base 2.

(Please note that the palindromic number, in either base, may not include leading zeros.)
 * 
 */

function is_double_palindrome($num)
{
    $binary = decbin($num);
    if($num == strrev($num) && $binary == strrev($binary))
        return true;
    else
        return false;
}

//print var_dump(is_double_palindrome(585));
//print var_dump(is_double_palindrome(454));
$sum = 0;
for($i = 1; $i < 1000000; $i++)
{
    if(is_double_palindrome($i))
    {
        $sum += $i;
        print "$i is a palindrome in base 10 and base 2.\n";
    }
}

print $sum;
?>
