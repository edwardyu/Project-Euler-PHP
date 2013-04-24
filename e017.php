<?php

/*
If the numbers 1 to 5 are written out in words: one, two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.

If all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?


NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters. The use of "and" when writing out numbers is in compliance with British usage.
 */



//converts a number to a word for (0, 1000]
function num2word($num)
{
    $singles = ['','one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 
            'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

    $doubles = ['','ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    
    if($num == 1000)
        return 'onethousand';
    
    else if($num >= 0 && $num <= 19)
    {
        return $singles[$num];
    }
    
    else if($num >= 20 && $num <= 99)
    {
        $first_digit = (string) $num / 10;
        $second_digit = (string) $num % 10;
        
        return $doubles[$first_digit] . $singles[$second_digit];
    }
    
    else if($num == 100)
        return 'onehundred';
    else
    {
        $num = (string) $num;
        $first_digit = (string) $num / 100;
        $second_digit = (string) $num[1];
        $third_digit = (string) $num  % 10;
        
        return $singles[$first_digit] . 'hundredand' . num2word(intval(substr($num, 1)));
    }
    
}

//letters from [1, 1000]
$sum = 0;
for($i = 1; $i <= 1000; $i++)
{
    $sum += strlen(num2word($i));
    //print num2word($i) . "\n";
}

//110 is one hundred ten, not one hundred and ten. Subtract and * 8
print $sum - 24;
?>
