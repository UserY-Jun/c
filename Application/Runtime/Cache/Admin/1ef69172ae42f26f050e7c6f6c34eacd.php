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
                       <?php if((empty($shopData))): echo ($user_shop); ?>
                       <?php else: ?> 
                       <select id="test_3" onmouseover="shop_shop()" onchange="Store_switching()"  class="select" style=" position: absolute;top:-3px;">
                           <?php if(is_array($shopData)): foreach($shopData as $key=>$vo): ?><option><?php echo ($vo["shop_name"]); ?></option><?php endforeach; endif; ?>
                        </select><?php endif; ?>   
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
				<li><a href="/index.php/Admin/Shopgroup/Shopgrouplist">分店授权</a></li>
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
    
                        

    
    
<link rel="stylesheet" href="/Public/css/lanrenzhijia.css" media="all">
<style>
    
    .table-body-div ul li{
        
        border-bottom: 1px solid #E5E5E5;
        height: auto !important;
            padding: 20px 30px !important;
            margin: 0;
                text-align: -webkit-match-parent;
    }
    
    
    
    div ul li span {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
}

.title_1157 {
    font-weight: bold;
    font-size: 14px;
    /* color: #000000; */
}

.h_button {
    padding-left: 8px;
    padding-right: 8px;
    font-size: 13px;
    font-weight: bold;
    
}

