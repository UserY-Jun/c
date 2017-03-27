<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../skin/favicon.ico">
<link href="/Public/skin/default/default.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/js/jquery-1.11.1.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/js/dialog-plus-min.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/js/main.js" charset="utf-8"></script>
<title>ERP企业管理系统</title>
</head>
<body>
<div class="bar"><div class="c">
	        <div class="f">ERP企业管理系统欢迎您！</div>
			<div class="r">
			    <ul id="loginStatus">
  
                
                <li>Hi：<?php  ?> / 晶宜家居用品旗舰店</li>
                <li><a href="/index.php/Admin/Login/loginout">退出系统</a></li>
				
                </ul>
</div>
	   </div></div>

	   <div class="topw"><div class="top">
	        <div class="logo"><img src="https://img.alicdn.com/shop-logo/82/7f/T1afdzXj4hXXb1upjX.jpg_128x128.jpg">&nbsp;&nbsp;晶宜自粘墙纸<a href="../main/index.asp" hidefocus="true" target="_self">系统首页</a></div>
            
            <div class="ssn" id="tseach">
				<form target="_blank" method="get" id="searchbox" name="searchbox" action="../main/search.asp">
				    <div class="field">
				         <div><span><select name="ChannelID" id="ChannelID">
                            <option value="1" selected="">交易管理</option>
                            <option value="2">宝贝管理</option>
                            <option value="3">物流结算</option>
				         </select></span></div>
					     <input autocomplete="off" name="keywords" id="keywords" value="">
					</div>
					<div class="submit"><button type="submit" hidefocus="true"> 搜  索 </button></div>
				</form>
			</div>
            
	   </div></div>
    
	   <div class="navw">
	       <div class="navt">
		        <div><i class="a"></i><i class="b"></i><i class="c"></i><i class="d"></i><i class="e"></i><i class="f"></i><i class="g"></i><i class="h"></i></div>
		   </div>
		   <div class="nav"><ul>
				<li class="fst"><a href="../main/index.asp" class="yahei">系统首页</a></li>
					<li><a href="../trade/index.asp">交易管理</a></li><li><a href="../products/products.asp">宝贝管理</a></li> <li><a href="../express/index.asp">物流结算</a></li>
                     <li><a href="../knowledge/index.asp">知识问答</a></li>
					 <li><a href="/index.php/Admin/Admin/Adminlist">用户管理</a></li><li><a href="../main/setup.asp">基本设置</a></li><li><a href="../weightstation/index.asp" target="_blank">称重操作台</a></li>
                     <li><a href="../stock/index.asp">库存管理</a></li>
		    <li><a href="../user/index.asp">会员中心</a></li>
				<li><a href="../main/sitemap.asp">授权中心</a></li>
                                <li><a href="/index.php/Admin/Rbac/RbacList">权限管理</a></li>
		   </ul></div>
	   </div>
<br>
    

      
    <div style="width:1200px; margin:0 auto;">
<div style="width:200px; border:#DDDDDD 1px solid; float:left; background:#F7F7F7; font-size:14px; line-height:30px;">
   <?php foreach($left as $v=>$k): ?> 
<a href="<?php echo $k[$v.Url] ?>"><?php echo $k[$v.Name] ?></a><br>
    <?php endforeach; ?>
</div>

    
    
    
    <div style="width:978px; border:#DDDDDD 1px solid; background:#f9f9f9; float:right; text-align:left; font-size:14px; <?php echo $hetght ?>" >
                <?php foreach($right as $v=>$k): ?>
                   <div class='<?php echo $k["Color"] ?>'>
                    <a href="<?php echo $k[$v.Url] ?>"><?php echo $k[$v.Name] ?></a></div>
                <?php endforeach; ?>
                    <div class="employee_menu_type employee_menu" style="float:right; border-left:#DDDDDD 1px solid; border-right:none;">
                        <a href="<?php echo $recurl ?>"><?php echo $recname ?></a></div>
    </div>
    
                        

    
    







