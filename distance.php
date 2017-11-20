<?php

$d = distance([1,1], [4,4]);

echo 'distance is : ' .$d;



function distance( $p1=array(), $p2=array())
{
    /**
        The distance formula is derived from the Pythagorean theorem.
        To find the distance between two points (x1,y1) and (x2,y2), 
        all that you need to do is use the coordinates of these ordered pairs and apply the formula below.
                     _________________
        Distance =  √(x2−x1)2 + (y2−y1)2
        
        To find distance from (1,1) and (4,4) using the function below?
        
        $p1 =[1,1];
        $p2 =[4,4];
        
        distance($p1, $p2);
        
        OUTPUT : 4.2426406871193
        
        @Author: Prince Adeyemi
    */
    $x1 = $p1[0];
    $x2 = $p2[0];
    
    $y1 = $p1[1];
    $y2 = $p2[1];
    
    $distance = sqrt(($x2 - $x1)**2 + ( $y2 - $y1)**2);
    
    return $distance;
}
