<?php 
//php生成一个图片
//画板
$im = imagecreatetruecolor(400, 300);
//画笔
$green = imagecolorallocate($im, 0, 200, 0);
//颜色填充
imagefill($im, 10, 10, $green);

//暂停4秒  模仿服务器速度慢
sleep(4);
//输出图片 
header("content-type:image/jpeg");
imagejpeg($im);
//销毁图片
imagedestroy($im);
 ?>