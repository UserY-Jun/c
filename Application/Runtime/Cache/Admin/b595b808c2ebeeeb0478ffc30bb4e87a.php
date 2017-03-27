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
                                         
                                         <li><a href="/index.php/Admin/Weightstation/index" target="_blank">称重操作台</a></li>
                     <li><a href="/index.php/Admin/Stock/StockList">库存管理</a></li>
		    <li><a href="../user/index.asp">会员中心</a></li>
                    <li><a href="/index.php/Admin/Shop/Shoplist">分店授权</a><?php $user_id = cookie('admin')['id'];$str = "shop,".$user_id; $shop_user = S($str); if(!empty($shop_user)){echo '<img id = "info_img" style="position:absolute;" width="10px" src="/Public/images/dood.png">';} ?></li>
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
    
                        

    
    


<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
   <tbody><tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f9f9f9" align="center" height="30">最后更新时间</td>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px; color:#F60; font-weight:bold;" bgcolor="#fbfbfb" align="center">2016/10/28 10:17:03</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f9f9f9" align="center">页面访问时间</td>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" bgcolor="#fbfbfb" align="center">2016/10/28 12:01:33</td>
        </tr>
    <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center" height="30">月份</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">订单数</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">笔单价</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">总营业额</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">买家支付运费</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">净营业额</td>
  </tr>

<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-28 （五）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;&nbsp;59 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">39.89 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2353.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">0.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2353.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-27 （四）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;411 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">41.72 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17147.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">26.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17121.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-26 （三）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;418 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">34.87 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14574.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14555.20</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-25 （二）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;570 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">34.29 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19546.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">284.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19262.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-24 （一）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;537 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">35.73 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19184.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">64.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19120.90</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-23 （<font color="red">日</font>）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;523 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">34.37 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17974.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">30.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17944.70</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-22 （<font color="red">六</font>）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;503 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">31.93 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">16059.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">103.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15956.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2016-10-21 （五）</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">&nbsp;&nbsp;535 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.00 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19258.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">175.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19083.60</td></tr>

</tbody></table>
<br>

<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
   <tbody><tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f9f9f9" align="center" height="30">最后更新时间</td>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" bgcolor="#fbfbfb" align="center">2016/10/28 10:17:03</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f9f9f9" align="center">页面访问时间</td>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" bgcolor="#fbfbfb" align="center">2016/10/28 12:01:33</td>
        </tr>
    <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center" height="30">月份</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">订单数</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">笔单价</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">总营业额</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">买家支付运费</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">净营业额</td>
  </tr>

<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">0</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">32.44 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">356.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">356.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">356.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">1</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">28.72 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">430.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">430.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">430.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">3</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">16 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">28.78 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">460.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">460.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">460.40</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">5</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">27.95 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">475.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">475.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">475.20</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">6</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">20 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">35.60 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">712.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">712.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">712.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">7</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">25 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.75 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1018.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1018.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1018.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">8</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">32 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.91 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1181.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1181.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1181.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">9</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">55 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.49 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2116.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2116.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2116.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">59 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">39.89 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2353.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2353.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2353.60</td></tr>

</tbody></table>
<br>
<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
    <tbody><tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center" height="30">月份</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">订单数</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">笔单价</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">总营业额</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">买家支付运费</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">净营业额</td>
  </tr>

<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">0</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">46.88 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">890.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">890.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">890.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">1</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">26 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">47.64 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1238.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1238.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1238.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">28 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">45.29 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1268.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1268.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1268.20</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">3</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">30 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">43.26 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1297.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1297.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1297.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">4</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">31 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">42.34 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1312.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1312.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1312.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">5</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">33 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">41.90 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1382.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1382.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1382.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">6</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">34 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">45.28 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1539.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1539.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1539.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">7</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">43.19 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1641.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1641.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1641.30</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">8</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">51 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">39.32 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2005.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2005.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2005.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">9</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">72 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.38 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2907.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2907.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2907.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">91 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">42.66 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3882.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3882.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3882.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">11</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">121 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">41.25 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4990.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4990.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4990.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">12</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">153 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">42.89 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6561.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6561.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6561.70</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">13</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">183 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.22 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">7360.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">7360.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">7360.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">14</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">211 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.97 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8645.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8645.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8645.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">15</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">230 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.16 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">9236.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">9236.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">9236.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">16</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">259 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">39.97 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10351.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10351.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10351.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">17</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">278 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.70 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10759.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10759.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10759.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">18</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">294 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.11 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11204.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11204.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11204.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">19</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">306 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">37.79 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11563.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11563.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11563.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">325 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.23 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">12424.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">12424.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">12424.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">21</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">345 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.94 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13435.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13435.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13435.30</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">22</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">383 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">40.61 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15552.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15552.30</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15552.30</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">23</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">411 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">41.72 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17147.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17147.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17147.00</td></tr>

