<?php
/**
 * 排序算法实现
 *
 */

//1:冒泡排序 从小到大 时间复杂度(O(n*n))
function popSort($array)
{
    $num = count($array);
    for ($i = 0; $i < $num - 1; $i++) {
        for ($j = 0; $j < $num - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

$originArray = [43, 62, 61, 5, 1, 6, 12, 63, 90, 103, 39];
//print_r(popSort($originArray));


//2:快速排序, 从小到大 时间复杂度(nO(lon2n))
function qkSort($array)
{
    if ( !is_array($array)) {
        return false;
    }
    if (count($array) < 2) {
        return $array;
    }
    $left = $right = [];
    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $array[0]) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }
    //递归调用
    $left = qkSort($left);
    $right = qkSort($right);

    return array_merge($left, [$array[0]], $right);

}

//3:选择排序, 从小到大, 时间复杂度 O(n*n)
function selectSort($array)
{
    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        $p = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($array[$j] < $array[$p]) {
                $p = $j;
            }
        }
        if ($p != $i) {
            $tmp = $array[$p];
            $array[$p] = $array[$i];
            $array[$i] = $tmp;
        }

    }

    return $array;

}


//4: 插入排序, 时间复杂度(O(n*n))
function inSort($array)
{
    for ($i = 1; $i < count($array); $i++) {
        $temp = $array[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($temp < $array[$j]) {
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            } else {
                break;
            }
        }
    }

    return $array;
}



print_r(inSort($originArray));



//print_r(qkSort($originArray));