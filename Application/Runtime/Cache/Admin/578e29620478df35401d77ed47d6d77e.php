<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>称重操作台入口</title>
</head>
<link rel=”icon” href="/Public/home/img/favicon.ico" mce_href="/Public/home/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/Public/home/img/favicon.ico" mce_href="/Public/home/img/favicon.ico" type="image/x-icon">
    <title>称重系统</title>
    <script src="/Public/home/jquery.js"></script>
    <script src="/Public/home/style.css"></script>
    <script type="text/javascript">
      window.onload= function(){
        document.getElementById("record").focus();
      }
      </script>



  <body rel="index" style=" background-color:#d9e9f9;" scroll="no">
     <form action="" method="post">
      <center>

          <div class="div_style" style="border:#F9F9F9 20px solid; width:800px;background:#FFF;border-radius:5px;">
               <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF" style="border-collapse: collapse;">
                 
                         <tbody><tr>
                          <td height="70" colspan="2" align="center" bgcolor="#b9dbff" style="line-height:50px; font-size:45px; font-family: '黑体', '宋体'; color: #369;">称重操作台</td>
                    </tr>
                       <tr>
                      <td height="70" align="right" bgcolor="#d4ddea" style="line-height:50px; font-size:40px; font-family: '黑体', '宋体';  color:#369; ">店铺验证码：</td>
                      <td align="left" bgcolor="#ebf2fd" style="PADDING:5px 0px 5px 30px; line-height:50px; font-size:40px; font-family: '黑体', '宋体'; color:#369; ">
                      <input name="login" type="text" class="input" id="record" style="font-size:36px; width:380px; height:45px; line-height:40px; color:#036; padding:0 5px; vertical-align:middle;" autocomplete="off" disableautocomplete="" onblur="javascript:document.getElementById('record').focus();" onchange="javascript:document.getElementById('record').focus();">

                      <span class="Tooltip" title="请先输入店铺验证码<br>店铺验证码每天最多不能连续输错10次<br>当输错次数达到10次则锁定登陆状态<br>则24小时内不能登陆称重系统"><img src="/Public/home/img/help.png" width="25" style="vertical-align:middle;">
                      </span>
                      <input name="action" id="action" type="hidden" value="CheckShopCodeBar"></td>
                    </tr>
                    <tr>
                      <td height="70" colspan="2" align="center" bgcolor="#cfecfe">
                      <input type="button" name="submit22" value="快捷链接下载" class="go-wenbenkuang Tooltip" title=" 以后双击下载的链接即可进入本应用" style="PADDING:5px 10px; line-height:32px; font-size:30px; font-family: '黑体', '宋体'; width:260px;color:#369;" onclick="window.location.href='index.asp?action=downloadQuicklink'">&nbsp;
                        <input type="submit" name="submit" value=" 确 定 " class="go-wenbenkuang Tooltip" title="如果扫描枪不支持回车功能<br>则录入数据以后需要点确定按钮来提交数据" style="PADDING:5px 10px; line-height:32px; font-size:30px; font-family: '黑体', '宋体'; width:260px;color:#369;"></td>
                    </tr>
                 
           </tbody></table>
      </div>
      </center>

      <input type="hidden" name="cip" value="">
      <input type="hidden" name="number" value="">
    </form>
  </body>
</html>