<?php

/**
 * 实现简单日历
 */
class calendar
{
    //每月对应的数
    public $monthDays = [
        '1' => '31',
        '2' => '28',
        '3' => '31',
        '4' => '30',
        '5' => '31',
        '6' => '30',
        '7' => '31',
        '8' => '31',
        '9' => '30',
        '10' => '31',
        '11' => '30',
        '12' => '31'
    ];
    public $nowWork;
    public $nexWork;

    public $workName = ['白', '夜', '下', '休'];


    public $date, $y, $m, $d;

    //获取当前时间
    public function set($time)
    {
        $this->date = getdate($time ?: time());
        $this->y = $this->date['year'];
        $this->m = $this->date['mon'];
        $this->d = $this->date['mday'];
    }

    //获取这个月第一天的排班
    public function setWork($work)
    {
        $counts = 1;
        while ($counts) {
            $firstWork = array_shift($this->workName);
            if ($work == $firstWork) {
                array_unshift($this->workName, $firstWork);
                $counts = 0;
            } else {
                array_push($this->workName, $firstWork);
            }
        }
         return $this->workName;
    }

    public function initWork()
    {
        print_r($this->d);
        for ($i = $this->d; $i > 1; $i--) {
            $ch = array_pop($this->workName);
            array_unshift($this->workName, $ch);
        }
    }
    /**
     * 是否是润年
     */
    public function isRunYear()
    {
        if ($this->y % 400 == 0 || ($this->y % 4 == 0 && $this->y % 100 == 0)) {
            return true;
        }
        return false;
    }

    //第一天
    public function firstDayWeek()
    {
        $time = mktime(0, 0, 0, $this->m, 1, $this->y);
        $time = getdate($time);
        return $time['wday'];
    }

    public function echoDate()
    {
        //判断是否是润年
        if (self::isRunYear()) {
            $this->monthDays['2'] = 29;
        }
        echo str_repeat(' ', 16) . $this->y . "年" . $this->m . '月';
        echo "\n\r";
        echo '  日    一    二    三    四    五    六  ';
        echo "\n\r";
        $str = "";
        //输出第一天的空格
        for ($i = 0; $i < $this->firstDayWeek(); $i++) {
            $str .= "      ";
        }
        $count = $this->monthDays[$this->m] + $this->firstDayWeek();//计算循环的天数
        for ($i = 0; $i < $this->monthDays[$this->m]; $i++) {
            $this->nowWork = array_shift($this->workName);
            $str .= " " . ($i < 9 ? '0' . ($i + 1) : $i + 1) . $this->nowWork . " ";
            array_push($this->workName, $this->nowWork);
            $this->nexWork = $this->workName[0];
            if (($i + $this->firstDayWeek() - 6) % 7 == 0 && $i < $count) {
                $str .= "\n\r";
            }
            $count++;
        }
        echo $str;
        echo "\n\r";
    }

}


$setNowWork = '下';
for ($i = 8; $i <= 12; $i++) {
    $a = new calendar();
    $a->set(mktime(0, 0, 0, $i, date("d"), 2017));
    $a->setWork($setNowWork);
    $a->initWork();
    $a->echoDate();
    $setNowWork = $a->nexWork;
}





