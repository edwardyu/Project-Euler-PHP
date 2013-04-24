<?php
/*
 * Starting in the top left corner of a 22 grid, and only being able to move to the right and down, there are exactly 6 routes to the bottom right corner.


How many such routes are there through a 2020 grid?
 */

function factorial($num)
{
    if($num == 0)
        return 1;
    else
        return $num * factorial($num - 1);
        
}

print factorial(40) / (factorial(20) * factorial(20));
?>
