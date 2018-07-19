<?php 
//获取最新的聊天内容
$servername = '127.0.0.1';

$username = 'root'; 

$password = '123';

$link = mysqli_connect($servername,$username,$password,'db1');

mysqli_select_db($link,'utf8');//设置字符集

$maxID = $_GET['maxID'];
//每次都请求新的数据
//本次请求的记录结果id需要大于上次已经获得记录的最大id
$sql = "select *from message where id>'$maxID'";

$qry = mysqli_query($link,$sql);
$info = array();

while ($rst = mysqli_fetch_assoc($qry)) {
	$info[] = $rst;
}
echo json_encode($info);
 ?>