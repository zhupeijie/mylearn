<?php
/**
 * Created by PhpStorm.
 * User: zpj
 * Date: 17-11-5
 * Time: 下午9:55
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试鲁筛选功能</title>
    <script src="jquery-1.8.3.min.js"></script>
</head>
<style>
    ul li {
        display: block;
        float: left;
        margin: 0 5px;
    }
    .data_box li{
        margin: 8px 5px;
    }
    a {
        text-decoration: none
    }

    .check_li_box_checked {
        background-color: #abc;
        color: red;
    }
</style>
<body>
<div>
    产品系列
    <ul class="product_series">
        <li><a href="javascript:void(0)" class="series_check check_li_box check_li_box_checked" data-series="1"
               data-checked="1">蜜蜂堂</a></li>
        <li><a href="javascript:void(0)" class="series_check check_li_box" data-series="2" data-checked="0">马蜂堂</a></li>
        <li><a href="javascript:void(0)" class="series_check check_li_box" data-series="3" data-checked="0">黄蜂堂</a></li>
    </ul>
</div>
<div style="clear: both"></div>
<div>
    产品类型
    <ul class="product_type">
        <li><a href="javascript:void(0)" class="type_check check_li_box check_li_box_checked" data-type="10"
               data-checked="1">饮品</a>
        </li>
        <li><a href="javascript:void(0)" class="type_check check_li_box" data-type="20" data-checked="0">糕点</a></li>
        <li><a href="javascript:void(0)" class="type_check check_li_box" data-type="30" data-checked="0">护肤品</a></li>
    </ul>
</div>
<div style="clear: both"></div>
<div>
    结果列表
    <ul class="data_box">
        <li>
            <div style="border: 1px solid #333">
                <span>蜜蜂堂产品2:</span><span>蜂王浆</span><br>
                <span>价格:</span><span>20.00</span><span>元</span>
            </div>
        </li>
        <li>
            <div style="border: 1px solid #333">
                <span>蜜蜂堂产品3:</span><span>蜂王浆糕点</span><br>
                <span>价格:</span><span>50.00</span><span>元</span>
            </div>
        </li>
    </ul>
</div>
</body>
<script>
    //页面加载的时候 初次加载数据
    $(document).ready(function () {
        afterChoice();
    });
    //每次点击事件, 加载数据
    $(function () {
        $('.check_li_box').click(function () {
            if($(this).data('checked')){
                $(this).data('checked','0');
                $(this).removeClass('check_li_box_checked');
            }else{
                $(this).data('checked','1');
                $(this).addClass('check_li_box_checked');
            }
            afterChoice();
        })
    })
    //每次选择后加载数据,修改选中状态
    function afterChoice() {
        var series_id = '';
        var type_id = '';
        $('.series_check').each(function () {
            if ($(this).data('checked')) {
                series_id += $(this).data('series') + ','
            }
        })
        $('.type_check').each(function () {
            if ($(this).data('checked')) {
                type_id += $(this).data('type') + ','
            }
        })
        ajaxData(series_id, type_id);
    }
    //ajax获取数据
    function ajaxData(series_id='', type_id='') {
        //模板
        var stringTmp = '<li><div style="border: 1px solid #333"> <span>蜜蜂堂产品2:</span><span>蜂王浆</span><br> <span>价格:</span><span>20.00</span><span>元</span> </div> </li>';
        //插入的数据
        var new_string = '';
        $.ajax({
            type: "post",
            url: "http://www.mywork.net:81/luPost.php",
            data: {series_id: series_id, type_id: type_id},
            dataType: "json",
            success: function (data) {
                if (data.status) {
                    for (i = 0; i < data.data.length; i++) {
                        stringTmp = '<li><div style="border: 1px solid #333"> <span>蜜蜂堂产品2:</span><span>' + data.data[i].name + '</span><br> <span>价格:</span><span>' + data.data[i].price + '</span><span>元</span> </div> </li>';
                        new_string += stringTmp;
                    }
                    $('.data_box').html(new_string);
                } else {
                    alert('网络异常, 请稍后重试')
                }
            },
            error:function () {
                alert('服务器异常')
            }
        })
    }
</script>
</html>
