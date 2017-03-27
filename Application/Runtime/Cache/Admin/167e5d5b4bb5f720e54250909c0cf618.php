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



</head>
<script src="/Public/js/jquery-1.11.3.min.js"></script> 
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
					<li><a href="../trade/index.asp">交易管理</a></li><li><a href="/index.php/Admin/Products/ProductsList">宝贝管理</a></li> <li><a href="../express/index.asp">物流结算</a></li>
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
         
<div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">

 <?php foreach($prilist as $rows): ?>
            <tr>
                <td align="center">    <?php  $rows['id']; ?>            </td>
                <td>                    <?php echo str_repeat('&nbsp',$rows['lave']*8).$rows['pri_name'] ?>             </td>
                <td align="center">
                    <input type="button" value="修改" onclick="location.href='/index.php/Admin/Privilege/useredit/user_id/<?php echo $rows[id] ?>'">
                    <input type="button" value="删除" onclick="location.href='/index.php/Admin/Privilege/userdel/user_id/<?php echo $rows[id] ?>'"> 
                </td>
            </tr>
            <br>
            <?php endforeach ?>
          
        </table>
</div> 
<br>

<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：<?php echo 0.091; ?> 秒</div>
    </div>
</div>

    

    
    
</body>
</html>