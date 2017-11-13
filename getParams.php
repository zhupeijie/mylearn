<?php
namespace mywork1;
    /**
     *  获取命令行用户传入的参数
     */
////一 : 通过参数获取
//print_r($argv);
//echo "\n\r";
////获取命令行传入的参数个数
//print_r($argc);
//die;

////二: 通过getopt函数获取传入的参数
//$paramsArray = getopt('a:b:c:d:');
//
//print_r($paramsArray);
//die;


//三: 通过提示用户输入接收参数
//fwrite(STDOUT,'请输入您的参数');
//
//print_r(fgets(STDIN));
//die;
class getParams
{

    //四: 判断用户输入的格式不为空的提示用户输入
    public static function getIn($inName = '名称')
    {
        $fs = true;

        do {
            if ($fs) {
                fwrite(STDOUT, '请输入您的' . $inName . ':');
                $fs = false;
            } else {
                fwrite(STDOUT, '抱歉,名称不能为空,请重新输入您的' . $inName . ':');
            }
            $name = trim(fgets(STDIN));
        } while (!$name);


        return $name;
    }
}

function getIn($inName = '名称')
{
    $fs = true;

    do {
        if ($fs) {
            fwrite(STDOUT, '请输入您的' . $inName . ':');
            $fs = false;
        } else {
            fwrite(STDOUT, '抱歉,名称不能为空,请重新输入您的' . $inName . ':');
        }
        $name = trim(fgets(STDIN));
    } while (!$name);


    return $name;
}

