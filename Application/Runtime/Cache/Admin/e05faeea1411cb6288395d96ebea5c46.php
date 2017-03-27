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
        
        
        function Store_switching(){
            
           location.href="/index.php/Admin/index/index";
            
            
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
        
        
        
        
  
        
        
        
</style>













</head>
<body>
    <?php $div_class='yahoo2'; ?>
<div class="bar"><div class="c">
	        <div class="f">ERP企业管理系统欢迎您！</div>
			<div class="r">
			    <ul id="loginStatus">
  
                
                <li>Hi：<?php echo(cookie('admin')['username']) ?> /
                   <div class="test_3" style="float:right;width:120px;">
                       <select id="test_3" onchange="Store_switching()">
                                <option value="1">测试1</option>
                                <option value="2">测试2</option>
                                <option value="3" selected><?php echo cookie('shop_name'); ?></option>
                                <option value="4">测试4</option>
                        </select>
                  </div>
  
                    </li>
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
				<li class="fst"><a href="/index.php/Admin/index/index" class="yahei">系统首页</a></li>
					<li><a href="/index.php/Admin/trade/tradeLIST">交易管理</a></li><li><a href="/index.php/Admin/Products/productsList">宝贝管理</a></li> <li><a href="../express/index.asp">物流结算</a></li>
                     <li><a href="../knowledge/index.asp">知识问答</a></li>
					 <li><a href="/index.php/Admin/Admin/Adminlist">用户管理</a></li>
                                         
                                         <li><a href="../weightstation/index.asp" target="_blank">称重操作台</a></li>
                     <li><a href="/index.php/Admin/Stock/StockList">库存管理</a></li>
		    <li><a href="../user/index.asp">会员中心</a></li>
				<li><a href="../main/sitemap.asp">授权中心</a></li>
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
    
                        

    
    
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/Public/skin/favicon.ico">
    <link href="/Public/skin/default/default.css" rel="stylesheet" type="text/css">
    <link href="/Public/skin/default/trade.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/js/jquery-1.11.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="/Public/js/dialog-plus-min.js" charset="utf-8"></script>
    <?php  include "/Public/js/Print.js.php"; ?>
    <script type="text/javascript" src="/Public/js/trade.js" charset="utf-8"></script>

</head>

 <script>
        //模糊搜索
          function Pagecookie(){
           //   var url = $('#page').attr('url');
           //   alert(url);
              var url = "/index.php/Admin/Trade/TradeList/OrderStateID/9/OrderStateID/7/RecentDays/30/RecentDays/1?p=2";    
              if(url.indexOf('.html')>0){
                 var url =  url.substring(0,url.indexOf('.html'));
              }
           //   alert(url);
              if(url.indexOf('/button/s/keywords/')>0){ 
                 var url_s=url.substring(0,url.indexOf('/button/s/keywords/'));
                 var num = '/button/s/keywords/';
                 var url_e_num = num.length;
                 var url_e = url.substring((url.indexOf('/button/s/keywords/')+url_e_num));
                 if(url_e.indexOf('/')>0){var url_e = url_e.substring(url_e.indexOf('/'));  }else{ var url_e = ''; }
              }else if(url.indexOf('/button/s')>0){
                 var url_s=url.substring(0,url.indexOf('/button/s'));
                 var num = '/button/s';
                 var url_e_num = num.length;
                 var url_e = url.substring((url.indexOf('/button/s')+url_e_num)); 
          //   alert(url_s);alert(url_e);return ; 
              }else{
                  var url_s = url;url_e =  '';
              }
              var keywords = document.getElementById('keywords1').value; 
           //   location.href = url_s+url_e+'/button/s/keywords/'+keywords;
              if(keywords){
                    location.href = url_s+url_e+'/button/s/keywords/'+keywords;
              }else{
                  location.href = url_s+url_e+'/button/s';
              }
          }
          
          function RecentDays_Jump(this_){
              var url = "/index.php/Admin/Trade/TradeList/OrderStateID/9/OrderStateID/7/RecentDays/30/RecentDays/1?p=2";
              if(url.indexOf('.html')>0){
                 var url =  url.substring(0,url.indexOf('.html'));
              }
              location.href =url+"/RecentDays/"+this_;
          }
          
          function OrderStateID_Jump(this_){
              var url = "/index.php/Admin/Trade/TradeList/OrderStateID/9/OrderStateID/7/RecentDays/30/RecentDays/1?p=2";
              if(url.indexOf('.html')>0){
                 var url =  url.substring(0,url.indexOf('.html'));
              }
              
            
             location.href =url+"/OrderStateID/"+this_;
              
          }
          
          
        //跳转分页          
    function jump_link(){
       
        var page = $('#page').val();
        if(page!=parseInt(page)){
            alert('非整形');return ;
        }
        if(page<1){
            alert('不能为负数');return ;
        }
         var url = $('#page').attr('url');
         if(url.indexOf('.html')>0 && url.indexOf('=')>0){
              var url=url.substring(0,url.indexOf('&p='));
         }
         
        
         
         
        if(url.indexOf('?')>0 && url.indexOf('=')>0){
            if(url.indexOf('&p=')>0){
            var hurl=url.substring(0,url.indexOf('&p='));
            var url_ = hurl+'&p'+'='+$('#page').val();
            }else if(url.indexOf('?p=')>0){
                var hurl=url.substring(0,(url.indexOf('?p=')));
                var url_ = hurl+'?p'+'='+$('#page').val();
            }else{
                var hurl=url;
                var url_ = hurl+'&p'+'='+$('#page').val();
            }
            location.href = url_;
            return ;
        }else{
            if(url.indexOf('/p/')>0){
             // var hurl=url.substring(0,url.indexOf('/p/'));
                var url_s=url.substring(0,url.indexOf('/p/'));
                var num = '/p/';
                var url_e_num = num.length;
                var url_e = url.substring((url.indexOf('/p/')+url_e_num));
                if(url_e.indexOf('/')>0){var url_e = url_e.substring(url_e.indexOf('/'));  }else{ var url_e = ''; }
                var hurl=  url_s+url_e;   
            }else{
                var hurl=url;
            }
            if(url.indexOf('?p=')>0){
                var hurl=url.substring(0,url.indexOf('?p='));var hurl=url;
            }
            var url_ = hurl+'/p'+'/'+$('#page').val();
            location.href = url_;
            return ;
        }
}
          
         function invoice_status_time_url(){
            document.getElementById("invoice_status_time").submit();  
         } 
          
          
      </script>

    
    <body rel="index">
    
<object id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width="0" height="0"> 
<embed id="LODOP_EM" type="application/x-print-lodop" width="0" height="0">
</object>
<link href="/Public/skin/dialog/ui-dialog.css" rel="stylesheet">
<title>ERP企业管理系统</title>


<style type="text/css">
	.express_status0	{ cursor:pointer;color:#CCCCCC;}
	.express_status1	{ cursor:pointer;color:#F60;}
	.invoices_status0	{ cursor:pointer;color:#CCCCCC;}
	.invoices_status1	{ cursor:pointer;color:#36F;}
	.usage_status0		{ cursor:pointer;color:#CCCCCC;}
	.usage_status1		{ cursor:pointer;color:#90C;}
	.isSinged_status0		{ cursor:pointer;color:#CCCCCC;}
	.isSinged_status1		{ cursor:pointer;color:#603;}
	.orderblank_status0		{ cursor:pointer;color:#CCCCCC;}
	.orderblank_status1		{ cursor:pointer;color:#0C0;}
	.trade_menu			{ float:left; width:120px; height:40px; line-height:40px;border-right:#E1E1E1 1px solid; text-align:center;  }
	.trade_menu_type	{ background: #F9F9F9;}
	.trade_menu_curr	{ background: #F90;}
	.show_info			{ background: #F9F9F9; }
	.hiden_info			{ background: #FFFFFF; }
	#leo {  
            border: 1px solid grey;  
            opacity: 0.8;  
            background: grey;  
        } 
</style>

<div id="hidden" align="center" style="display:none">
    <form id="invoice_status_time" name="invoice_status_time" class="box" method="post" action="/index.php/Admin/Trade/TradeList" >
        
        <input name="invoice_status_time" value="1" type="text">
    </form>
</div>

<div style="width:1200px; margin:0 auto;z-index:1;">
  <div style="width:1198px; border:#DDDDDD 1px solid; background:#f9f9f9; float:left; text-align:left; padding:10px 0; margin-bottom:20px; font-size:14px;">
    <div style="width:220px; float:left; margin:0; padding:0 10px;text-align:left;">
        <form action="" method="get" style="margin:0; padding:0;">
            <input name="" id="action" value="list" type="hidden">
            <input name="keywords" class="search_input" id="keywords1" value="<?php echo I('get.keywords'); ?>" size="16"
                   onfocus="if(this.value==this.getAttribute('emptyText'))this.value=''"
                   onblur="if(this.value=='')this.value=this.getAttribute('emptyText')" emptytext="" style="vertical-align:middle;" type="text">&nbsp;
            <input name="button" class="search_btn" id="button" value="搜索" style="vertical-align:middle;" type="button" 
                 onclick=" Pagecookie('p','1')"> 
            <span class="Tooltip" title="仅搜索已查询过的订单信息&lt;br&gt;可搜索关键字：买家旺旺名、物流单号、订单编号、收货人姓名、收货人手机"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span>
              </form></div>
     
      
      
    	<div style="width:900px; float:left; margin:0; padding:0;text-align:left;">
            <form id="form_updatetrade" style="margin:0; padding:0; float:left;">
                <select name="RecentDays" id="RecentDays"   onchange="RecentDays_Jump(this.value)">
                      <option value="1" <?php $RecentDays=I('get.RecentDays'); if($RecentDays==1){echo 'selected=';} ?> >最近一天</option>
                      <option value="3" <?php $RecentDays=I('get.RecentDays'); if($RecentDays==3){echo 'selected=';} ?> >最近三天</option>
                      <option value="7"  <?php $RecentDays=I('get.RecentDays'); if($RecentDays==7){echo 'selected=';} ?> >最近一周</option>
                      <option value="30" <?php $RecentDays=I('get.RecentDays'); if($RecentDays==30){echo 'selected=';} ?> >最近30天</option>
                      <option value="-1" <?php $RecentDays=I('get.RecentDays'); if($RecentDays==-1 || $RecentDays==''){echo 'selected=';} ?> >已查询过的历史订单</option>
                </select>
          <span style="padding:10px;">
          <select name="OrderStateID" id="OrderStateID" onchange="OrderStateID_Jump(this.value)">
              <option value="2" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==2){echo 'selected=';} ?> >等待买家付款</option>
              <option value="5" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==5 || $OrderStateID==''){echo 'selected=';} ?> >买家已付款</option>
              <option value="7" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==7){echo 'selected=';} ?>>卖家已发货</option>
              <option value="3" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==3){echo 'selected=';} ?>>交易关闭</option>
              <option value="4" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==4){echo 'selected=';} ?>>退款成功,交易关闭</option>
              <option value="9" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID==9){echo 'selected=';} ?>>交易成功</option>
              <option value="0" <?php $OrderStateID=I('get.OrderStateID'); if($OrderStateID=='0'){echo 'selected=';} ?>>全部订单</option>
          </select>
          </span>
        <input name="updatetrade" id="updatetrade" value="查询订单" style="clear:both;width:80px; background: #F90; color:#ffffff; border:none; text-align:center; height:22px;" onclick="getupdatetrade();" type="button">
        <input name="updatetrades" id="updatetrades" value="更新订单" style="clear:both;width:80px; background: #09F; color:#ffffff; border:none; text-align:center; height:22px;" onclick="getupdatetrades();" type="button">
        <span style="padding:10px;">最近查询时间：<b style="color:#F60;"><?php echo F('Latest_update_time'); ?></b></span>
        <!--input type="button" name="updateinvoiceNo" id="updateinvoiceNo" value="关联单号"  style="clear:both;width:80px; background: #09F; color:#ffffff; border:none; text-align:center; height:22px;" onclick="window.location.href('update_invoiceNo.asp')"/>
        <input type="button" name="updateWeight" id="updateWeight" value="物流记录"  style="clear:both;width:80px; background: #0C0; color:#ffffff; border:none; text-align:center; height:22px;" onclick="window.open('../warehouse/weighting.asp?record=474289.016')"/-->
        <span style="padding-left:10px; color:#09F;">今日成交：<?php  $Latest_update_time = F('Latest_update_time'); if(strtotime($Latest_update_time)>strtotime(date('Ymd'))){ echo number_format(F('linch_a_deal_today'),2);}else{echo 0.00;} ?>元</span>
        <!--span style="padding:10px;color:#09F;">不想自动合并订单？</span-->
        </form>
        </div>
    </div>
    <div id="divtopnav" class="">
        	<ul class="topnav">
                <li><div onclick="getCheckedList(3)" style="background:#C93;">( <span id="checkboxlength">0</span> ) <span id="checkboxtitle">全选</span></div><a href="javascript:void(0)" style=" background:#C80;">▼</a>
                    <ul class="subnav" style="">
                        <li onclick="getCheckedList(0)" style=" background:#C80; border-bottom:#C93 1px solid;" "="">取消</li>
                        <li onclick="getCheckedList(2)" style=" background:#C80; border-bottom:#C93 1px solid;" "="">反选</li>
                    </ul>
                </li>
                <!--li><div onclick="InvoicesPrint(0)" style="background: #36F;">打印发货单</div><a href="javascript:void(0)" style="background: #38F;">▼</a>
                    <ul class="subnav">
                        <li onclick="InvoicesPrint(1)" style="background: #38F; border-bottom:#36F 1px solid;"">预览发货单</li>
                        <li onclick="InvoicesPrint(2)" style="background: #38F; border-bottom:#36F 1px solid;"">标志为已打印</li>
                        <li onclick="InvoicesPrint(3)" style="background: #38F; border-bottom:#36F 1px solid;"">标志为未打印</li>
                    </ul>
                </li-->
                <li><div onclick="InvoicesPrint(0)" style="background: #36F;">打印发货单</div><a href="javascript:void(0)" style="background: #38F;">▼</a>
                    <ul class="subnav" style="">
                    	<li onclick="InvoicesPrint(1)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">预览发货单</li>
                        <li onclick="InvoicesPrint(2)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">标志为已打印</li>
                        <li onclick="InvoicesPrint(3)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">标志为未打印</li>
                    </ul>
                </li>
                
                <li><div onclick="OrderBlankPrint(0)" style="background: #0C0;">打印配货单</div><a href="javascript:void(0)" style="background: #0d0;">▼</a>
                    <ul class="subnav" style="">
                        <li onclick="OrderBlankPrint(1)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">预览配货单</li>
                        <li onclick="OrderBlankPrint(2)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">标志为已打印</li>
                        <li onclick="OrderBlankPrint(3)" style="background: #0d0; border-bottom:#0C0 1px solid;" "="">标志为未打印</li>
                    </ul>
                </li>
                <li><div onclick="StatisticsListPrint(0)" style="background: #90C;">打印对账单</div><a href="javascript:void(0)" style="background: #94C;" class="">▼</a>
                    <ul class="subnav" style="display: none;">
                        <li onclick="StatisticsListPrint(1)" style="background: #94C; border-bottom:#94C 1px solid;" "="">预览对账</li>
                    </ul>
                </li>
                <li><div onclick="AjaxOrdersMerger(0,1)" style="background: #800000;">合并订单</div><a href="javascript:void(0)" style="background: #804000;" class="">▼</a>
                    <ul class="subnav" style="display: none;">
                        <li onclick="AjaxOrdersMerger(0,0)" style="background: #804000; border-bottom:#800000 1px solid;" "="">取消合并</li>
                    </ul>
                </li>
                <!--li><div style="background:#F60;">打印快递单</div><a href="javascript:void(0)" style="background:#F80;">▼</a>
                    <ul class="subnav">
                        <li style="background:#F80; border-bottom:#F60 1px solid;">预览快递单</li>
                        <li style="background:#F80; border-bottom:#F60 1px solid;">标志为已打印</li>
                    </ul>
                </li-->
            </ul>
            <span style="text-align:right; float:right; width:30px; padding:10px 5px 0 0;" class="Tooltip" title="点此进入基本设置"><a href="/index.php/Admin/Trade/setup">
                    <img src="/Public/skin/default/images/set_trade.png" width="30"></a></span>
            <span style="text-align:right; float:right; width:30px; padding:10px 5px 0 0;" class="Tooltip" title="点击显示今日已打印发货清单的订单列表">
                <a href="#" onclick="invoice_status_time_url()">
                   <img src="/Public/skin/default/images/trade_print.png" width="30"></a></span>
        </div>
       
		<div style="width:1200px; float:right; text-align:left; padding:0; font-size:14px; z-index:auto; margin-bottom:20px;">
		<div id="tradelist">
		<table style="padding:0; margin:auto;" id="recordlist" width="1200" cellspacing="0" cellpadding="0" border="0" bgcolor="#E1E1E1" align="center">
			 <tbody><tr style="FONT-SIZE: 14px; line-height:25px;" bgcolor="#f7f7f7" align="center">
               <td width="30" bgcolor="#f7f7f7" align="center" height="40"><input id="check_row_all" name="check_row_all" onclick="getCheckedAll(this)" value="1" type="checkbox"></td>
               <td width="20"><img src="/Public/images/Expand.png" class="Tooltip" title="点击展开全部订单详情" id="lable_order_info" onclick="showallorder();" id="onloadandonclick" ></td>
                      
                        
               <td width="140">买家ID</td>
               <td width="60">&nbsp;</td>
               <td width="60">金额</td>
	       <td width="400">收货信息</td>
               <td width="140"><?php echo isset($default)?'付款时间':"下单时间"; ?></td>
	       <td width="120">订单状态</td>
               <td width="120">物流单号</td>
	       <td width="190">打印状态</td>

          <?php cookie('order_where_id',$order_list[0][id]); ?> 
                      <?php if((empty($order_list)) ): ?><tr>
                                      <td width="140" >
                                          暂无数据......
                                     </td>
                                     <td width="60" >
                                           <a onclick="javascript:window.location.href='/index.php/admin/trade/UpdateTradesList'"  style=" background-color: red;cursor:pointer;"> 导入</a>
                                     </td>
                                     <td width="60" >
                                          ........或
                                     </td>
                                     <td width="140" >   
                                          <a onclick="window.history.go(-1)" style=" background-color: red;cursor:pointer;">点击返回</a>
                                     </td>
                              </tr><?php endif; ?>         
      <?php foreach($order_list as $v=>$k): ?>  
      
<tr style="FONT-SIZE: 14px; color:#666666;" class="changecolour" id="row_<?php echo $k[tid_s] ?>" bgcolor="#FFFFFF">
<td class="" align="center">
    <input onclick="getCheckedEach()" id="check_row" name="check_row" value="<?php echo $k[tid_s] ?>" type="checkbox"></td>
<td class="" align="center">
    <img src="/Public/images/Expand.png" class="Tooltip" title="点击展开订单详情" id="lable_order_info_<?php echo $k[tid_s] ?>" onclick="showorder(<?php echo $k[tid_s] ?>)">
</td>
<td style="FONT-SIZE: 12px; color:#333333;" class="" align="left">
    <div title="153875">
        <a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&amp;touid=<?php echo $k['buyer_nick'] ?>&amp;siteid=cntaobao&amp;status=2&amp;charset=utf-8" class="Tooltip" title="点击这里给我发消息">
            <img src="http://amos.alicdn.com/online.aw?v=2&amp;uid=<?php echo $k['buyer_nick'] ?>&amp;site=cntaobao&amp;s=2&amp;charset=utf-8" style="vertical-align:middle;" border="0"></a>
        <span onclick="showorder(<?php echo $k[tid_s] ?>)"><?php echo $k['buyer_nick'] ?></span>
    </div>
</td>

<td style="FONT-SIZE: 12px; " class="" align="center">&nbsp;
    <?php echo $k[id] ?>    
  <?php  if($k[buyer_message]): ?>   
    <img class="Tooltip" src="/Public/skin/default/images/trade_message.png" title="<?php  echo $k[buyer_message]; ?><br>卖家备注：" border="0" align="absmiddle">
<?php endif; ?>
<?php  if($k['whether_merge']==1): ?>
    <img class="Tooltip" src="/Public/skin/default/images/merger_status.png" title="多单合并" border="0" align="absmiddle">
 <?php endif; ?>
 <?php if($k['many']>1): ?>
 <img class="Tooltip" src="/Public/skin/default/images/orders_multiple.png" title="3日内同一个旺旺号拍下并已付款的有多个订单，点击查看该买家的多个订单" border="0" align="absmiddle">
 <?php endif; ?>
</td>
<td style="FONT-SIZE: 12px; color:#666666;" class="" align="right">
    <div style="padding:2px 10px;" onclick="CheckedOne(<?php echo $k[tid_s] ?>)"><?php echo $k['total_pricce'] ?></div></td>
<td style="FONT-SIZE: 12px; color:#666666;" class="" align="left">
    <div style="padding:2px 5px;word-break:break-all; width:390px;color:#666666;" onclick="CheckedOne(<?php echo $k[tid_s] ?>)">
        <span> </span>&nbsp;&nbsp;&nbsp;<?php echo $k['receiver_address'] ?>&nbsp;- ，
        <nobr><?php echo isset($k['receiver_mobile'])?$k['receiver_mobile']:$k['receiver_phone'] ?></nobr> ，<nobr><?php echo $k['receiver_name'] ?></nobr></div></td>
<td style="FONT-SIZE: 12px; color:#666666;" class="" align="center">
                         <nobr><a href="/index.php/Admin/Trade/OrderBlankPrintInfoList/tid_s/<?php echo $k[tid_s] ?>" target="_blank"> <?php echo isset($default)?date('Y-m-d H:i:s',$k['pay_time']):date('Y-m-d H:i:s',$k['created']); ?></a></nobr></td>
<td style="PADDING:10px 0; FONT-SIZE: 14px; height:25px; color:#666666;" title="订单编号:<?php echo $k[tid_s] ?>" class="" align="center">
                        <nobr><a href="/index.php/Admin/Trade/InvoicesPrintList/tid_s/<?php echo $k[tid_s] ?>" target="_blank">
        
        <?php  echo $k['order_status']; ?></a></nobr></td>
<td style="PADDING:10px 0; FONT-SIZE: 14px; height:25px; color:#666666;" class="" align="center">
<nobr><a href="javascript:void(0)" style="color:#666;"></a></nobr></td>
<td style="PADDING:0px; FONT-SIZE: 14px; color:#666666; line-height:40px;" class="" align="center">
    
<?php if($k['invoice_status'] == 0 ): ?><span class="invoices_status0 Tooltip" title="发货单未打印,点击改为已打印状态" onclick="AjaxOrdersStatus(<?php echo $k[tid_s] ?>,2,1,1)">√</span>&nbsp;&nbsp;
 <?php else: ?>
 <span class="invoices_status1 Tooltip" title="发货单已打印<br>打印次数合计：<?php echo($k['invoice_status_num']); ?>次<br>最后打印时间：<?php echo $k['invoice_status_time']; ?>" onclick="getprintedtrades('1')">√</span>&nbsp;&nbsp;<?php endif; ?>   

<?php if($k['invoice_no'] == 0 ): ?><span class="orderblank_status0 Tooltip" title="配货单未打印,点击改为已打印状态" onclick="AjaxOrdersStatus(<?php echo $k[tid_s] ?>,3,1,1)">√</span>&nbsp;&nbsp;
  <?php else: ?>
   <span class="orderblank_status1 Tooltip" title="配货单已打印<br>打印次数合计：<?php echo($k['invoice_no_num']); ?>次<br>最后打印时间：<?php echo $k['invoice_no_time']; ?>" onclick="getprintedtrades('1')">√</span>&nbsp;&nbsp;<?php endif; ?>  

<?php if($k['instructions'] == 0 ): ?><span class="usage_status0 Tooltip" title="说明书未打印,点击改为已打印状态" onclick="AjaxOrdersStatus(<?php echo $k[tid_s] ?>,4,1,1)">√</span>&nbsp;&nbsp;
  <?php else: ?> 
<span class="usage_status1 Tooltip" title="说明书已打印<br>打印次数合计：<?php echo($k['instructions_num']); ?>次<br>最后打印时间：<?php echo $k['instructions_time']; ?>" onclick="getprintedtrades('1')">√</span>  &nbsp;&nbsp;<?php endif; ?> 

<?php if($k['warehouse_delivery'] == 0 ): ?><span class="isSinged_status0 Tooltip" title="仓库尚未确认发货">√</span>&nbsp;&nbsp;<span class="usage_status0 Tooltip" title="编辑该订单" onclick="AjaxeditOrder('<?php echo $k[tid_s] ?>','','','','','','')">✡</span></td>
<?php else: ?> 
<span class="isSinged_status1 Tooltip" title="仓库已发货，发货时间：2016/11/26 15:47:52">√</span><?php endif; ?> 

</tr>
<tr style="FONT-SIZE: 12px; color:#666666; display:None; border:1px solid red;" name =" 1 " id="showtradeinfo_<?php echo $k[tid_s] ?>">
<td colspan="10" align="left"><div id="orderinfo_<?php echo $k[tid_s] ?>"><p style="height:40px; line-height:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单载入中，请稍后...</p></div></td>
</tr>

<?php endforeach; ?>



			
		
		</tbody></table>
        </div>
		<table style="padding:0;"  width="1200" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">
			  <tbody><tr>
				<td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:18px;" bgcolor="#F9F9F9" align="center">
                                    <div style="width:220px; margin-right: 950px; padding:0;text-align:left;">
                  <form action="" method="get" style="margin:0; padding:0;">
            <input name="keywords" class="search_input" id="keywords" value="<?php echo I('get.keywords'); ?>" size="16"
                   onfocus="if(this.value==this.getAttribute('emptyText'))this.value=''"
                   onblur="if(this.value=='')this.value=this.getAttribute('emptyText')" emptytext="" style="vertical-align:middle;" type="text">&nbsp;
            <input name="button" class="search_btn" id="button" value="搜索" style="vertical-align:middle;" type="submit" 
                 onclick=" Pagecookie('p','1')"> 
            <span class="Tooltip" title="仅搜索已查询过的订单信息&lt;br&gt;可搜索关键字：买家旺旺名、物流单号、订单编号、收货人姓名、收货人手机"><img src="/Public/skin/default/images/help.png" style="vertical-align:middle;" width="18"></span>
              </form>
               </div>
                            
                    <div class='<?php echo $div_class; ?>' style=''>
    <ul>
        <?php echo $showPage ?>

        <input name="page" id="page" type="text" url="/index.php/Admin/Trade/TradeList/OrderStateID/9/OrderStateID/7/RecentDays/30/RecentDays/1?p=2" value="<?php echo I('get.p')?(int)I('get.p'):''; ?>"><button type="sumbit" onclick="jump_link()">GO</button>

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




</body></html>


<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>