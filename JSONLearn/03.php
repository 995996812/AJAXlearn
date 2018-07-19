<?php 

//收集表单域信息$_POST 和 上传文件域信息 $_FILES
// echo "post: ";

// print_r($_POST);

// echo "FILES: ";

// print_r($_FILES);
if ($_FILES['userpic']['error']>0) {
	exit('附近有异常问题');
}
// 1.附件的存储的位置,附件的名字
$path = "../upload/";

$name = mt_rand(1000,9999).$_FILES['userpic']['name']; //原名字

$truename = $path.$name;

// 2. 把附近从临时路径位置移动到真实位置
if (move_uploaded_file($_FILES['userpic']['tmp_name'], $truename)) {
 	echo "上传成功";
 }else{
 	echo "上传失败";
 }
 ?>