<?php
namespace mywork;

use mywork1\getParams;

require_once('getParams.php');
require_once('myFunctions.php');

$d = myFunctions::zAdd(1,2);
echo $d;
die;

$a = getParams::getIn('姓名');
$b = getParams::getIn('年龄');
$c = getParams::getIn('身高');


echo '您的姓名:' . $a . ',您的年龄是:' . $b . ',您的身高是:' . $c . "\n\r";

