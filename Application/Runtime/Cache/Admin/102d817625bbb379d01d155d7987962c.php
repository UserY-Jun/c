<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
   <style>
 .yahoo2 ul {
    display: inline-block;
    margin-bottom: 0;
    margin-left: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.yahoo2 ul li {
  display: inline;
}

.yahoo2 ul li.rows {
    line-height: 30px;
    padding-left: 5px;
}
.yahoo2 ul li.rows b{color: #f00}

.yahoo2 ul li a, .yahoo2 ul li span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    background: url('../images/bottom_bg.png') 0px 0px;
    border: 1px solid #d3dbde;
    /*border-left-width: 0;*/
    margin-left: 2px;
    color: #08c;
}
.yahoo2 ul li a:hover{
    color: red;
    background: #0088cc;
}
.yahoo2 ul li.first-child a, .yahoo2 ul li.first-child span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 3px;
    border-bottom-left-radius: 3px;
    -webkit-border-top-left-radius: 3px;
    border-top-left-radius: 3px;
    -moz-border-radius-bottomleft: 3px;
    -moz-border-radius-topleft: 3px;
}
.yahoo2 ul .disabled span, .yahoo2 ul .disabled a, .yahoo2 ul .disabled a:hover {
color: #999;
cursor: default;
background-color: transparent;
}
.yahoo2 ul .active a, .yahoo2 ul .active span {
color: #999;
cursor: default;
}
.yahoo2 ul li a:hover, .yahoo2 ul .active a, .yahoo2 ul .active span {
background-color: #f0c040;
}
.yahoo2 ul li.last-child a, .yahoo2 ul li.last-child span {
    -webkit-border-top-right-radius: 3px;
    border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 3px;
    border-bottom-right-radius: 3px;
    -moz-border-radius-topright: 3px;
    -moz-border-radius-bottomright: 3px;
}

