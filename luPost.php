<?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: zpj
 * Date: 17-11-3
 * Time: 下午9:24
 */
//链接mysql服务
$db = mysqli_connect("127.0.0.1", "root", "root");
//选择数据库
mysqli_select_db($db, "test_1");
//设置数据库编码格式
mysqli_set_charset($db, 'utf8');

//sql语句
$selectSql = 'select * from products where 1=1 ';

$postData = $_POST;
//拼接sql 条件
$andWhere = '';
if (isset($postData['series_id']) && $postData['series_id']) {
    $andWhere .= " and series in (" . trim($postData['series_id'], ',') . ')';
}
if (isset($postData['type_id']) && $postData['type_id']) {
    $andWhere .= " and type in (" . trim($postData['type_id'], ',') . ')';
}
if ($andWhere) {
    $selectSql .= $andWhere;
}

//查询
$result = mysqli_query($db, $selectSql);
$listArray = [];
//组装最后的数组
while ($rows = mysqli_fetch_assoc($result)) {
    $listArray[] = $rows;
}
//print_r($listArray);
$returnData = [
    'status' => 0,
    'message' => 'fail',
    'data' => []
];
if ($listArray) {
    $returnData = [
        'status' => 1,
        'message' => 'success',
        'data' => $listArray
    ];

}
//输出结果
echo json_encode($returnData, true);

