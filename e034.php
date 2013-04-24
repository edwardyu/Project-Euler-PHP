<?php
/*
 * 145 is a curious number, as 1! + 4! + 5! = 1 + 24 + 120 = 145.

Find the sum of all numbers which are equal to the sum of the factorial of their digits.

Note: as 1! = 1 and 2! = 2 are not sums they are not included.
 */

function factorial($num)
{
    if($num == 0)
        return 1;
    else
        return $num * factorial($num - 1);
        
}

function is_sum_of_factorial($num)
{
    $num = (string) $num;
    $sum = 0;
    for($i = 0; $i < strlen($num); $i++)
    {
        $sum += factorial($num[$i]);
    }
    
    if($num == $sum)
        return true;
    else
        return false;
    
}

//print var_dump(is_sum_of_factorial(145));
$sum = 0;
for($i = 3; $i < factorial(9) * 7; $i += 2)
{
    if(is_sum_of_factorial($i))
    {
        $sum += $i;
        print "$i is a sum of factorials.\n";
    }
}
print $sum;
?>
