<?php
for($i=0;$i<500;$i++){
    $a[$i] = mt_rand(5500,6500);
    $a[$i] = $a[$i]/1000;
    $b[$i] = mt_rand(5500,6500);
    $b[$i] = $b[$i]/1000;

    $c[] = array($a[$i],$b[$i],10000000);
}
// var_dump($a);
// var_dump($b);
// $c = array(
//     1=>$a,
//     2=>$b
// );
echo "<pre>";
echo json_encode($c);