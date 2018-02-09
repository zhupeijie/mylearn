<?php


 function fib_interation ($n)  
    {  
        $fib = array(); // 定义fibonacci数组  
          
        if ($n < 0) {  
            return 0;  
        }  
          
        for ($fib[0] = 0, $fib[1] = 1, $i = 2; $i <= $n; $i ++) {  
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];  
        }  
          
        return $fib[$n];  
    }  
  
    /** 
     * Description:递归方法获取fibonacci第n项数值 
     * 
     * @param int $n             
     * @return int 
     */  
     function fib_recursive ($n)  
    {  
        if ($n <= 0) {  
            return 0;  
        } elseif ($n == 1) {  
            return 1;  
        } else {  
            return self::fib_recursive($n - 1) + self::fib_recursive($n - 2);  
        }  
    }  
    for ($i=0; $i < 5; $i++) { 
        print_r(fib_interation($i));
        echo "\n";
        # code...
    }
    die;


 function  f($a)
 {
    return  $a<2 ? 1 : f($a-1) + f ($a-2);
 }
  121393
 print_r(f(25));die;

// echo 'aaa';die;

$a = 0;
$b = 1;
$c = 0;
for ($i=0; $i <= 50; $i = $i+2) { 
    $c = $a+$b;
    $a = $b;
    $b=$c;
}
print_r($b);die;




/**
 * Created by PhpStorm.
 * User: zpj
 * Date: 17-8-11
 * Time: 上午10:56
 */
date_default_timezone_set("etc/gmt-8");
header("Content-type: text/html; charset=utf-8");
class calendar{
    var $t = array();
    var $datesofmonth = array('1'=>'31','2'=>'28','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'31');
    var $y,$m,$d;
    function set($time){
        $this->t = getdate($time);
        $this->y = $this->t['year'];
        $this->m = $this->t['mon'];
        $this->d = date('d',$time);
    }
    function isrun(){
        return ($this->y%400==0 || ($this->y%4==0 && $this->y%100==0)) ? 1 : 0;
    }
    function first(){
        $time = mktime(0,0,0,$this->m,1,$this->y);
        $time = getdate($time);
        return $time['wday'];
    }
    function html(){
        $isrun = $this->isrun();
        $this->datesofmonth[2] = $isrun==1 ? 29: 28;

        $html = "<table style='border:solid 1px black;'>n";
        $html .= "<tr><th><a href=''>上一月</a></th><th colspan='5'>{$this->y}年 {$this->m}月</th><th><a href=''>下一月</a></th><tr>n";
        $html .= "<tr><td>星期天</td><td>星期一</td><td>星期二</td>jb51.net<td>星期三</td><td>星期四</td><td>星期五</td><td>星期六</td></tr>n";
        $html .= "<tr>n";
        $first = $this->first();
        for($i=0; $i<$first; $i++){
            $html .= "<td></td>";
        }
        $count = $this->datesofmonth[$this->m]+$first;
        for ($i=1; $i<= $this->datesofmonth[$this->m]; $i++){
            $style = $i==$this->d ? ' style="color:red;font-weight:bold;"' : '' ;
            $html .= "<td align='center'{$style}>$i</td>";
            if (($i==7%$first || ($i+$first)%7==0) && $i<$count){
                $html .= "</tr>n<tr>";
            }
        }
        $count = 7-$count%7;
        if ($count<7){
            for ($i=0; $i<$count; $i++){
                $html .= "<td></td>";
            }
        }
        $html .= "</tr>n";
        $html .= "</table>n";
        return $html;
    }
}
$calendar = new calendar();
$calendar->set(time());
echo $calendar->html();