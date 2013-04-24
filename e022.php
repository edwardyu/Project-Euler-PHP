<?php
/*
Using names.txt (right click and 'Save Link/Target As...'), a 46K text file 
 * containing over five-thousand first names, begin by sorting it into 
 * alphabetical order. Then working out the alphabetical value for each name, 
 * multiply this value by its alphabetical position in the list to obtain a 
 * name score.

For example, when the list is sorted into alphabetical order, COLIN, which is 
 * worth 3 + 15 + 12 + 9 + 14 = 53, is the 938th name in the list. So, COLIN 
 * would obtain a score of 938  53 = 49714.

What is the total of all the name scores in the file?
 * 
 */
//sort the array of names
$handle = fopen('22.txt', 'r');
$words = file_get_contents('22.txt');
$words = explode(',', $words);
sort($words);

//remove "" from the names
foreach($words as &$name)
{
    $name = str_replace('"', '', $name);
}
//print_r($names);
//print $names[937];

//gives you the score of any string
function name_score($string)
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




$sum = 0;


for($i = 0; $i < count($words); $i++)
{
    $sum += (($i + 1) * name_score($words[$i]));
}

print $sum;

?>
