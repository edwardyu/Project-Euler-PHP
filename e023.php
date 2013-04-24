<?php
/*
 * A perfect number is a number for which the sum of its proper divisors is exactly equal to the number. 
 * For example, the sum of the proper divisors of 28 would be 1 + 2 + 4 + 7 + 14 = 28, which means that 28 is a perfect number.

A number n is called deficient if the sum of its proper divisors is less than n and it is called abundant if this sum exceeds n.

As 12 is the smallest abundant number, 1 + 2 + 3 + 4 + 6 = 16, the smallest number that can be written as the sum of two abundant numbers is 24. 
 * By mathematical analysis, it can be shown that all integers greater than 28123 can be written as the sum of two abundant numbers. 
 * However, this upper limit cannot be reduced any further by analysis even though it is known that the greatest number that cannot 
 * be expressed as the sum of two abundant numbers is less than this limit.

Find the sum of all the positive integers which cannot be written as the sum of two abundant numbers.
 */
/*
 * usage: 
   binarySearch ( array, target, left range, right range ); 
 */
function binarySearch ( $a, $t, $l, $r ) 
{ 
    if($t<$a[$l]||$t>$a[$r])return NULL; 
    while ( $l < $r ) 
    { 
        $m=intval($l+$r)/2; 
        if($a[$m]==$t)return $m; 
        elseif($t<$a[$m])$r=$m-1; 
        elseif($t>$a[$m])$l = $m + 1; 
    } 
    if($t==$a[$r]) 
    return $r; 
    return NULL; 
} 
    
//finds the sum of all the divisors of a number    
function sum_of_divisors($num)
{
    $sum = 0;
    
    for($i = 1; $i <= $num / 2; $i++)
    {
        if($num % $i == 0)
            $sum += $i;
    }
    
    return $sum;
}

//generate array of all abundant numbers
$abundant_numbers = array();

for($i = 1; $i <= 28123; $i++)
{
    if(sum_of_divisors($i) > $i)
    {
        $abundant_numbers[] = $i;
    }
}
sort($abundant_numbers);
/*
$works = array();
for($i = 1; $i < count($abundant_numbers); $i++)
{
    for($j = 1; $j < count($abundant_numbers); $j++)
    {
        if($abundant_numbers[$i] + $abundant_numbers[$j] <= 28123)
        {
            $works[$abundant_numbers[$i] + $abundant_numbers[$j]] = true;
            print "$abundant_numbers[$i] + $abundant_numbers[$j] works.\n";
        }
        else
            break;
    }
}
$sum = 0;
for($i = 1; $i <= 28123; $i++)
{
    if($works($i) != TRUE)
    {
        $sum += $i;
        print "$i is not a sum of abundants.\n";
    }
        
}
print $sum;
 * 
 */



function is_sum($num)
{
    global $abundant_numbers;
    if($num >= 48 && $num % 2 == 0)
        return true;
    for($i = 0; $abundant_numbers[$i] < $num; $i++)
    {
        $difference = $num - $abundant_numbers[$i];
        if(in_array($difference, $abundant_numbers))
                return true;
    }
    
    return false;
}

//find if number is a sum or not
$not_sum = 0;
for($num = 1; $num <= 28123; $num++)
{

    if(!is_sum($num))
    {
        $not_sum += $num;
        print "$num is not a sum.\n";
    }
}   

print "Total: " . $not_sum;


?>
