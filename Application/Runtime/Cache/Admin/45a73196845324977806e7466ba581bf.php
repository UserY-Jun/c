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
    
                        

    
    





    
		
		<div style="width:978px; border:#e6e6e6 1px solid; background:#fcfcfc; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">
    <table style="padding:0; margin:auto;" width="978" cellspacing="0" cellpadding="0" border="0" bgcolor="#E1E1E1" align="center">
	 <tbody><tr>
		<td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:18px; border-bottom:#e6e6e6 1px solid;" bgcolor="#F9F9F9" align="center">
                    <div style="position:relative;width:280px; float:left; margin:0; padding:0;text-align:left;">
                        <form action="" method="get" style="margin:0; padding:0;">
                            <input name="action" id="action" value="" type="hidden">
                            <input name="keywords" class="search_input" id="keywords" value="<?php echo I('get.keywords') ?>" style="width:160px;vertical-align:middle;" type="text">&nbsp;
                            <input name="button" class="search_btn" id="button" value="搜索" style="vertical-align:middle;" type="submit"> 
                            <span class="Tooltip" title="可搜索关键字：产品名称、货号"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18">
                            </span>
		  </form></div><span style="position:relative; width:300px; float:right; margin:0; padding:0 ; text-align:right;">
          <select name="classid" class="wenbenkuang" onChange="var jmpURL=this.options[this.selectedIndex].value ;if(jmpURL!='') {window.location='/index.php/Admin/Products/ProductsList/cat_id/'+jmpURL; }else{ this.selectedIndex=0; }">
        <option class="input" value="0" selected="">显示全部分类</option>
        <?php foreach($cat_list as $v=>$k): ?>
        <option <?php if(I('get.cat_id')==$k['id'])echo 'selected'; ?>  class="input" value="<?php echo $k['id'] ?>"><?php echo $k['cat_name']; ?></option>
        <?php endforeach; ?>


        </select>
       </span>
          </td>
		  </tr>
			  <tr>
				<td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:18px;" valign="middle" bgcolor="#F9F9F9" align="center">
                                    <div style="position:relative;width:280px; float:left; margin:0; padding:0;text-align:left; vertical-align:middle; ">显示: 
                                        <a href="products.asp?action=list&amp;keywords=&amp;classid=0&amp;p=0">
                                            <img src="/Public/skin/default/images/list_line_0.jpg" style="padding:1px 2px;vertical-align:middle;" border="0"></a>&nbsp;
                                            <a href="products.asp?action=listbox&amp;keywords=&amp;classid=0&amp;p=0">
                                                <img src="/Public/skin/default/images/list_box_1.jpg" style="padding:1px 2px;vertical-align:middle;" border="0"></a>
                                    </div>

                                    
                                    
          <div class='<?php echo $div_class; ?>' style='' id="paging">
                   <ul>
                      <?php echo $showPage ?>
                   </ul>
          <input name="pageinput" id="pageinput" onkeydown="if (event.keyCode==13){location.href = '/index.php/Admin/Products/ProductsList.html/P/'.this.value;}" type="text">
          </div>
                                </td>
		  </tr>
		</tbody></table>
    </div>
    
   <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">	
	<?php foreach($pro_list as $v=>$k): ?>				
<div bgcolor="#FFFFFF" style="width:315px; float:left;FONT-SIZE:14px; color:#666666;background-color:#FCFCFC; border:#e6e6e6 1px solid; margin-bottom:20px;margin-right:9px; height:390px; overflow:hidden;" class="changecolour">
<div style="padding:0px;margin:0 auto; width:315px;"><a href="" target="_blank">
        <img src="/Public/Uploads/<?php echo $k['logo'] ?>" width="315" height="315"></a></div>
<div style="padding:0px;line-height:30px;"><div style="float:left; width:210px;">&nbsp;&nbsp;货号：<?php echo $k['outer_id'] ?></div>
<div style="float:left; width:100px; text-align:right;"><?php echo $k['list_time'] ?>&nbsp;&nbsp;</div></div>
<div style="padding:0px;line-height:40px;"><input name="button_96" class="btn sortnamecss" style="font-size:12px;" id="button_96" value="编辑" onclick="window.location.href='/index.php/Admin/Products/ProductsEdit/id/<?php echo $k[id] ?>';" type="button">&nbsp;
<input name="button_96" class="btn sortnamecss" style="font-size:12px;" id="button_96" value="查看代码" onclick="window.open('');" type="button">&nbsp;<input name="button_96" class="btn sortnamecss" style="font-size:12px;" id="button_96" value="删除产品" onclick="window.location.href='/index.php/Admin/Products/ProductsDel/id/<?php echo $k[id] ?>';" type="button"></div>
</div>
            <?php endforeach; ?>

			
		<br>
<table style="padding:0; margin:auto;" width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center"> 
	<tbody>
    <tr>
	<td style="PADDING:5px 5px; FONT-SIZE: 14px; line-height:18px;" bgcolor="#F9F9F9" align="center">
            <div style="position:relative;width:280px; float:left; margin:0; padding:0;text-align:left;">
                    <form action="" method="get" style="margin:0; padding:0;">
                            <input name="action" id="action" value="" type="hidden">
                            <input name="keywords" class="search_input" id="keywords" value="<?php echo I('get.keywords') ?>" style="width:160px;vertical-align:middle;" type="text">&nbsp;
                            <input name="button" class="search_btn" id="button" value="搜索" style="vertical-align:middle;" type="submit"> 
                            <span class="Tooltip" title="可搜索关键字：产品名称、货号"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18">
                            </span>
		  </form></div>
<div class='<?php echo $div_class; ?>' style=''>
    <ul>
    <?php echo $showPage ?>
    </ul>
</div>
        </td>
		  </tr>
		</tbody></table>
                


	</div>

</div>
<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：0.54 秒</div>
    </div>
</div>


<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>