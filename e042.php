<?php
/*
The nth term of the sequence of triangle numbers is given by, tn = ½n(n+1); so the first ten triangle numbers are:

1, 3, 6, 10, 15, 21, 28, 36, 45, 55, ...

By converting each letter in a word to a number corresponding to its alphabetical position and adding these values we form a word value. For example, the word value for SKY is 19 + 11 + 25 = 55 = t10. If the word value is a triangle number then we shall call the word a triangle word.

Using words.txt (right click and 'Save Link/Target As...'), a 16K text file containing nearly two-thousand common English words, how many are triangle words?
 * 
 */
$start_time = microtime(true);


$words = file_get_contents('42.txt');
$words = explode(',', $words);
//sort($words);

//remove "" from the names
foreach($words as &$word)
{
    $word = str_replace('"', '', $word);
}
//print_r($names);
//print $names[937];

//gives you the score of any string
function word_score($string)
{
    //the number of points each character gets is the ASCII value - 64
    $points = 0;
    $string = str_split($string);
    
    foreach($string as $char)
    {
        $points += (ord($char) - 64);
    }
    
    return $points;
}

function is_triangular($num)
{
    $triangle = (-1 + sqrt(1 + 8*$num))/2;
    if(fmod($triangle, 1) == 0)
            return true;
    else
        return false;
}

//print var_export(is_triangular(word_score('SKY')));
//print_r($words);

//find number of triangular words
$count = 0;
foreach($words as $word)
{
    if(is_triangular(word_score($word)))
        $count++;
}

print $count;

$end_time = microtime(true);
$time = $end_time - $start_time;
print "\nExecution time: $time s.";
?>