.h_button_red {
    background-color: #D14836;
    background-image: -moz-linear-gradient(center top, #DD4B39, #D14836);
    border: 1px solid transparent;
    color: #FFFFFF;
    text-shadow: 0 1px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
}
.grey-memo {
    margin-left: 10px;
    color: #888888;
}



button.h_button, input.h_button[type="submit"] {
    height: 26px;
    line-height: 24px;
    margin: 0;    
}

.h_button_submit {
    min-width: 46px;
    padding: 0 8px;
    background-color: #4D90FE;
    background-image: -moz-linear-gradient(center top, #4D90FE, #4787ED);
    border: 1px solid #3079ED;
    color: #FFFFFF;
    text-shadow: 0 1px rgba(0, 0, 0, 0.1);
}

element.style {
    margin-left: 25px;
    margin-right: 25px;
    margin-top: 30px;
}

.page_nav {
    padding: 0px 5px;
    font-size: 14px;
}
</style>
<script type="text/javascript" src="/Public/js/jquery-1.11.1.js" charset="utf-8"></script>
<script>
        jQuery(document).ready(function($) {
                $('.h_button_submit').click(function(){
                       
                        $('.theme-popover-mask').fadeIn(100);
                        $('.theme-popover').slideDown(200);
                })
                $('.theme-poptit .close').click(function(){
                        $('.theme-popover-mask').fadeOut(100);
                        $('.theme-popover').slideUp(200);
                })
                $('.a_tishi').click(function(){ 
                    alert('稍等....');
                })
        })
   
  function GetRTime(){
     <?php $date = date("Y-m-d H:i:s",time()+60*15); ?> 
    var EndTime= new Date("<?php echo $date; ?>");
    var NowTime = new Date();
  
    var t =EndTime.getTime() - NowTime.getTime();
  
    var m=0;
    var s=0;
    if(t>=0){
     
      m=Math.floor(t/1000/60%60);
      s=Math.floor(t/1000%60);
    }
    if(m==0 && s ==0){
       
        document.getElementById('time').innerHTML='（<span style="font-size:20px;font-weight:800;color:red">已失效</span>，请刷新界面重新获取）';
        clearTimeout(f);
    }
    
    document.getElementById("t_m").innerHTML = m + "分";
    document.getElementById("t_s").innerHTML = s + "秒";
  }
  var f = setInterval(GetRTime,0);

/*
document.body.onbeforeunload = function (event)
    {
        var c = event || window.event;
        if (/webkit/.test(navigator.userAgent.toLowerCase())) {
            c.returnValue="确定离开当前页面吗？23333"; 
          //  return "离开页面将导致数据丢失111！";
        }
        else
        {
            c.returnValue = "离开页面将导致数据丢失222！";}
        }
*/

    window.Onbeforeunload=fun() ;
    function fun(){
         
           
    } ;


/*
 window.onbeforeunload = onbeforeunload_handler();
  window.onunload = onunload_handler();
  function onbeforeunload_handler(){
    var warning="确认退出?";
    return warning;
  }
  function onunload_handler(){
    var warning="谢谢光临";
    alert(warning);
  }
*/
/*
window.onbeforeunload=onclose;
function onclose()
{
return "您确定退出吗？";
}
*/
/*
var MSG_UNLOAD="如果你此时离开档案系统，所做操作信息将全部丢失，是否离开?";
var UnloadConfirm = {};
//启用监听浏览器刷新、关闭的方法
UnloadConfirm.set = function(confirm_msg){
  window.onbeforeunload = function(event){
    event = event || window.event;
    event.returnValue = confirm_msg;
  }
}
//关闭监听浏览器刷新、关闭的方法
UnloadConfirm.clear = function(){
  window.onbeforeunload = function(){};
}
UnloadConfirm.set(MSG_UNLOAD);
*/


//ie 6
/*
window.onbeforeunload=onclose;
function onclose()
{
var warnning = '<fmt:message key="systemMessage.exitWarning" />';
var beforeExit='<fmt:message key="systemMessage.beforeExitWarning" />';
 if(event.clientY<0 && event.clientX>document.body.clientWidth-20 || event.clientY<0 && event.clientX<20 ||
event.altKey || event.ctrlKey || event.clientY>document.body.clientHeight){
alert(beforeExit);
return warnning;
}
}*/
/*  最简单判断是否ie浏览器
if(-[1,]){
   alert("这不是IE浏览器！");
}else{
   alert("这是IE浏览器！");
}*/
    
 
    
</script>
        
        









<div class="theme-popover">
     <div class="theme-poptit">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3><span>多店铺双向绑定</span></h3>  
     </div>
     <div class="theme-popbod dform">
           <form class="theme-signin" name="loginform" action="" method="post">
                <ol>
                     
                     <li><strong style=" width: 330px;">输入其他店铺密钥 -- <span style=" background-color: red;cursor:pointer;" class="a_tishi"  >如何获取被绑定店铺的密钥</span></strong>
                         <br><br><br>
                        <strong style=" width: 330px;"> 
                           <input type="text" class="input-text" id="i_key" name="i_key" value="" style="width:300px" onblur="showBindMobile();" placeholder="请输入被绑定店铺的密钥">
                         </strong><br><br>
                     
                     <li><input style=" margin-left: 60px;" class="btn btn-primary" type="submit" name="submit" value=" 确定 " /></li>
                </ol>
           </form>
     </div>
</div>
<div class="theme-popover-mask"></div>


<body id="mySite" class="w1000" >



<div id="content">
    <div class="layout grid-s150m0">
        <div class="col-main">
            <div class="main-wrap h_box">
              
                <div style="padding:0 30px">
                        <label>当前店铺：</label>
                    <span style="font-size: 20px;">
                        晶宜家居用品旗舰店
                    </span>
                        <br>
                        <label>店铺密钥：</label>
                        <span id="key" style="font-size: 20px;"><?php echo random_str(36); ?></span>
                        <input id="nowtime" type="hidden" value="824481">
                        <span id="jumpwarning"><span style="font-size:20px;font-weight:800;color:red">
                               <div id="time" class="time" style=" margin-left: 35px;">
                                        <span id="t_m">00分</span>
                                        <span id="t_s">00秒</span>
                                </div>
      
                            </span></span>
                        <br>
                        
                </div>
                <div style="margin-left:30px;">
                    
                     <button style="margin-top:30px;line-height: 20px" class="h_button h_button_submit" >
                        <i class="fa fa-link fa-lg"></i> 绑定其他店铺
                    </button>
                    
                   
                </div>
                
      <div class="page_nav" style="margin-left:-700px;margin-right:25px;margin-top:30px;">
                    已绑定店铺：
      </div>
                <div style="padding:0px 25px 0px 25px;min-height:100px;">
                    <div class="table-body-div" style="border-top:0px solid #d4d4d4;background-color: #f4f4f4;">
                        <ul>
                            
                                <li style="vertical-align:middle;border-bottom:1px solid #d4d4d4;">
                                    <div>
                                        <span class="title_1157 w150">晶宜自粘</span>
                                        <span class="w100"></span>
                                        <span class="w150 tc">
                                                    <form onsubmit="return confirm('是否确认解除和 [ 晶宜自粘 ] 之间的双向绑定?');">
                                                        <input type="hidden" name="m" value="remove">
                                                        <input type="hidden" name="id" value="868">
                                                        <button class="h_button h_button_red" type="submit">
                                                            <i class="fa fa-unlink fa-lg"></i> 解除绑定
                                                        </button>
                                                    </form>
                                </span>
                                <span class="w200 grey-memo">
                                    绑定时间: 2016-07-28 09:40:13
                                </span>
                                    </div>                 
                                </li>
                                
                                
                                <li style="vertical-align:middle;border-bottom:1px solid #d4d4d4;">
                                    <div>
                                        <span class="title_1157 w150">晶宜自粘</span>
                                        <span class="w100"></span>
                                        <span class="w150 tc">
                                                    <form onsubmit="return confirm('是否确认解除和 [ 晶宜自粘 ] 之间的双向绑定?');">
                                                        <input type="hidden" name="m" value="remove">
                                                        <input type="hidden" name="id" value="868">
                                                        <button class="h_button h_button_red" type="submit">
                                                            <i class="fa fa-unlink fa-lg"></i> 解除绑定
                                                        </button>
                                                    </form>
                                </span>
                                <span class="w200 grey-memo">
                                    绑定时间: 2016-07-28 09:40:13
                                </span>
                                    </div>                 
                                </li>
   
                                    </div>      
                                </li>
                        </ul>
                    </div>
                </div>
                
                
                
                
                <div style="margin-left:25px;margin-top:30px;">
                	<a href="#" onclick="$('#d_log').toggle();return false;">多店铺绑定与切换日志▼</a>
                </div>
       
                    <div id="d_log" class="hide"style="display:none">
                    <div class="table-div">
                        <div class="table-body-div">
                            <ul>
                                <li>
                                    <span style="width:150px;">2017-03-14 12:42:39</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 12:42:22</span>

                                        用户【晶宜家居用品旗舰店】请求切换到店铺【爱花家居旗舰店】     
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 12:42:13</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功   
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 12:08:07</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【爱花家居旗舰店】 
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 11:55:34</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 10:40:45</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】   
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 09:23:38</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【爱花家居旗舰店】   
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 09:05:04</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功    
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-14 08:57:52</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】  
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 23:00:14</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】   
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 22:44:59</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 22:16:01</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 22:16:01</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 21:00:02</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【爱花家居旗舰店】
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 20:59:54</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功 
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 20:59:39</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 20:57:51</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 20:01:07</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 17:39:57</span>
                                        用户【晶宜家居用品旗舰店:忘忧草】切换店铺【晶宜家居用品旗舰店】成功
                                </li>
                                <li>
                                    <span style="width:150px;">2017-03-13 16:51:19</span>
                                        用户【晶宜家居用品旗舰店】请求切换到店铺【尚美家居专营店】 
                                </li>
                            </ul>
                        </div><!-- table-body-div -->
                    </div><!-- table-div -->
                    <form action="/lrb/more.htm" id="formMain" method="post" style="margin: 0; padding: 0; table-layout: fixed;" autocomplete="off">
                        <input type="hidden" name="m" value="setup"> <input type="hidden" id="p_pCurNum" name="p_pCurNum" value="1">
                        <input type="hidden" id="p_pSize" name="p_pSize" value="20">
                    </form>
<div class="table-footer-div" style="text-align:right">
		<input type="button" class="page-num selected" onclick="go(1)" value="1" style="border: 1px solid rgb(255, 85, 0); color: rgb(255, 85, 0); background: rgb(255, 238, 229);">
		<input type="button" class="page-num " onclick="go(2)" value="2">
		<input type="button" class="page-num " onclick="go(3)" value="3">
                <input type="button" class="page-num " onclick="go(118)" value="118">
		<input type="button" id="next" class="next" value="下一页" onclick="go(2)"> 
	&nbsp;
	到第<input type="text" id="pCurNum" size="3" value="1" style="text-align:right">页&nbsp;
		共118页
	<button onclick="go(this)" class="sure" value="&nbsp;"></button>
	<label> &nbsp;每页</label><select id="paging_change_p_size" onchange="changePSize(this)">
	   		 <option value="10">10</option>
	   		 <option value="20" selected="">20</option>
	   		 <option value="30">30</option>
	   		 <option value="50">50</option>
	</select>
	条 &nbsp;
</div>

                    </div>
                </div>
            </div>
        </div>
    
    </div>








<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>