<style type="text/css">
	.sortnamecss { width:60px; height:25px;}
	.employee_menu		{ float:left; width:120px; height:40px; line-height:40px;border-right:#E1E1E1 1px solid; text-align:center;  }
	.employee_menu_type	{ background: #F9F9F9;}
	.employee_menu_curr	{ background: #F90;}
	.div_style {  
		position:absolute; 
		left:50%; 
		/*top:50%;*/ 
		margin-left:-250px; 
		margin-top:100px; 
	} 
</style>


    
<div style="width:1200px; margin:0 auto;">
	
<div style="width:200px; border:#DDDDDD 1px solid; float:left; background:#F7F7F7; font-size:14px; line-height:30px;">
<a href="/index.php/Admin/Admin/Adminlist">所有用户</a><br><a href="/index.php/Admin/Admin/AdminList">考勤记录</a><br><a href="/index.php/Admin/Admin/logbook">操作日志</a><br>
</div>

            <div style="width:978px; border:#DDDDDD 1px solid; background:#f9f9f9; float:right; text-align:left; padding:10px 0; font-size:14px;">
    	<div style="float:left;width:840px;">
        <span style="padding-left:10px; color: #333">操作日志:</span>
        <span style="padding:10px;"><a href="index.asp?action=loglist&amp;UserID=&amp;CountDate=2016-10">2016-10</a>&nbsp;&nbsp;
<a href="index.asp?action=loglist&amp;UserID=&amp;CountDate=2016-09">2016-09</a>&nbsp;&nbsp;
<a href="index.asp?action=loglist&amp;UserID=&amp;CountDate=2016-08">2016-08</a>&nbsp;&nbsp;
<a href="index.asp?action=loglist&amp;UserID=&amp;CountDate=2016-07">2016-07</a>&nbsp;&nbsp;
</span>
        </div>
        <div style="float:right;width:110px;padding-right:10px; text-align:right;">
        <select name="showloglist" id="showloglist" class="wenbenkuang" style="width:100px;" onchange="var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">
                <option class="input" value="index.asp?action=loglist" selected="">所有用户日志</option>
                <option class="input" value="index.asp?action=loglist&amp;UserID=6">顾培伟</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=11">李杰</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=12">章锋萍</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=13">李聪</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=14">陈磊</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=15">严礼娟</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=16">电商部</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=17">林影</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=18">仓库确认</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=19">潘晓鹰</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=20">何婷婷</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=21">陈豪</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=22">侯小李</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=23">朱虹晴</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=24">路彩平</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=25">陈上华</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=26">陈能</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=27">龚蓉蓉</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=28">徐萱</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=29">翁祺</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=30">刘富强</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=31">李钦伟</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=32">崔颖</option>
<option class="input" value="index.asp?action=loglist&amp;UserID=33">陈亚军</option>

                </select>
        </div>
    </div>
    <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">
		<table style="padding:0; margin:auto;" id="recordlist" width="980" cellspacing="0" cellpadding="0" border="0" bgcolor="#E1E1E1" align="center">
			 <tbody><tr align="center" height="30">
               <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:25px;" width="15%" bgcolor="#f7f7f7">时间</td>
               <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:25px;" width="10%" bgcolor="#f7f7f7">用户</td>
               <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:25px;" width="15%" bgcolor="#f7f7f7">登录IP</td>
               <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:25px;" width="60%" bgcolor="#f7f7f7">操作事项</td>
		  </tr>
		
			<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:48:31&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:46:40&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:46:39&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:46:36&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:46:35&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:46:32&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:46:30&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">用户登录
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:46:30&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:46:00&nbsp;</td>
<td align="center" height="35">&nbsp;翁祺&nbsp;</td>
<td align="left">&nbsp;192.168.0.114&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:44:08&nbsp;</td>
<td class="" align="center" height="35">&nbsp;翁祺&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.114&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:42:54&nbsp;</td>
<td align="center" height="35">&nbsp;翁祺&nbsp;</td>
<td align="left">&nbsp;192.168.0.114&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:42:13&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">退出登录
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:42:00&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:41:57&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:41:55&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td class="" align="left" height="35">&nbsp;2016/10/28 15:41:51&nbsp;</td>
<td class="" align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td class="" align="left">&nbsp;192.168.0.113&nbsp;</td>
<td class="" align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:41:35&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:34:56&nbsp;</td>
<td align="center" height="35">&nbsp;陈亚军&nbsp;</td>
<td align="left">&nbsp;192.168.0.113&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:34:16&nbsp;</td>
<td align="center" height="35">&nbsp;李钦伟&nbsp;</td>
<td align="left">&nbsp;192.168.0.102&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>
<tr style="FONT-SIZE:14px; color:#666666;" class="changecolour" bgcolor="#FFFFFF">
<td align="left" height="35">&nbsp;2016/10/28 15:34:15&nbsp;</td>
<td align="center" height="35">&nbsp;李钦伟&nbsp;</td>
<td align="left">&nbsp;192.168.0.102&nbsp;</td>
<td align="left">授权店铺：晶宜家居用品旗舰店
&nbsp;</td>
</tr>

		
		</tbody></table>
		<br>
		<table style="padding:0; margin:auto;" width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
			  <tbody><tr>
				<td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:18px;" bgcolor="#F9F9F9" align="center"><div style="position:relative;width:250px; float:left; margin:0; padding:0;text-align:left;"><form action="index.asp" method="get" style="margin:0; padding:0;"><input name="action" id="action" value="loglist" type="hidden"><input name="UserID" id="UserID" value="" type="hidden"><input name="keywords" class="search_input" id="keywords" value="" style="width:160px" type="text">&nbsp;<input name="button" class="search_btn" id="button" value="搜索" type="submit">
		  </form></div><div id="paging"><a class="total" title="Total:47393">47393</a><a class="pages" title="Page 1 of 2370">1/2370</a>  <a class="pagenow" title="First">|‹</a> <a class="pagenow" title="Previous">‹</a>  <a class="pagenow" title="Page:1">1</a>  <a href="?action=loglist&amp;p=2" class="page" title="Page:2">2</a>  <a href="?action=loglist&amp;p=3" class="page" title="Page:3">3</a>  <a href="?action=loglist&amp;p=4" class="page" title="Page:4">4</a>  <a href="?action=loglist&amp;p=2" class="page" title="Next">›</a> <a href="?action=loglist&amp;p=2370" class="page" title="Last">›|</a> <input name="pageinput" id="pageinput" onkeydown="if (event.keyCode==13){location.href = '?action=loglist&amp;p=<?php echo ($PageNum); ?>'.replace('<?php echo ($PageNum); ?>',this.value);}" type="text"></div></td>
		  </tr>
		</tbody></table>


	</div>
</div>

<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：0.66 秒</div>
    </div>
</div>
<div id="iColorPicker" style="display: none; position: absolute;"><table class="pickerTable"><thead><tr><td style="background:#f00" hx="f00"></td><td style="background:#ff0" hx="ff0"></td><td style="background:#0f0" hx="0f0"></td><td style="background:#0ff" hx="0ff"></td><td style="background:#00f" hx="00f"></td><td style="background:#f0f" hx="f0f"></td><td style="background:#fff" hx="fff"></td><td style="background:#ebebeb" hx="ebebeb"></td><td style="background:#e1e1e1" hx="e1e1e1"></td><td style="background:#d7d7d7" hx="d7d7d7"></td><td style="background:#ccc" hx="ccc"></td><td style="background:#c2c2c2" hx="c2c2c2"></td><td style="background:#b7b7b7" hx="b7b7b7"></td><td style="background:#acacac" hx="acacac"></td><td style="background:#a0a0a0" hx="a0a0a0"></td><td style="background:#959595" hx="959595"></td></tr><tr><td style="background:#ee1d24" hx="ee1d24"></td><td style="background:#fff100" hx="fff100"></td><td style="background:#00a650" hx="00a650"></td><td style="background:#00aeef" hx="00aeef"></td><td style="background:#2f3192" hx="2f3192"></td><td style="background:#ed008c" hx="ed008c"></td><td style="background:#898989" hx="898989"></td><td style="background:#7d7d7d" hx="7d7d7d"></td><td style="background:#707070" hx="707070"></td><td style="background:#626262" hx="626262"></td><td style="background:#555" hx="555"></td><td style="background:#464646" hx="464646"></td><td style="background:#363636" hx="363636"></td><td style="background:#262626" hx="262626"></td><td style="background:#111" hx="111"></td><td style="background:#000" hx="000"></td></tr><tr><td style="background:#f7977a" hx="f7977a"></td><td style="background:#fbad82" hx="fbad82"></td><td style="background:#fdc68c" hx="fdc68c"></td><td style="background:#fff799" hx="fff799"></td><td style="background:#c6df9c" hx="c6df9c"></td><td style="background:#a4d49d" hx="a4d49d"></td><td style="background:#81ca9d" hx="81ca9d"></td><td style="background:#7bcdc9" hx="7bcdc9"></td><td style="background:#6ccff7" hx="6ccff7"></td><td style="background:#7ca6d8" hx="7ca6d8"></td><td style="background:#8293ca" hx="8293ca"></td><td style="background:#8881be" hx="8881be"></td><td style="background:#a286bd" hx="a286bd"></td><td style="background:#bc8cbf" hx="bc8cbf"></td><td style="background:#f49bc1" hx="f49bc1"></td><td style="background:#f5999d" hx="f5999d"></td></tr><tr><td style="background:#f16c4d" hx="f16c4d"></td><td style="background:#f68e54" hx="f68e54"></td><td style="background:#fbaf5a" hx="fbaf5a"></td><td style="background:#fff467" hx="fff467"></td><td style="background:#acd372" hx="acd372"></td><td style="background:#7dc473" hx="7dc473"></td><td style="background:#39b778" hx="39b778"></td><td style="background:#16bcb4" hx="16bcb4"></td><td style="background:#00bff3" hx="00bff3"></td><td style="background:#438ccb" hx="438ccb"></td><td style="background:#5573b7" hx="5573b7"></td><td style="background:#5e5ca7" hx="5e5ca7"></td><td style="background:#855fa8" hx="855fa8"></td><td style="background:#a763a9" hx="a763a9"></td><td style="background:#ef6ea8" hx="ef6ea8"></td><td style="background:#f16d7e" hx="f16d7e"></td></tr><tr><td style="background:#ee1d24" hx="ee1d24"></td><td style="background:#f16522" hx="f16522"></td><td style="background:#f7941d" hx="f7941d"></td><td style="background:#fff100" hx="fff100"></td><td style="background:#8fc63d" hx="8fc63d"></td><td style="background:#37b44a" hx="37b44a"></td><td style="background:#00a650" hx="00a650"></td><td style="background:#00a99e" hx="00a99e"></td><td style="background:#00aeef" hx="00aeef"></td><td style="background:#0072bc" hx="0072bc"></td><td style="background:#0054a5" hx="0054a5"></td><td style="background:#2f3192" hx="2f3192"></td><td style="background:#652c91" hx="652c91"></td><td style="background:#91278f" hx="91278f"></td><td style="background:#ed008c" hx="ed008c"></td><td style="background:#ee105a" hx="ee105a"></td></tr><tr><td style="background:#9d0a0f" hx="9d0a0f"></td><td style="background:#a1410d" hx="a1410d"></td><td style="background:#a36209" hx="a36209"></td><td style="background:#aba000" hx="aba000"></td><td style="background:#588528" hx="588528"></td><td style="background:#197b30" hx="197b30"></td><td style="background:#007236" hx="007236"></td><td style="background:#00736a" hx="00736a"></td><td style="background:#0076a4" hx="0076a4"></td><td style="background:#004a80" hx="004a80"></td><td style="background:#003370" hx="003370"></td><td style="background:#1d1363" hx="1d1363"></td><td style="background:#450e61" hx="450e61"></td><td style="background:#62055f" hx="62055f"></td><td style="background:#9e005c" hx="9e005c"></td><td style="background:#9d0039" hx="9d0039"></td></tr><tr><td style="background:#790000" hx="790000"></td><td style="background:#7b3000" hx="7b3000"></td><td style="background:#7c4900" hx="7c4900"></td><td style="background:#827a00" hx="827a00"></td><td style="background:#3e6617" hx="3e6617"></td><td style="background:#045f20" hx="045f20"></td><td style="background:#005824" hx="005824"></td><td style="background:#005951" hx="005951"></td><td style="background:#005b7e" hx="005b7e"></td><td style="background:#003562" hx="003562"></td><td style="background:#002056" hx="002056"></td><td style="background:#0c004b" hx="0c004b"></td><td style="background:#30004a" hx="30004a"></td><td style="background:#4b0048" hx="4b0048"></td><td style="background:#7a0045" hx="7a0045"></td><td style="background:#7a0026" hx="7a0026"></td></tr></thead><tbody><tr><td colspan="16" id="colorPreview"></td></tr></tbody></table></div>

<br>

<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：0.25 秒</div>
    </div>
</div>

</body>
</html>