<?php 
header("content-type:text/html;charset=utf-8");
//php代理获取天气信息
//跨域请求
$url = "http://www.weather.com.cn/data/sk/101010100.html";

$weather_info = file_get_contents($url); //1. 打开文件  2.向其他地址请求

echo $weather_info;
 ?>