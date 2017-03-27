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
    
                        

    
    







    
    <div style="width:980px; float:right; text-align:left; padding:0; font-size:14px; margin-top:20px;">
    <form action="" method="post"  enctype="multipart/form-data"  >    
		<table style="padding:0; margin:auto;" width="980" cellspacing="1" cellpadding="1" border="0" bgcolor="#E1E1E1" align="center">

     <div  style="position:absolute; margin-left:717px;margin-top: 41px; width: 270px;height: 140px;" >
     <div id="localImag" style=" height: 203px; width: 250px; background:#ffffff;border-style:solid;border-width:5pt; border-color:#E1E1E1;">
     <image id="preview" style="height: 203px; width: 250px;"src=''></div></div>       
      <tbody><tr>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> 添加新品</td>
  </tr>
  <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " width="150" bgcolor="#FFFFFF" align="right">产品名称：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="title" id="Title" value="" size="30" class="input" type="text"></td>
  </tr>
  
    <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " width="150" bgcolor="#FFFFFF" align="right">产品图片：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input id="doc" onchange="javascript:setImagePreview();"  type="file"  onchange="javascript:PreviewImg(this);"  name="logo"   size="30"  ></td>
  </tr>
  
    <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">图案风格：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><select name="style_id" id="ProStyle" class="wenbenkuang" style="width:120px;">
          <option value="0">--请选择--</option>
          <?php foreach($stylelist as $v=>$k): ?>
          <option value="<?php echo $k['id'] ?>"><?php echo $k['style_name'] ?></option>
          <?php endforeach; ?>
        </select></td>
  </tr>
  <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">产品分类：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><select name="cat_id" id="Pro_ClassID" class="wenbenkuang" style="width:120px;">
        
        <?php foreach($catlist as $v=>$k): ?>
        <option class="input" value="<?php echo $k['id'] ?>"><?php echo $k['cat_name'] ?></option>
        <?php endforeach; ?>

        </select></td>
  </tr>
  
  
  
  
  

  <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">产品编号：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="outer_id" id="Outer_id" value="" size="30" class="input" type="text">
    <!--    <input name="act" id="act" value="" type="hidden">
        <input name="classid" id="classid" value="0" type="hidden">
        <input name="keywords" id="keywords" value="" type="hidden">
        <input name="p" id="p" value="0" type="hidden">
        <input name="SpecialID" id="SpecialID" value="0" type="hidden">   -->
        </td>
  </tr>
  
   <tr>
        <td class="label" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">产品类型：</td>
        
             <td  style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#666666; " bgcolor="#FFFFFF" align="left">
                       <?php buildSelect('Type','type_id','id','type_name'); ?>
                       <!--把ajax取回的属性数据放到这里-->
                       <ul id="attr_list">          </ul>
             </td>
   </tr>

  
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">/材料宽度：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#666666; " bgcolor="#FFFFFF" align="left"><input name="ProWidth" class="input" id="ProWidth" value="" size="30" type="text">
    cm</td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">/材料长度：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#666666; " bgcolor="#FFFFFF" align="left"><input name="ProLength" class="input" id="ProLength" value="" size="30" type="text"> 
    M</td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">/分卷类型：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#666666; " bgcolor="#FFFFFF" align="left"><input name="RollType" class="input" id="RollType" value="" size="30" type="text">
    M/卷，多个规格的分卷，用“,”隔开，如：5,10,20,30</td>
  </tr>
  <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">主推广标题：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left"><input name="sub_title" id="SubTitleA" value="" size="60" class="input" onpropertychange="getTitleLen()" type="text"> 标题&nbsp;<span id="SubTitleNum">0</span>&nbsp;字&nbsp;&nbsp;&nbsp;</td>
  </tr>

  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">历史推广标题：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:28px; " bgcolor="#FFFFFF" align="left">
    暂无历史推广标题
    </td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">产品简介：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#FF6666; " bgcolor="#FFFFFF" align="left"><input name="summ" class="input" id="Summ" value="" size="120" type="text"></td>
  </tr>
  <tr>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">宝贝卖点：</td>
    <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; color:#FF6666; " bgcolor="#FFFFFF" align="left"><textarea name="selling_point" cols="120" rows="3" class="textarea" id="SellingPoint"></textarea>
    
    
    </td>
  </tr>

  <tr>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="right">上架店铺：</td>
        <td style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#FFFFFF" align="left" id='select_td' >
            <select name="shop_id[]" id="ShopType" class="wenbenkuang" style="width:120px;">
          <option value="0" selected="">未上架</option>
          <?php foreach($grouplist as $v=>$k): ?>
          <option value="<?php echo $k['id'] ?>"  ><?php echo $k['shop_name'] ?></option>
          <?php endforeach; ?>
        </select>
            
        <input type="button" id="btn_add_cat_select" value="添加" name=''/>
        
        </td>
  </tr>
  <tr>
        <td colspan="2" style="PADDING:5px 10px; FONT-SIZE: 14px; line-height:20px; " bgcolor="#f7f7f7" align="center" height="30"> <input value="&nbsp;返回&nbsp;" class="btn" onclick="javascript:window.history.go(-1);" type="button"> <input class="btn" name="button" id="button" value="&nbsp;提交&nbsp;" type="submit"></td>
  </tr>
  
      
  
  
