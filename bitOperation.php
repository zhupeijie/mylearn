<?php

/**
 * 测试php位运算,异或: 转换为二进制, 同一个位一个为1,另一个为0, 则设置为1
 *  例如(二进制表示数字): $a = 12(1100);  $b = 21(10101)   则$c = $a^$b  $c=25(11001)
 * $a:  01100  = 12
 * $b:  10101  = 21
 * $c:  11001  = 25 = $a^$b
 */
function testXor()
{
    $a = 12;
    $b = 21;
    print_r(decbin($a));echo "\n";
    print_r(decbin($b));echo "\n";
    $a = $a^$b;
    print_r(decbin($a));
    echo "\n";
    //$b = $a^$b;
    //$a = $a^$b;
    //print_r($a);
    //echo "\n";
    //print_r($b);
    //echo "\n";
}


$n = 18;
$l = 2;

//$n = 10;
//$l = 5;

//$n = 5;
//$l = 3;
//for($i = 3;$i<=4;$i++){
//    echo $i.'==';
//
//}
//die;
//echo min(100,$n);die;
for($i = $l;$i<=min(100,$n);$i++){
    $now = $n/$i;

    if(1-($now-floor($now))*2 != $i%2){
        echo $i.'###'.$now."\n\r";
        continue;
    }

    $min = floor($now) - floor(($i-1)/2);

    if($min<0){
        echo $i.'@@@'.$now.'@@@'.$min."\n\r";
        continue;
    }

    $r = [];
    echo $i.'==='.$min;
    for ($l=0;$l<$i;$l++){
        $r[] = $min+$l;
    }
    print_r($r);
    echo implode('', $r);
    echo "\n\r";
    exit;
}



