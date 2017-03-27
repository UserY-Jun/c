<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP生成带LOGO图标的二维码</title>
<style>
body{font-family:微软雅黑;background-color:#f3f3f3;}
#main{margin:0 auto;border:1px solid #ccc;background-color:#fff;width:750px;margin-top:100px;padding:18px;text-align:center;}
.title{font-size:40px;text-align:center;}
#sea_area_left{margin:0 auto;border:3px solid #E56A6A;padding-left:5px;width:550px;margin-top:15px;height:40px;}
.searchtext{float:left;border:0px;width:350px;padding:5px;font-size:14.5pt;font-family:"Microsoft YaHei","微软雅黑",Verdana !important;}
.searchbtn{height:40px;border:0px;width:189px;font-family:"Microsoft YaHei","微软雅黑",Verdana !important;color:white;padding:3px;background-color:#E56A6A;font-size:15pt;}
* html input#searchbutton{margin-bottom:-1px;height:40px;}
*+html input#searchbutton{margin-bottom:-1px;height:40px;}
</style>
</head>
<body>
<div id="main">
<span class="title">PHP生成带LOGO图标的二维码</span>
<hr>
<?php
if(!empty($_POST['keyword'])){
include ('phpqrcode.php');
$value = $_POST['keyword'];//二维码数据
//echo $value;
$errorCorrectionLevel = 'L';//纠错级别：L、M、Q、H
$matrixPointSize = 10;//二维码点的大小：1到10
QRcode::png ( $value, 'ewm.png', $errorCorrectionLevel, $matrixPointSize, 2 );//不带Logo二维码的文件名
$logo = 'emwlogo.gif';//需要显示在二维码中的Logo图像
$QR = 'ewm.png';
if ($logo !== FALSE) {
    $QR = imagecreatefromstring ( file_get_contents ( $QR ) );
    $logo = imagecreatefromstring ( file_get_contents ( $logo ) );
    $QR_width = imagesx ( $QR );
    $QR_height = imagesy ( $QR );
    $logo_width = imagesx ( $logo );
    $logo_height = imagesy ( $logo );
    $logo_qr_width = $QR_width / 5;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height / $scale;
    $from_width = ($QR_width - $logo_qr_width) / 2;
    imagecopyresampled ( $QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height );
}
imagepng ( $QR, 'ewmlogo.png' );//带Logo二维码的文件名
?>
<img src="ewmlogo.png"><br>
成功创建二维码，预览图如上所示<br>有时可能缓存原因，本预览图可能未更新，请手动打开ewmlogo.png文件查看<br>
<a href="ewmlogo.php">重新生成</a>
<?php }else{ ?>
<div id="sea_area_left">
<form name="searchform" method="post" action="ewmlogo.php">
<input name="keyword" type="text" id="keyword" value="http://" class="searchtext"/>
<input type="submit" id="searchbutton" value="生成" class="searchbtn" />
</form>
</div><br>
请将需要显示在二维码中的LOGO图像命名为emwlogo.gif，格式：gif，放在本文件目录下<br>
请在上面的文本框中输入正确的网址，若网址格式不对，则生成的二维码无效。
<?php } ?>
</div> 
</body>
</html>