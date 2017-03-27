<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../skin/favicon.ico">
<link href="../skin/default/default.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.11.1.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/dialog-plus-min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/main.js" charset="utf-8"></script>

<title>ERP企业管理系统</title>
</head>

<script>
       function href(){
          location.href = 'index.php/admin/Weightstation/index';
       }
</script>    
    
<body rel="index">

		<div style=" width:400px; height:250px; margin:100px auto; border:#e5e5e5 solid 1px; color:#333; font-size:12px;">
		<div style=" width:380px; height:50px; border-bottom:#e5e5e5 solid 1px; line-height:48px; text-align:left; font-size:14px; font-weight:bold; padding-left:10px;">
		会员登录
		</div>
		<p style="margin-top:10px; font-size:12px;padding-left:50px;" align="left"><font color="#993333">• 您尚未登录或长时间未操作导致授权失效，请重新登录</font></p>
		<form action="" method="post">
		<div style=" width:360px; height:50px;line-height:30px; text-align:left; font-size:14px; padding:20px; margin:0 auto;">
		<p style="margin-top:10px; font-size:16px; color:#666666; line-height:30px;" align="center">用户账号：&nbsp;<input name="accounts" id="mobile" value="" size="30" class="input" style="width:200px;" type="text"><input name="GoToUrl" id="GoToUrl" value="http://192.168.0.200/weight/main/index.asp" type="hidden"></p>
		<p style="margin-top:10px; font-size:16px; color:#666666; line-height:30px;" align="center">登录密码：&nbsp;<input name="Password" id="Password" value="" size="30" class="input" style="width:200px;" type="password"></p>
		<p style="margin-top:20px;" align="center">
                    <input onclick="href()" value="进称重系统" class="btn" style="height:35px; color:#FFF; font-size:16px; background:#428bca; border:#999 solid 1px; line-height:25px; width:120px;" type="button">&nbsp;&nbsp;<input style="height:35px; color:#FFF; font-size:16px; background:#428bca; border:#999 solid 1px; line-height:25px; width:120px;" class="btn" name="button" id="button" value="&nbsp;&nbsp;登&nbsp;&nbsp;录&nbsp;&nbsp;" type="submit"></p>
		</div>
		</form>
		</div>
		</body>
           </html>