</tbody></table>
	</div>
 </div>
 
</form>

 
 
 
 
               
<script type="text/javascript">
    /****************************/
 //为类型绑定JS事件
    $("select[name=type_id]").change(function(){
       
        //获取选中的类型id
       var type_id = $(this).val();
       if(type_id>0){
           //执行ajax获取这个类型下面的属性
           $.ajax({
               type:"GET",
               url:"<?php echo U('ajaxGetAttr','',FALSE); ?>/type_id/"+type_id,
               dataType:"json",
               success:function(data){
                   var attHtml = "";   //拼出属性表单的字符串
                   //把服务器返回的属性数据进行循环输出
                   alert(1);
                   $(data).each(function(k,v){
                       attHtml+="<li>";
                      if(v.attr_type==1)
                           attHtml+="<a onclick='addNewLi(this);' href='javascript:void(0);' >[+]</a>";
                       attHtml +=v.attr_name +":";
                       //如果这个属性有可选值就输出下拉框,没有就输出文本框
                       if(v.attr_option_values=='')
                          attHtml +='<input name="pro_attr['+v.id+'][]" type="text" />';
                      else{
                          /******属性有可选值,制作下拉框**********/
                          attHtml +='<select name="pro_attr['+v.id+'][]">';
                          attHtml += '<option value="">请选择.....</option>';
                         //制作下拉框的可选数据,根据,号转化为数组
                         var _attr = v.attr_option_values.split(',');
                         //循环输出可选值,制作下拉框的选项
                         $(_attr).each(function(k1,v1){
                             attHtml +='<option value="'+v1+'">'+v1+'</option>';
                         });
                         attHtml += '</select>';
                      }
                      //如果属性是可选值就添加属性价格字段
                      if(v.attr_type==1)
                          attHtml += '属性价格:¥<input type="text" name="attr_price['+v.id+'][]" size="8" />元';
                      attHtml+="</li>";
                   });
                   //alert(attHtml);
                   //把拼好的属性表单放入页面中
                   $("#attr_list").html(attHtml);
               }
           });
       }else{
         //如果没有选中类型就清空表单中的属性框  
        $("#attr_list").html('');
       }
    });
  //点击属性的+或者-
  function addNewLi(a){
      //获取a所在的li标签,先把a使用$()转化为jquery对象,然后再调用parent()
      var li =$(a).parent();
      if($(a).html()=="[+]"){
       //克隆一个新的li
       var newLi = li.clone();
       newLi.find("a").html('[-]');
       newLi.find('a').attr('pro_attr_id','');
       newLi.find('input').attr('value','');
       //把新的发到旧的后面
       li.after(newLi);
      }else
          li.remove();
  }
    /*************************************************************************/
    

    
        $('#btn_add_cat_select').click(function(){
       var select=$('#select_td').find('select').eq(0).clone();
       $(this).before(select);   
    });


function setImagePreview(avalue) {
var docObj=document.getElementById("doc");
 
var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
//imgObjPreview.style.display = 'block';
//imgObjPreview.style.width = '150px';
//imgObjPreview.style.height = '180px'; 
//imgObjPreview.src = docObj.files[0].getAsDataURL();
 
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "150px";
localImagId.style.height = "180px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}
return true;
}



</script>








<br>
    
<?php  $etime=microtime(true); echo $etime-$stime ; ?>

</body>
</html>