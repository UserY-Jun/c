<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP���ɴ�LOGOͼ��Ķ�ά��</title>
<style>
body{font-family:΢���ź�;background-color:#f3f3f3;}
#main{margin:0 auto;border:1px solid #ccc;background-color:#fff;width:750px;margin-top:100px;padding:18px;text-align:center;}
.title{font-size:40px;text-align:center;}
#sea_area_left{margin:0 auto;border:3px solid #E56A6A;padding-left:5px;width:550px;margin-top:15px;height:40px;}
.searchtext{float:left;border:0px;width:350px;padding:5px;font-size:14.5pt;font-family:"Microsoft YaHei","΢���ź�",Verdana !important;}
.searchbtn{height:40px;border:0px;width:189px;font-family:"Microsoft YaHei","΢���ź�",Verdana !important;color:white;padding:3px;background-color:#E56A6A;font-size:15pt;}
* html input#searchbutton{margin-bottom:-1px;height:40px;}
*+html input#searchbutton{margin-bottom:-1px;height:40px;}
</style>
</head>
<body>
<div id="main">
<span class="title">PHP���ɴ�LOGOͼ��Ķ�ά��</span>
<hr>
<?php
if(!empty($_POST['keyword'])){
include ('phpqrcode.php');
$value = $_POST['keyword'];//��ά������
//echo $value;
$errorCorrectionLevel = 'L';//������L��M��Q��H
$matrixPointSize = 10;//��ά���Ĵ�С��1��10
QRcode::png ( $value, 'ewm.png', $errorCorrectionLevel, $matrixPointSize, 2 );//����Logo��ά����ļ���
$logo = 'emwlogo.gif';//��Ҫ��ʾ�ڶ�ά���е�Logoͼ��
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
imagepng ( $QR, 'ewmlogo.png' );//��Logo��ά����ļ���
?>
<img src="ewmlogo.png"><br>
�ɹ�������ά�룬Ԥ��ͼ������ʾ<br>��ʱ���ܻ���ԭ�򣬱�Ԥ��ͼ����δ���£����ֶ���ewmlogo.png�ļ��鿴<br>
<a href="ewmlogo.php">��������</a>
<?php }else{ ?>
<div id="sea_area_left">
<form name="searchform" method="post" action="ewmlogo.php">
<input name="keyword" type="text" id="keyword" value="http://" class="searchtext"/>
<input type="submit" id="searchbutton" value="����" class="searchbtn" />
</form>
</div><br>
�뽫��Ҫ��ʾ�ڶ�ά���е�LOGOͼ������Ϊemwlogo.gif����ʽ��gif�����ڱ��ļ�Ŀ¼��<br>
����������ı�����������ȷ����ַ������ַ��ʽ���ԣ������ɵĶ�ά����Ч��
<?php } ?>
</div> 
</body>
</html>