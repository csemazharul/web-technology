<?php

$m=3;
$n=5;
$allocation=[
    [0,1,0],
    [2,0,0],
    [3,0,2],
    [2,1,1],
    [0,0,2]
];
$max=[
    [7,5,3],
    [3,2,2],
    [9,0,2],
    [2,2,2],
    [4,3,3]
];
$avail=[3,3,2];
$f=[];
$need=[];
for ($k=0;$k<$n;$k++) {
    $f[$k]=0;
}
$need=[];
for ($i=0;$i<$n;$i++) {
    for ($j=0;$j<$m;$j++) {
        $need[$i][$j]=$max[$i][$j]-$allocation[$i][$j];
    }
}
$y=0;
for ($k=0;$k<5;$k++) {
    for ($i=0;$i<$n;$i++) {
        if ($f[$i]===0) {
            $flag=0;
            for ($j=0;$j<$m;$j++) {
                if ($need[$i][$j]>$avail[$j]) {
                    $flag=1;
                    break;
                }
            }
            if ($flag===0) {
                $ans[$y++]=$i;
                for ($w=0;$w<$m;$w++) {
                    $avail[$w]=$avail[$w]+$allocation[$i][$w];
                }
                $f[$i]=1;
            }
        }
    }
}
$flag=1;
for ($i=0;$i<$n;$i++) {
    if ($f[$i]==0) {
        $flag=0;
        echo("The following system is not safe");
        break;
    }
}
if ($flag==1) {
    echo("The following system is safe");
    echo("The safe sequence is:");
    for ($i=0;$i<$n-1;$i++) {
        echo("P".$ans[$i]."->");
    }
    echo("P".$ans[$n-1]);
}
