<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>称重操作台</title>
<script>
    window.onload = function(){
       document.getElementById('record').focus();
    }
</script><style type="text/css">
.div_style {  
	position:absolute; 
	left:50%; 
	/*top:50%;*/ 
	margin:50px 0 0 -420px; 
} 
</style>
    
    </head>



<body rel="index" style=" background-color:#d9e9f9;" scroll="no">


<embed src="msg_err.wav" autostart="true" loop="false" hidden="true">
    <div class="div_style" style="border:#F9F9F9 20px solid; width:800px;background:#FFF;border-radius:5px;">
         <table style="border-collapse: collapse;" cellspacing="2" cellpadding="2" bordercolor="#FFFFFF" align="center" border="0" width="100%">
            <form action="index.asp?record=666666.006" method="post"></form>
                  <tbody><tr>
                    <td style="line-height:50px; font-size:45px; font-family: '黑体', '宋体'; color: #369;" bgcolor="#b9dbff" align="center" height="70">操作提示</td>
              </tr>
                 <tr>
                <td style="PADDING:5px 0px 5px 30px; line-height:30px; font-size:18px; font-family:'宋体'; color:red; " bgcolor="#ebf2fd" align="left" height="120">订单拦截,该称重操作失败！！<br><br>该订单信息待确认,请挑选出该订单放置一边等待核实！！<input name="record" id="record" value="666666.006" type="hidden"></td>
              </tr>
              <tr>
                <td bgcolor="#cfecfe" align="center" height="70">
                  <input onclick=" location.href='/index.php/Admin/Weightstation/index'" name="submit" value=" 确 定 " class="go-wenbenkuang Tooltip" title="2秒后自动跳转，如不跳转请点确定按钮继续操作..." style="PADDING:5px 10px; line-height:32px; font-size:30px; font-family: '黑体', '宋体'; width:400px;color:#369;" type="submit"></td>
              </tr>
           
     </tbody></table>
</div>


<div style="clear:both; margin:20px auto 0 auto; padding:0; width:400px;color:#c1c1c1;">页面执行时间：0.13 秒</div>


</body></html>