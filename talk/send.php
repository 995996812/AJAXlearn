<?php 
$servername = '127.0.0.1';

$username = 'root'; 

$password = '123';

$link = mysqli_connect($servername,$username,$password,'db1');

mysqli_select_db($link,'utf8');//设置字符集

$msg_text = $_POST['msg_text'];
$color	  = $_POST['color'];
$biaoqing = $_POST['biaoqing'];
$chatob   = $_POST['chatob'];

$sql = "insert into message values('$msg_text','admin','$chatob','$color','$biaoqing',now(),null)";

if (mysqli_query($link,$sql)) {
	echo "发送成功";
}else{
	echo "发送失败";
}
 ?>
