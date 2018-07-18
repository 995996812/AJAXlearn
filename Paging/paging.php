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
$sql3 = "select goods_name gnm, goods_price gpr, goods_number gnu,goods_introduce gtrod from tab_goods ".$page_obj->limit;

$qry3 = mysqli_query($link,$sql3);

// echo $qry3;
//5. 获得页码列表
$pagelist = $page_obj->fpage(array(3,4,5,6,7,8));

$p = isset($_GET['page'])?$_GET['page']:1;
$num = ($p-1)*$per;
$info = array();
if(!is_resource($qry3)){//判断是否有数据
	while ($rst3 = mysqli_fetch_assoc($qry3)) {
		//$rst3代表每条记录的一堆数组信息
		//要把全部的$rst3整合到一起,变为一个二维数组
		$rst3['x'] = ++$num;//设置序号
		$info[] = $rst3;
	}
	$info[] = $pagelist;
	// print_r($info);
	echo json_encode($info);
	//需要把全部的信息整合一下
	//json_encode()只能使用一次
}else{
	echo "没有数据";
};


 ?>