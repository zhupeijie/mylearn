<?php
$data = [
   1=>'白',
   2=>'夜',
   3=>'下',
   4=>'休'
];
function xrang($start,$end,$step){
 if($start>$end){
     if($step>=0){
	 throw new Exception('step must be -num');
    }
    for($i=$end;$i<= $start;$i+=$step){
		yield $i;
	}
  }else{
  	if($step<=0){
		throw new Exception('step must be +num');
	}
   	for($i=$start;$i<=$end;$i+=$step){
		yield $i;
	}
  }
}

foreach(xrang(1,9,1) as $num){
 echo "$num ";
}

