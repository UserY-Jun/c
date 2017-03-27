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
<a href="/index.php/Admin/role/rolelist">工作岗位</a><br><a href="/index.php/Admin/privilege/prilist">权限列表</a><br><a href="index.asp?action=loglist">操作日志</a>
</div>

    
    
    
    <div style="width:978px; border:#DDDDDD 1px solid; background:#f9f9f9; float:right; text-align:left; font-size:14px;">
                <div class="employee_menu_curr employee_menu">
                    <a href="/index.php/Admin/<?php echo $listurl; ?>"><?php echo $list; ?></a></div>
                    <div class="employee_menu_type employee_menu">
                        <a href="/index.php/Admin/<?php echo $addurl ?>"><?php echo $add ?></a></div>
                    <div class="employee_menu_type employee_menu" style="float:right; border-left:#DDDDDD 1px solid; border-right:none;">
                	<a href="index.asp?action=recycled">回收站</a></div>
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
    

    
    <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">
		<table width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#CCCCCC" align="right">
                    <!-- ##############################################备注信息   form ################################################################-->
<form action="/index.php/Admin/Admin/Adminadd" method="post">
      <tbody><tr>
        <td colspan="3" style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> 添加新用户</td>
  </tr>
  
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="110" bgcolor="#FFFFFF" align="right">用户工号:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="400" bgcolor="#FFFFFF" align="left"><input name="job_numbers" id="job_numbers" value="" size="40" class="input" type="text"><input name="id" id="id" value="0" type="hidden">
          &nbsp;<span class="Tooltip" title="用户工号不能为空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18">
          <input name="p" id="p" value="1" type="hidden">
          </span></td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="450" bgcolor="#FFFFFF" align="left">系统权限设置：</td>
  </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">用户姓名:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="username" id="NickName" value="" size="40" class="input" type="text">
         &nbsp;<span class="Tooltip" title="用户姓名不能为空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
        <td rowspan="12" style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " valign="top" bgcolor="#FFFFFF" align="left">
        	<div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold;"><input name="Grade10" id="Grade10" value="1" type="checkbox">
            基本设置</div>
            <div style="width:140px; float:left; height:28px;">
            <input name="Grade17" id="Grade17" value="1" type="checkbox">
            淘宝授权操作
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade11" id="Grade11" value="1" type="checkbox">
            打印机设置
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade12" id="Grade12" value="1" type="checkbox">
            详情页模板
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade13" id="Grade13" value="1" type="checkbox">
            运费模板设置
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade14" id="Grade14" value="1" type="checkbox">
            说明书模板设置
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade15" id="Grade15" value="1" type="checkbox">
            发货单模板设置
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade16" id="Grade16" value="1" type="checkbox">
            收据模板设置
          </div>
          <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade20" id="Grade20" value="1" type="checkbox">
        交易管理</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade21" id="Grade21" value="1" type="checkbox">
            查看订单记录
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade22" id="Grade22" value="1" type="checkbox">
            更新订单记录
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade23" id="Grade23" value="1" type="checkbox">
            查看订单记录
          </div>
            <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade30" id="Grade30" value="1" type="checkbox">
        产品管理</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade31" id="Grade31" value="1" type="checkbox">
            查看产品列表
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade32" id="Grade32" value="1" type="checkbox">
            添加编辑产品
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade34" id="Grade34" value="1" type="checkbox">
            删除产品
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade35" id="Grade35" value="1" type="checkbox">
            查看代码
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade36" id="Grade36" value="1" type="checkbox">
            淘宝图片入库
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade37" id="Grade37" value="1" type="checkbox">
            产品进货价格
          </div>
          <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade40" id="Grade40" value="1" type="checkbox">
        用户管理</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade41" id="Grade41" value="1" type="checkbox">
            查看所有用户
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade42" id="Grade42" value="1" type="checkbox">
            添加编辑用户
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade43" id="Grade43" value="1" type="checkbox">
            彻底删除操作
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade44" id="Grade44" value="1" type="checkbox">
            查看考勤记录
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade45" id="Grade45" value="1" type="checkbox">
            编辑考勤操作
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade46" id="Grade46" value="1" type="checkbox">
            条形码管理
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade47" id="Grade47" value="1" type="checkbox">
            操作日志
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade48" id="Grade48" value="1" type="checkbox">
            用户权限设置
          </div>
          <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade50" id="Grade50" value="1" type="checkbox">
        物流结算</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade51" id="Grade51" value="1" type="checkbox">
            查看物流信息
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade52" id="Grade52" value="1" type="checkbox">
            编辑物流信息
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade53" id="Grade53" value="1" type="checkbox">
            查看运费统计
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade54" id="Grade54" value="1" type="checkbox">
            批量确认
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade55" id="Grade55" value="1" type="checkbox">
            运费计算
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade57" id="Grade57" value="1" type="checkbox">
            业务统计
          </div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade56" id="Grade56" value="1" type="checkbox">
            条形码管理
          </div>
          <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade60" id="Grade60" value="1" type="checkbox">
        称重操作台</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade61" id="Grade61" value="1" type="checkbox">
            称重操作
          </div>
          <div style="width:98%; float:left; height:28px; font-size:14px; font-weight:bold; border-top: #CCC 1px dotted;"><input name="Grade70" id="Grade70" value="1" type="checkbox">
        账单校对</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade71" id="Grade71" value="1" type="checkbox">
            出货统计</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade72" id="Grade72" value="1" type="checkbox">
            订单确认</div>
          <div style="width:140px; float:left; height:28px;">
            <input name="Grade73" id="Grade73" value="1" type="checkbox">
            订单列表
          </div></td>
  </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">手机号码:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="mobile" id="mobile" value="" size="40" class="input" type="text">
          &nbsp;<span class="Tooltip" title="手机号码作为内部用户登录凭证，不能为空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
        </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">电子邮箱:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="email" id="Email" value="" size="40" class="input" type="text">
          &nbsp;<span class="Tooltip" title="电子邮箱亦可作为内部用户登录凭证，如不需要可留空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
        </tr>
        
     <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">登录用户名:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="accounts" id="Password" value="" size="40" class="input" type="text">
      &nbsp;<span class="Tooltip" title="登录用户名，请正确填写"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
    </tr>     
        
        
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">登陆密码:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="password" id="Password" value="" size="40" class="input" type="text">
      &nbsp;<span class="Tooltip" title="不更改登陆密码请留空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
    </tr>
   <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">重输密码:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="cpassword" id="cPassword" value="" size="40" class="input" type="text">
      &nbsp;<span class="Tooltip" title="请重复输入您的密码"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">工作部门:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left">
      
      <select name="departid" id="Department" style="height:25px; font-size:14px; line-height:18px; width:200px;">
          <option>--请选择--</option>
          <?php foreach($deptlist as $v=>$k): ?>
          <option class="input" value="<?php echo $v ; ?>"><?php echo $k ; ?></option>
            
           <?php endforeach; ?>
      </select>
    </td>
    </tr>
   <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">工作岗位:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left">
      <select name="role_id" id="JobPosition" style="height:25px; font-size:14px; line-height:18px; width:200px;">
          <option>--请选择--</option>
       <?php foreach($rolelist as $v=>$k): ?>
       <option class="input" value="<?php echo $v; ?>"><?php echo $k; ?></option>
        <?php endforeach; ?>    
      </select></td>
    </tr>
       <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">分组授权:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left">
      <select name="shop_group" id="ShopGroup" style="height:25px; font-size:14px; line-height:18px; width:200px;">
        <option class="input" value="0">--待授权--</option>
        <?php foreach($shoplist as $v=>$k): ?>
        <option class="input" value="<?php echo $v; ?>"><?php echo $k; ?></option>
        <?php endforeach; ?>
</select></td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">颜色标识:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="employee_color" id="Employee_color" value="" size="40" class="input" style=" background:;" type="text"></td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">条码编号:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left">&nbsp;&nbsp;<input name="IsUpdateBar" id="IsUpdateBar" value="1" type="checkbox">
      选中更新条码编号</td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">是否考勤:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="is_iuqn" id="IsIuqn" value="1" type="checkbox">
      选中状态表示需要考勤</td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">用户状态:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="is_active" id="isActive" value="0" checked="" type="radio">
      锁定状态   
      <input name="is_active" id="isActive" value="1" type="radio">
      状态正常
      <input name="is_active" id="isActive" value="2" type="radio">
      离职状态</td>
    </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">备注:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><textarea name="remark" cols="70" rows="8" class="textarea" id="remark"></textarea></td>
        </tr>
  <tr>
        <td colspan="3" style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> <input value="&nbsp;返回上一步&nbsp;" class="btn" onclick="javascript:window.history.go(-1);" type="button">&nbsp;&nbsp;<input class="btn" name="button" id="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" type="submit"></td>
  </tr>
  
</tbody></table>
	</div>
</div>
</form>
<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：0.00 秒</div>
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