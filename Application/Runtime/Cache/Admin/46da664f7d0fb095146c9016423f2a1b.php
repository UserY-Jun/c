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
  
                
                <li>Hi：<?php echo(cookie('admin')['username']) ?> / <?php echo cookie('shop_name'); ?></li>
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
    
                        

    
    

       <script type="text/javascript" src="/Public/js/jquery-1.11.1.js" charset="utf-8"></script>
<script>
         var LODOP; //声明为全局变量 

            $(function() {
                    CreatePrinterList();
                    CreatePrinterList_Inv();    
                    CreatePrinterList_Ord();  //配货单
                    CreatePrinterList_Rec();    
                    CreatePagSizeList();       
                    CreatePagSizeList_Inv();    
                    CreatePagSizeList_Ord(); 
                    
                   ShowPageInvSet(<?php echo $userinfo[pag_size_type_inv]; ?>);
                   ShowPageSet(<?php echo $userinfo[pag_size_type]; ?>);
                   ShowPageSet(<?php echo $userinfo[pag_size_type]; ?>);
                   ShowPageOrdSet(<?php echo $userinfo[pag_size_type_ord]; ?>);
                    });    
            
          //收款收据打印设置
          function CreatePrinterList_Rec(){
	    if (document.getElementById('strPrinterName_Rec').innerHTML!="") return;
		LODOP=getLodop(); 
		var iPrinterCount=LODOP.GET_PRINTER_COUNT();
		var PrintName="<?php echo $userinfo[str_printer_name_rec]; ?>";
		for(var i=0;i<iPrinterCount;i++){

   			var option=document.createElement('option');
   			option.innerHTML=LODOP.GET_PRINTER_NAME(i);
   			//option.value=i;
			option.value=LODOP.GET_PRINTER_NAME(i);
			if (PrintName==LODOP.GET_PRINTER_NAME(i)){option.selected="selected";};
			document.getElementById('strPrinterName_Rec').appendChild(option);
		};	
	};  
  
            //发货单
          function ShowPageInvSet(StrVal){
        	if (StrVal==1) {$('#showPageInput_Inv').css("display","");$('#hiddenPageInput_Inv').css("display","none");}
			else{$('#showPageInput_Inv').css("display","none");$('#hiddenPageInput_Inv').css("display","");};
        };
          function CreatePagSizeList_Inv(){
               LODOP=getLodop(); 
               clearPageListChild_Inv();
               var strPageSizeList=LODOP.GET_PAGESIZES_LIST(-1,"\n");
               var strPageSizeName="<?php echo $userinfo[pagsize_type_inv]; ?>";
               var Options=new Array(); 
               Options=strPageSizeList.split("\n");  
                Options.pop();
               for (i in Options)    
               {    
                 var option=document.createElement('option');   
                     option.innerHTML=Options[i];
                     option.value=Options[i];
                     if (strPageSizeName==Options[i]){option.selected="selected";};
                     document.getElementById('strPageName_Inv').appendChild(option);
               }  
        }
          function clearPageListChild_Inv(){
	    var PagSizeList =document.getElementById('strPageName_Inv'); 
	    while(PagSizeList.childNodes.length>0){
  		   var children = PagSizeList.childNodes;	
	  		 for(i=0;i<children.length;i++){		
			 PagSizeList.removeChild(children[i]);	
	  	  };	   
            };	   
        }
          function CreatePrinterList_Inv(){
                                         
	    if (document.getElementById('strPrinterName_Inv').innerHTML!="") return;
		LODOP=getLodop(); 
		var iPrinterCount=LODOP.GET_PRINTER_COUNT();
		var PrintName="<?php echo $userinfo[str_printer_name_inv]; ?>";
		for(var i=0;i<iPrinterCount;i++){

   			var option=document.createElement('option');
   			option.innerHTML=LODOP.GET_PRINTER_NAME(i);
   			//option.value=i;
			option.value=LODOP.GET_PRINTER_NAME(i);
			if (PrintName==LODOP.GET_PRINTER_NAME(i)){option.selected="selected";};
			document.getElementById('strPrinterName_Inv').appendChild(option);
		};	
	};     
  
       //说明书自定义显示
          function ShowPageSet(StrVal){
        	if (StrVal==1) {$('#showPageInput').css("display","");$('#hiddenPageInput').css("display","none");}
			else{$('#showPageInput').css("display","none");$('#hiddenPageInput').css("display","");};
		};
              //显示纸张  
          function CreatePagSizeList(){
                LODOP=getLodop(); 
                clearPageListChild();
                var strPageSizeList=LODOP.GET_PAGESIZES_LIST(-1,"\n");
                
                var strPageSizeName="<?php echo $userinfo[str_page_name]; ?>";
                var Options=new Array(); 
                Options=strPageSizeList.split("\n");   
                Options.pop();
                for (i in Options)    
                {     
                  var option=document.createElement('option');   
                      option.innerHTML=Options[i];
                      option.value=Options[i];
                      if (strPageSizeName==Options[i]){option.selected="selected";};
                      document.getElementById('strPageName').appendChild(option);
                }  
            }	    
          function clearPageListChild(){                      
                var PagSizeList =document.getElementById('strPageName'); 
                while(PagSizeList.childNodes.length>0){
                        var children = PagSizeList.childNodes;	
                              for(i=0;i<children.length;i++){		
                             PagSizeList.removeChild(children[i]);	
                       };	   
                };	   
            }    
            //end 纸张
            //显示打印机
         function CreatePrinterList(){
	    if (document.getElementById('strPrinterName').innerHTML!="") return;
		LODOP=getLodop(); 
		var iPrinterCount=LODOP.GET_PRINTER_COUNT();
		var PrintName="<?php echo $userinfo[strprinter_name]; ?>";
		for(var i=0;i<iPrinterCount;i++){

   			var option=document.createElement('option');
   			option.innerHTML=LODOP.GET_PRINTER_NAME(i);
   			//option.value=i;
			option.value=LODOP.GET_PRINTER_NAME(i);
			if (PrintName==LODOP.GET_PRINTER_NAME(i)){option.selected="selected";};
			document.getElementById('strPrinterName').appendChild(option);
		};	
	};innerHTML
           //end 显示打印机  end说明书
    
            //配货单自定义显示
         function ShowPageOrdSet(StrVal){
                if (StrVal==1) {$('#showPageInput_Ord').css("display","");$('#hiddenPageInput_Ord').css("display","none");}
		else{$('#showPageInput_Ord').css("display","none");$('#hiddenPageInput_Ord').css("display","");};
		}; 
         
         function clearPageListChild_Ord(){
	   var PagSizeList =document.getElementById('strPageName_Ord'); 
	   while(PagSizeList.childNodes.length>0){
  		   var children = PagSizeList.childNodes;	
	  		 for(i=0;i<children.length;i++){		
			PagSizeList.removeChild(children[i]);	
	  	  };	   
	   };	   
	 }

         function CreatePagSizeList_Ord(){
	   LODOP=getLodop(); 
	   clearPageListChild_Ord();
	   var strPageSizeList=LODOP.GET_PAGESIZES_LIST(-1,"\n");
	   var strPageSizeName="<?php echo $userinfo[str_page_name_ord]; ?>";
	   var Options=new Array(); 
 	   Options=strPageSizeList.split("\n"); 
            Options.pop();
	   for (i in Options)    
	   {    
	     var option=document.createElement('option');   
		 option.innerHTML=Options[i];
		 option.value=Options[i];
		 if (strPageSizeName==Options[i]){option.selected="selected";};
   		 document.getElementById('strPageName_Ord').appendChild(option);
	   }  
	 }	

         function CreatePrinterList_Ord(){
	    if (document.getElementById('strPrinterName_Ord').innerHTML!="") return;
		LODOP=getLodop(); 
		var iPrinterCount=LODOP.GET_PRINTER_COUNT();
		var PrintName="<?php echo $userinfo[str_printer_name_ord]; ?>";
		for(var i=0;i<iPrinterCount;i++){

   			var option=document.createElement('option');
   			option.innerHTML=LODOP.GET_PRINTER_NAME(i);
   			//option.value=i;
			option.value=LODOP.GET_PRINTER_NAME(i);
			if (PrintName==LODOP.GET_PRINTER_NAME(i)){option.selected="selected";};
			document.getElementById('strPrinterName_Ord').appendChild(option);
		};	
	 };
 