.yahoo2 ul li.current a{color: #f00 ;font-weight: bold; background: #ddd}
    
</style>

<link rel="stylesheet" type="text/css" href=" /Public/css/page.css" />  
    
    
    
    
<link rel="shortcut icon" type="image/x-icon" href="/Public/skin/favicon.ico">
<link href="/Public/skin/default/default.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/js/jquery-1.11.1.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/js/dialog-plus-min.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/js/products.js" charset="utf-8"></script>
<script type="text/javascript" src="/Public/js/LodopFuncs.js" charset="utf-8"></script>

<script type="text/javascript" src="/Public/js/main.js" charset="utf-8"></script>

<script type="text/javascript" src="/Public/js/employee.js" charset="utf-8"></script>
<script charset="utf-8" src="/Public/keditor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/keditor/lang/zh_CN.js"></script>
<link href="/Public/skin/dialog/ui-dialog.css" rel="stylesheet">

<title>ERP企业管理系统</title>

<script type="text/javascript">
	$(function() {
		$("#test_1").selectpick({
			container: '.test_1',
			onSelect: function(value,text){
				alert("这是回调函数，选中的值："+value+" \n选中的下拉框文本："+text);
			}
		});
		$("#test_2").selectpick({container:'.test_2',disabled:true});
		$("#test_3").selectpick({container:'.test_3',onSelect:function(value,text){
			enAble();//重新激活 test_2
		}
		});
	});
	//重新激活 test_2
	function enAble(){
		$("#selectpick_test_2").parent().remove();
		$("#test_2").selectpick({container:'.test_2',disabled:false});
	}
        
        
        function Store_switching(t_value){
         
           location.href="/index.php/Admin/shop/shop_pri/shop_id/"+t_value;
        }
        
        function shop_shop(){
       //     alert(1);
       //   a.trigger("click");
       //   var t =  document.getElementById('test_3'); 
        }




</script>





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
        
        
        
         .select { 
             
          //   width:80px; height:24px; background:none;  border:none; 
           
           appearance:none;  
                -moz-appearance:none;  
                -webkit-appearance:none;  
                
                
  
         }    
  
        
        
        
</style>


</head>
<body>

    <?php $div_class='yahoo2'; ?>
<div class="bar"><div class="c">
        <div class="f">ERP企业管理系统欢迎您！<img src="/Public/images/beta.png" height="12px"></div>
			<div class="r">
			    <ul id="loginStatus">
  
                
                <li>Hi：<?php echo(cookie('admin')['username']) ?> /
                   <div class="test_3" style="float:right;width:200px;">
                       <?php $shopData=session('shopData');$user_shop = session("user_shop"); ?>
                       <?php if((empty($shopData))): echo ($user_shop['seller_nick']); ?>   
                       <?php else: ?> 
                       <select id="test_3" onmouseover="shop_shop()" onchange="Store_switching(this.value)"  class="select" style=" position: absolute;top:-3px;">
                           <?php if(is_array($shopData)): foreach($shopData as $key=>$vo): ?><option value="<?php echo $vo['id']; ?>" style="background-color: <?php if($vo['is_main']==1){echo '#FFE4B5';} ?>;" <?php if($vo['id']==$user_shop['id']){echo 'selected';} ?>><?php echo ($vo["shop_name"]); ?></option><?php endforeach; endif; ?>
                        </select><?php endif; ?>   
                  </div>
  
                    </li>
                <li style=' margin-left:20px;'><a href="/index.php/Admin/Login/loginout">退出系统</a></li>	
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
				<li class="fst"><a href="/index.php/Admin/index/index" class="yahei">系统首页</a></li>
					<li><a href="/index.php/Admin/trade/tradeLIST">交易管理</a></li><li><a href="/index.php/Admin/Products/productsList">宝贝管理</a></li> <li><a href="../express/index.asp">物流结算</a></li>
                     <li><a href="../knowledge/index.asp">知识问答</a></li>
					 <li><a href="/index.php/Admin/Admin/Adminlist">用户管理</a></li>
                                         
                                         <li><a href="../weightstation/index.asp" target="_blank">称重操作台</a></li>
                     <li><a href="/index.php/Admin/Stock/StockList">库存管理</a></li>
		    <li><a href="../user/index.asp">会员中心</a></li>
				<li><a href="/index.php/Admin/Shop/Shoplist">分店授权</a></li>
                                <li><a href="/index.php/Admin/role/roleList">权限管理</a></li>
                                <li><a  target="_blank" href="/index.php/Admin/worklog/wllist">工作日志</a></li>
		   </ul></div>
	   </div>
<br>
    

      
    <div style="width:1200px; margin:0 auto;">
<div style="width:200px; border:#DDDDDD 1px solid; float:left; background:#F7F7F7; font-size:14px; line-height:30px; <?php if(empty($left)) echo 'display:none'; ?>">
   <?php foreach($left as $v=>$k): ?> 
<a href="<?php echo $k[$v.Url] ?>"><?php echo $k[$v.Name] ?></a><br>
    <?php endforeach; ?>
</div>

    
    
    
    <div style="width:978px; border:#DDDDDD 1px solid; background:#f9f9f9; float:right; text-align:left; font-size:14px; <?php if(empty($left)) echo 'display:none'; ?>" >
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
    

    <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">
		<table width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#CCCCCC" align="right">
                    <!-- ##############################################备注信息   form ################################################################-->
<form action="/index.php/Admin/Admin/AdminEdit/id/1" method="post">
      <tbody><tr>
        <td colspan="3" style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> 添加新用户</td>
  </tr>
  
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="110" bgcolor="#FFFFFF" align="right">用户工号:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="400" bgcolor="#FFFFFF" align="left"><input name="job_numbers" id="job_numbers" value="<?php echo $userlist['job_numbers'] ?>" size="40" class="input" type="text"><input name="id" id="id" value="0" type="hidden">
          &nbsp;<span class="Tooltip" title="用户工号不能为空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18">
          <input name="p" id="p" value="1" type="hidden">
          </span></td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " width="450" bgcolor="#FFFFFF" align="left">系统权限设置：</td>
  </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">用户姓名:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="username" id="NickName" value="<?php echo $userlist['username'] ?>" size="40" class="input" type="text">
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
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="mobile" id="mobile" value="<?php echo $userlist['mobile'] ?>" size="40" class="input" type="text">
          &nbsp;<span class="Tooltip" title="手机号码作为内部用户登录凭证，不能为空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
        </tr>
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">电子邮箱:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="email" id="Email" value="<?php echo $userlist['email'] ?>" size="40" class="input" type="text">
          &nbsp;<span class="Tooltip" title="电子邮箱亦可作为内部用户登录凭证，如不需要可留空"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
        </tr>
        
     <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">登录用户名:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="accounts" id="Password" value="<?php echo $userlist['accounts'] ?>" size="40" class="input" type="text">
      &nbsp;<span class="Tooltip" title="登录用户名，请正确填写"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span></td>
    </tr>     
        
        
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">修改密码:</td>
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
          <option>--待选择--</option>
          <?php foreach($deptlist as $v=>$k): ?>
          <option <?php echo $userlist['departid']==$v?'selected=selected':'' ?>  class="input" value="<?php echo $v ; ?>"><?php echo $k ; ?></option>
            
           <?php endforeach; ?>
      </select>
    </td>
    </tr>
   <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">工作岗位:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left">
      <select name="role_id" id="JobPosition" style="height:25px; font-size:14px; line-height:18px; width:200px;">
          <option>--待选择--</option>
       <?php foreach($rolelist as $v=>$k): ?>
       <option <?php echo $arrroleid['role_id']==$v?'selected':''; ?> class="input" value="<?php echo $v; ?>"><?php echo $k; ?></option>
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
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input  name='is_iuqn' id='IsIuqn' value='1'   type='checkbox' <?php echo $userlist['is_iuqn']==1?'checked':''; ?>  >
      选中状态表示需要考勤</td>
    </tr>
  <tr>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">用户状态:</td>
    <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="is_active" id="isActive" value="0" checked="" type="radio" <?php echo $userlist['is_active']==0?'checked':''; ?> >
      锁定状态   
      <input name="is_active" id="isActive" value="1" type="radio" <?php echo $userlist['is_active']==1?'checked':''; ?> >
      状态正常
      <input name="is_active" id="isActive" value="2" type="radio" <?php echo $userlist['is_active']==2?'checked':''; ?> >
      离职状态</td>
    </tr>
      <input type="hidden" name='id' value="<?php echo $userlist['id'] ?>" >
    <?php  ?>
    
    
  <tr>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">备注:</td>
        <td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><textarea name="remark" cols="70" rows="8" class="textarea" id="remark"><?php echo $userlist['remark']; ?></textarea></td>
        </tr>
  <tr>
        <td colspan="3" style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> <input value="&nbsp;返回上一步&nbsp;" class="btn" onclick="javascript:window.history.go(-1);" type="button">&nbsp;&nbsp;<input class="btn" name="button" id="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" type="submit"></td>
  </tr>
  
</tbody></table>
	</div>
</div>
</form>
                    

<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>