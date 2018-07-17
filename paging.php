<?php 
//1. 引入分页类
include './page.class.php';

header("content-type:text/html;charset=utf-8");

$servername = '127.0.0.1';

$username = 'root'; 

$password = '123';

$link = mysqli_connect($servername,$username,$password,'db1');

mysqli_select_db($link,'utf8');//设置字符集

//实现数据分页

//2. 获取总记录条数
$sql = "select *from tab_goods";

$qry = mysqli_query($link,$sql);

$total = mysqli_num_rows($qry);

$per = 7; //每页显示的数据条数
//3. 实例化分页类对象
$page_obj = new Page($total,$per);
//4. 制作sql语句,获取每页信息
$sql3 = "select goods_name, goods_price, goods_number,goods_introduce from tab_goods ".$page_obj->limit;

$qry3 = mysqli_query($link,$sql3);

// echo $qry3;
//5. 获得页码列表
$pagelist = $page_obj->fpage(array(3,4,5,6,7,8));
echo <<<eof
	<style type="text/css">
		table{
			width: 700px;
			margin: auto;
			border: 1px solid black;
			border-collapse: collapse;
		}
		td{
			border: 1px solid black;
		}
	</style>
	<table>
	<tr>
		<td>序号</td>
		<td>名称</td>
		<td>价格</td>
		<td>数量</td>
		<td>简介</td>
	</tr>
eof;
$p = isset($_GET['page'])?$_GET['page']:1;
$num = ($p-1)*$per;
if(!is_resource($qry3)){
	while ($rst3 = mysqli_fetch_assoc($qry3)) {
	echo "<tr>";
	echo "<td>".++$num."</td>";
	echo "<td>".$rst3['goods_name']."</td>";
	echo "<td>".$rst3['goods_price']."</td>";
	echo "<td>".$rst3['goods_number']."</td>";
	echo "<td>".$rst3['goods_introduce']."</td>";
	echo "</tr>";
	}
	echo "<tr><td colspan='5'>$pagelist</td></tr>";
	echo "<table />";
}else{
	echo "没有数据";
};


 ?>