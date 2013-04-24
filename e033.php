<?php
/*
 * The fraction 49/98 is a curious fraction, as an inexperienced mathematician in attempting to simplify it may incorrectly believe that 49/98 = 4/8, which is correct, is obtained by cancelling the 9s.

We shall consider fractions like, 30/50 = 3/5, to be trivial examples.

There are exactly four non-trivial examples of this type of fraction, less than one in value, and containing two digits in the numerator and denominator.

If the product of these four fractions is given in its lowest common terms, find the value of the denominator.
 */
function is_curious_fraction($numerator, $denominator)
{
    $test_fraction = cancel_incorrectly($numerator, $denominator);
    
    if($numerator >= $denominator)
        return false;
    else if($numerator % 10 == 0 && $denominator % 10 == 0)
        return false;
    else if($test_fraction == null)
            return false;
    else if((double) $numerator / (double) $denominator == $test_fraction[0] / $test_fraction[1])
            return true;
    
}

function cancel_incorrectly($numerator, $denominator)
{
    $digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $numerator = (string) $numerator;
    $denominator = (string) $denominator;
    foreach($digits as $digit)
    {
        if(strpos($numerator, $digit) !== false && strpos($denominator, $digit) !== false)
        {
            $numerator = str_replace($digit, '', $numerator);
            $denominator = str_replace($digit, '', $denominator);
            return array(floatval($numerator), floatval($denominator));
        }
    }
    
    return null; 

}

//print_r(cancel_incorrectly(49, 98));
$fractions = array();
for($a = 10; $a < 100; $a++)
{
    for($b = 10; $b < 100; $b++)
    {
        if(is_curious_fraction($a, $b))
                $fractions[] = $a . "/" . $b;
    }
}

print_r($fractions);
?>