</script>




    <div style="width:1200px; margin:0 auto;">
        <form method='post' >
    <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px;">
		<table width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#CCCCCC" align="right">
      <tbody><tr>
        <td colspan="2" style="PADDING:5px; FONT-SIZE: 14px; line-height:20px; " height="30" bgcolor="#f7f7f7" align="center">操作说明</td>
  </tr>
  <tr>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:20px; " width="200" height="60" bgcolor="#FFFFFF" align="right">交易管理默认配置:</td>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:40px; " width="760" bgcolor="#FFFFFF" align="left">
            <input  name='is_multiple' id='is_Multiple' value='1' <?php if($userinfo[is_multiple]==1){ echo 'checked=checked';} ?>  type='checkbox'   >
          自动合并订单：<span style="color:#666666;">合并同一买家交易状态为买家已付款的所有订单</span><br>
            
            <input name="trade_waitprint0" id="Trade_waitprint0" value="1" <?php if(substr($userinfo[trade_waitprint],1,1)==1){echo 'checked=checked';} ?> type="checkbox">
          发货单未打印：<span style="color:#666666;">显示所有买家已付款且发货单尚未打印的交易记录</span><br>
            <input name="trade_waitprint1" id="Trade_waitprint1" value="1"  <?php if(substr($userinfo[trade_waitprint],2,1)==1){echo 'checked=checked';} ?> type="checkbox">
          说明书未打印：<span style="color:#666666;">显示所有买家已付款且说明书尚未打印的交易记录</span><br>
          <input name="trade_waitprint2" id="Trade_waitprint2" value="1" <?php if(substr($userinfo[trade_waitprint],3,1)==1){echo 'checked=checked';} ?> type="checkbox">
          配货单未打印：<span style="color:#666666;">显示所有买家已付款且配货单尚未打印的交易记录</span><br>
          <!--input name="Trade_waitprint3" type="checkbox" id="Trade_waitprint3" value=1  />
          快递单未打印：<span style="color:#666666;">显示所有买家已付款且快递单尚未打印的交易记录</span><br-->
        </td>
  </tr>
   
  
  <tr>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:20px; " width="200" height="60" bgcolor="#FFFFFF" align="right">收款收据打印配置:</td>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:40px; " width="760" bgcolor="#FFFFFF" align="left">
            打印偏移设置：左偏移 <input name="offset_left_rec" id="offsetLeft_Rec" value="<?php echo $userinfo[offset_left_rec]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        上偏移：<input name="offset_top_rec" id="offsetTop_Rec" value="<?php echo $userinfo[offset_top_rec]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        选择打印机：
        <select name="str_printer_name_rec" size="1" class="input" id="strPrinterName_Rec"></select>
        </td>
  </tr>
  
      <tr>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:20px; " width="200" height="60" bgcolor="#FFFFFF" align="right">发货单打印配置:</td>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:40px; " width="760" bgcolor="#FFFFFF" align="left">纸张设置：
            <input name="pag_size_type_inv" id="PagSizeType_Inv" value="1" onclick="ShowPageInvSet(1);" type="radio" <?php if($userinfo[pag_size_type_inv]==1){echo 'checked=checked';} ?> >
        自定义纸张   
        &nbsp;&nbsp;<input id="PagSizeType_Inv" name="pag_size_type_inv" value="2" <?php if($userinfo[pag_size_type_inv]==2){echo 'checked=checked';} ?> onclick="ShowPageInvSet(2);CreatePagSizeList_Inv();" type="radio">
        指定纸张：
        <select id="strPageName_Inv" name="pagsize_type_inv" size="1">
        </select>
        
        <br>
        <span id="showPageInput_Inv" style="display:none;">
            纸张大小：宽度 <input name="int_page_width_inv" id="intPageWidth_Inv" value="<?php  echo $userinfo[int_page_width_inv]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        高度 <input name="int_page_height_inv" id="intPageHeight_Inv" value="<?php  echo $userinfo[int_page_height_inv]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        </span>
       
        纸张方向：<input name="int_orient_inv" id="intOrient_Inv" value="1" type="radio" <?php if($userinfo[int_orient_inv]==1){echo 'checked=checked';} ?> >
        纵向   
        &nbsp;&nbsp;<input id="intOrient_Inv" name="int_orient_inv" value="2"  type="radio" <?php if($userinfo[int_orient_inv]==2){echo 'checked=checked';} ?> >
        横向<br>
        打印份数：<input name="int_copies_inv" id="intCopies_Inv" value="<?php echo $userinfo[int_copies_inv]; ?>" style="padding:2px;" size="10" class="input" type="text"> 份<br>
        打印机偏移设置：左偏移<input name="offset_left_inv" id="offsetLeft_Inv" value="<?php echo $userinfo[offset_left_inv]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        上偏移：<input name="offset_top_inv" id="offsetTop_Inv" value="<?php echo $userinfo[offset_top_inv]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        选择打印机：
        <select name="str_printer_name_inv" size="1" class="input" id="strPrinterName_Inv"></select><br>
        发货单纸张默认大小为：24.1cm×13.95cm<br></td>
  </tr>
  <tr>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:20px; " width="200" height="60" bgcolor="#FFFFFF" align="right">说明书打印配置:</td>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:40px; " width="760" bgcolor="#FFFFFF" align="left">纸张设置：
            <input name="pag_size_type" id="PagSizeType" value="1" onclick="ShowPageSet(1);" type="radio" <?php if($userinfo[pag_size_type]==1){echo 'checked=checked';} ?> >
        自定义纸张   
        &nbsp;&nbsp;<input id="PagSizeType" name="pag_size_type" value="2" <?php if($userinfo[pag_size_type]==2){echo 'checked=checked';} ?> onclick="ShowPageSet(2);CreatePagSizeList();" type="radio">
        指定纸张：<select id="strPageName" name="str_page_name" size="1"></select>
          <br>
        <span id="showPageInput" style="display:none;">
            纸张大小：宽度 <input name="int_page_width" id="intPageWidth" value="<?php echo $userinfo[int_page_width]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        高度 <input name="int_page_height" id="intPageHeight" value="<?php echo $userinfo[int_page_height]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        </span>
         
        纸张方向：<input name="int_orient" id="intOrient" value="1" type="radio" <?php if($userinfo[int_orient]==1){echo 'checked=checked';} ?> >
        纵向   
        &nbsp;&nbsp;<input id="intOrient" name="int_orient" value="2" checked="" type="radio" <?php if($userinfo[int_orient]==2){echo 'checked=checked';} ?> >
        横向<br>
        打印份数：<input name="int_copies" id="intCopies" value="<?php echo $userinfo[int_copies]; ?>" style="padding:2px;" size="10" class="input" type="text"> 份<br>
        打印偏移设置：左偏移 <input name="offset_left" id="offsetLeft" value="<?php echo $userinfo[offset_left]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        上偏移：<input name="offset_top" id="offsetTop" value="<?php echo $userinfo[offset_top]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        选择打印机：
        <select name="strprinter_name" size="1" class="input" id="strPrinterName"></select>
        </td>
  </tr>
    <tr>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:20px; " width="200" height="60" bgcolor="#FFFFFF" align="right">配货单打印配置:</td>
        <td style="PADDING:10px; FONT-SIZE: 14px; line-height:40px; " width="760" bgcolor="#FFFFFF" align="left">纸张设置：
            <input name="pag_size_type_ord" id="PagSizeType_Ord" value="1" onclick="ShowPageOrdSet(1);" type="radio" <?php if($userinfo[pag_size_type_ord]==1){echo 'checked=checked';} ?> >
        自定义纸张   
        &nbsp;&nbsp;<input id="PagSizeType_Ord" name="pag_size_type_ord" value="2"  <?php if($userinfo[pag_size_type_ord]==2){echo 'checked=checked';} ?> onclick="ShowPageOrdSet(2);CreatePagSizeList_Ord();" type="radio">
        指定纸张：<select id="strPageName_Ord" name="str_page_name_ord" size="1"></select>
 
          <br>
        <span id="showPageInput_Ord" style="display:none;">
            纸张大小：宽度 <input name="int_page_width_ord" id="intPageWidth_Ord" value="<?php echo $userinfo[int_page_width_ord]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        高度 <input name="int_page_height_ord" id="intPageHeight_Ord" value="<?php echo $userinfo[int_page_height_ord]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        </span>
        
     
        纸张方向：<input name="int_orient_ord" id="intOrient_Ord" value="1" type="radio" <?php if($userinfo[int_orient_ord]==1){echo 'checked=checked';} ?> >
        纵向   
        &nbsp;&nbsp;<input id="intOrient_Ord" name="int_orient_ord" value="2"  type="radio" <?php if($userinfo[int_orient_ord]==2){echo 'checked=checked';} ?> >
        横向<br>
        打印份数：<input name="int_copies_ord" id="intCopies_Ord" value="<?php echo $userinfo[int_copies_ord]; ?>" style="padding:2px;" size="10" class="input" type="text"> 份<br>
        打印机偏移设置：左偏移<input name="offset_left_ord" id="offsetLeft_Ord" value="<?php echo $userinfo[offset_left_ord]; ?>" style="padding:2px;" size="10" class="input" type="text">
        cm ; 
        上偏移：<input name="offset_top_ord" id="offsetTop_Ord" value="<?php echo $userinfo[offset_top_ord]; ?>" style="padding:2px;" size="10" class="input" type="text"> 
        cm<br>
        选择打印机：
        <select name="str_printer_name_ord" size="1" class="input" id="strPrinterName_Ord"></select><br>
        </td>
  </tr>
      <tr>
        <td colspan="2" style="PADDING:8px; FONT-SIZE: 14px;" height="30" bgcolor="#FFFFFF" align="center">
          <input value="&nbsp;保存设置&nbsp;" class="btn" style="background:#F90; height:30px; font-size:16px;width:180px;" onclick="SaveUsagePrinterSet()" type="submit">        </td>
        </tr>
</tbody></table>
	</div>
 </div>
  </form>
<div style="clear:both; margin:20px auto 0 auto; padding:0; width:1200px; border-top:#999999 1px dotted;">
	<div>
    	<div style="height:40px; line-height:40px; font-size:14px;">版权信息 | 意见反馈 | 页面执行时间：0.01 秒</div>
    </div>
</div>
<div id="iColorPicker" style="display: none; position: absolute;">

</div>
    

<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>