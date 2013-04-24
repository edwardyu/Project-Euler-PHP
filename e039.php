<?php
/*
 * If p is the perimeter of a right angle triangle with integral length sides, {a,b,c}, there are exactly three solutions for p = 120.

{20,48,52}, {24,45,51}, {30,40,50}

For which value of p  1000, is the number of solutions maximised?
 */

function num_solutions($perimeter)
{
    $count = 0;
    for($a = 1; $a <= $perimeter; $a++)
    {
        for($b = 1; $b <= $perimeter - $a; $b++)
        {
            if($b >= $a)
                break;
            $c = $perimeter - $a - $b;
            if(pow($a, 2) + pow($b, 2) == pow($c, 2))
                    $count++;
        }
    }
    
    return $count;
}

$max_solutions = 0;
$best_p = 0;
for($p = 1; $p <= 1000; $p++)
{
    $solutions = num_solutions($p);
    
    if($solutions >= $max_solutions)
    {
        $best_p = $p;
        $max_solutions = $solutions;
        print "A triangle with a perimeter of $p has $solutions solutions.\n";
    }
           
}

print "The perimeter with the most solutions is $best_p";
?>
