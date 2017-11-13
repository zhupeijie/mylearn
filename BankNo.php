<?php
/**
 * Created by PhpStorm.
 * User: zpj
 * Date: 17-9-22
 * Time: 上午11:40
 */
$str = '6228480402564890018';

preg_match('/([\d]{4})([\d]{4})([\d]{4})([\d]{4})([\d]{0,})?/', $str,$match);
print_r($match);
unset($match[0]);
echo implode(' ', $match);