<?php 
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
$fp = fopen("./02.txt", "a");//追加方式打开02.txt文件(如果不存在会自动创建)

fwrite($fp, "[往后余生,请多指教]");

fclose($fp);
 ?>