</tbody></table>

<br>
<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
    <tbody><tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center" height="30">月份</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">订单数</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">笔单价</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">总营业额</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">买家支付运费</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" width="16%" bgcolor="#f7f7f7" align="center">净营业额</td>
  </tr>

<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">0</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19.20 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">268.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">268.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">268.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">1</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">20.04 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">380.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">380.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">380.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">2</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">20 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">20.32 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">406.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">406.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">406.40</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">3</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">25 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19.25 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">481.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">481.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">481.20</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">4</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">26 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19.00 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">494.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">494.00</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">494.00</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">5</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">28 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">18.56 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">519.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">519.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">519.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">6</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">32 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17.84 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">570.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">570.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">570.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">7</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">43 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">27.23 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1170.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1170.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1170.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">8</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">56 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">25.90 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1450.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1450.40</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">1450.40</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">9</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">83 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">29.08 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2413.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2413.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">2413.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">117 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">31.56 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3692.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3692.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">3692.90</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">11</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">152 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">32.17 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4889.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4889.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">4889.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">12</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">192 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">33.87 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6503.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6503.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">6503.90</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">13</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">238 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">37.06 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8820.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8820.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">8820.60</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">14</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">271 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.16 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10341.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10341.20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">10341.20</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">15</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">309 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">38.18 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11797.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11797.80</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">11797.80</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">16</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">354 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">37.56 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13297.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13297.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13297.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">17</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">373 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">37.49 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13982.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13982.10</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">13982.10</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">18</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">395 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.50 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14417.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14417.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">14417.90</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">19</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">424 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.02 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15271.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15271.50</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15271.50</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">20</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">444 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">35.55 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15783.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15783.90</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">15783.90</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">21</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">477 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">35.74 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17048.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17048.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">17048.70</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">22</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">510 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.19 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">18458.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">18458.70</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">18458.70</td></tr>
<tr><td style="PADDING:5px; FONT-SIZE: 14px; height:28px; color:#666666;" bgcolor="#FFFFFF" align="center">23</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">535 单</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">36.00 元/笔</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19258.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19258.60</td>
<td style="PADDING:5px; FONT-SIZE: 14px; color:#666666;" bgcolor="#FFFFFF" align="center">19258.60</td></tr>

</tbody></table>

<br>
<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
      <tbody><tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:38px;" bgcolor="#F9F9F9" align="left">城市天气预报
        
       

        </td>
  </tr> 
  <tr><td style="clear:both; padding:10px;" bgcolor="#FFFFFF">
  <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&amp;id=13" marginwidth="0" marginheight="0" scrolling="no" width="650" height="221" frameborder="0"></iframe>
  </td></tr>
  <!--tr>
        <td align="left" bgcolor="#F9F9F9" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:18px;">
        UserID = 33<br>
        NickName = 陈亚军<br>
        UserGrade = 0000000001101010000110100000011100110001110110100111111110011000000000000000000000000000000000000000<br>
        ShopGroup = 2<br>
        Seller_nick = 全部店铺<br>
        Session("Seller_nick") = 晶宜家居用品旗舰店<br>
        </td>
  </tr-->
</tbody></table>
<br>
<table style="padding:0; margin:auto;" width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#CCCCCC" align="center">
  <tbody><tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:25px;" bgcolor="#f7f7f7" align="center" height="30">网址收藏</td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px;" bgcolor="#FFFFFF" align="left"><a href="http://www.qiuziti.com/">求字体网</a> | <a href="../knowledge/index.asp">客服知识库</a> | <a href="http://192.168.0.200/WS/000/店铺装修/detail/index.htm" target="_blank">详情模板研究</a>  | <a href="toAPIstr.asp" target="_blank">API生成函数</a>  | <a href="DateCounter.asp" target="_blank">日期计算器</a>  | <a href="../main/ad.asp" target="_blank">广告禁用语</a>  | <a href="../../show/index.asp" target="_blank">图片预览</a>  | <a href="../main/getcode.asp" target="_blank">产品代码</a>  | <a href="../main/CostROI.asp" target="_blank">成本计算</a>  | <a href="../main/test.asp" target="_blank">程序测试</a>  </td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px;" bgcolor="#FFFFFF" align="left"><a href="http://www.nipic.com/" target="_blank">昵图网</a> | <a href="http://www.zcool.com.cn/" target="_blank">站酷ZCOOL</a> | <a href="http://www.ooopic.com" target="_blank">我图网</a> | <a href="http://www.redocn.com" target="_blank">红动中国</a> | <a href="http://www.58pic.com" target="_blank">千图网</a> | <a href="http://www.aiimg.com" target="_blank">爱图网</a> | <a href="http://www.quanjing.com/" target="_blank">全景图片</a></td>
  </tr>
</tbody></table>

    


<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>