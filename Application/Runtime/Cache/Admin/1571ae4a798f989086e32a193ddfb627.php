<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html id="html">
	 <head>
             <link rel="stylesheet" href="/Public/css/lanrenzhijia.css" media="all">
		<link rel=”icon” href="/Public/home/img/favicon.ico" mce_href="/Public/home/img/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="/Public/home/img/favicon.ico" mce_href="/Public/home/img/favicon.ico" type="image/x-icon">
		<title>称重系统</title>
		<script src="/Public/js/jquery1.42.min.js"></script>
		<script src="/Public/home/style.css"></script>
		  <style type="text/css">
		  	body{
		        padding-top: 100px;
		        background-color:#d9e9f9;
		    }
		    .td_1{
		    	height:75px;
		    	line-height:50px; 
		    	font-size:45px; 
		    	font-family: '黑体', '宋体'; 
		    	color: #369; 
		    	text-align: right; 
		    }
		    .td_2{
		    	padding:5px 30px; 
		    	line-height:50px; 
		    	font-size:40px; 
		    	font-family: '黑体', '宋体'; 
		    	color:#369; 
		    	text-align: left;
		    }
		  </style>
		  <script type="text/javascript">
		  window.onload= function(){
		  	document.getElementById("record").focus();
		  }
		  </script>
	 </head>
	 <body rel="index" scroll="no">
	 <center>
		<form action="" method="post" id="formsub">
		    <div class="div_style" style="border:#F9F9F9 20px solid; width:800px;background:#FFF;
		    border-radius:5px;">
		         <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF" style="border-collapse: collapse;">
		            
		                  <tbody>
		               <tr>
		                    <td height="70" colspan="2" align="center" bgcolor="#b9dbff" class="td_1" style="text-align: center;">称重操作台
		                    </td>
		              </tr>
		                  <tr>
		                    <td width="35%" bgcolor="#d4ddea" class="td_1">操作员工：
		                    </td>
			                <td bgcolor="#ebf2fd" class="td_2">
			                	<?php echo ($username); ?>              
			                    <input type="hidden" name="username" id="username" value="<?php echo ($username); ?>">
			                    <input type="hidden" name="uid" id="uid" value="<?php echo ($uid); ?>">
			                    
		                    </td>
		              </tr>
		              <tr>
		                <td bgcolor="#d4ddea" class="td_1">操作方式：
		                </td>
		                <td bgcolor="#ebf2fd" class="td_2">
							<?php switch($acttype): case "1000.00001": ?><font color="blue">退出系统</font><?php break;?>
							<?php case "1000.00011": ?><font color="blue">返回首页</font><?php break;?>
							<?php case "1000.00002": ?><font color="blue">质检台</font><?php break;?>
							<?php case "1000.00003": ?><font color="red">订单缺货</font><?php break;?>
							<?php case "1000.00005": ?><font color="blue">查看当日统计</font><?php break;?>
							<?php case "1000.00006": ?><font color="blue">查看当日记录</font><?php break;?>
							<?php case "1000.00007": ?><font color="red">删除记录</font><?php break;?>
							<?php case "1000.00008": ?><font color="blue">增加记录</font><?php break;?>
							<?php case "1000.00009": ?><font color="blue">更新记录</font><?php break; endswitch;?>
							<input type="hidden" name="acttype" id="acttype" value="<?php echo ($acttype); ?>">
		                </td>
		              </tr>
		              <tr>
		                <td bgcolor="#d4ddea" class="td_1">包裹重量：
		                </td>
		                    <td bgcolor="#ebf2fd" class="td_2">
		                   		<?php echo ($weight); ?>&nbsp;Kg
							<input type="hidden" name="weight" id="Weight" value="<?php echo ($weight); ?>">
								
		                	</td>
		              </tr>
		              <tr>
		                <td bgcolor="#d4ddea" class="td_1">物流校验：
		                </td>
		                <td bgcolor="#ebf2fd" class="td_2"><?php echo ($logistics_company); ?>
		                    <input type="hidden" name="re_invoiceno" id="re_invoiceno" value="<?php echo ($re_invoiceno); ?>">
		                    <input type="hidden" name="logistics_company" id="logistics_company" value="<?php echo ($logistics_company); ?>">
		                </td>
		              </tr>
		              <tr>
		                <td bgcolor="#d4ddea" class="td_1">数据录入：
		                </td>
		                <td bgcolor="#ebf2fd" class="td_2">
		                	<input 
		                	name="record" type="text" class="input" id="record" style="font-size:36px; width:380px; height:45px; line-height:40px; color:#036; padding:0 5px; vertical-align:middle;" autocomplete="off" disableautocomplete="" onblur="javascript:document.getElementById('record').focus();" 
		                	onchange="javascript:document.getElementById('record').focus();">
			                 <span class="Tooltip" title="以上所有信息均从数据录入框获得数据信息<br>包裹重量的计重单位必须为KG，其它单位无法正确结算物流费用<br>包裹重量支持范围为0-999KG，小数点后保留3位有效数字<br>操作方式、操作员工、包裹重量，这三项录入数据不分先后顺序<br>如果以上三项信息有效，最后录入物流单号则自动保存称重信息<br>如果操作方式、操作员工、包裹重量这三项中有一项无效或为空的话<br>即使录入物流单号，也不会保存称重信息">
			                 <img src="/Public/home/img/help.png" width="25" style="vertical-align:middle;">
			                </span>
		                </td>
		              </tr>
		              <tr>
		                <td height="70" colspan="2" align="center" bgcolor="#cfecfe" >               
                                    <input onclick="subF()" id="sub2" type="button" name="button" value=" 确 定 " class="go-wenbenkuang Tooltip" title="如果扫描枪不支持回车功能<br>则录入数据以后需要点确定按钮来提交数据" style="PADDING:5px 10px; line-height:32px; font-size:30px; font-family: '黑体', '宋体'; width:400px;color:#369;">
                                    
                                </td>
		              </tr>     
		     </tbody></table>
		</div>
		 
		</form>
	</center>
         <script>
             document.getElementById('html').onkeydown=keyDownSearch;  
            function keyDownSearch(e) {    
                    // 兼容FF和IE和Opera    
                    var theEvent = e || window.event;    
                    var code = theEvent.keyCode || theEvent.which || theEvent.charCode; 
                    if (code == 13) {    
                         subF();
                        
                    }    
                      
            }  
             
          function subF(){

              var username =  document.getElementById('username').value;
              var acttype =  document.getElementById('acttype').value;
              var Weight =  document.getElementById('Weight').value;
              var logistics_company =  document.getElementById('logistics_company').value;
              var record =  document.getElementById('record').value;
           
              if(username!==null && acttype==1000.00008 && Weight>0 && logistics_company!== '不校验物流' && record.length>4)
              {
                   $.ajax({
                        type: "POST", // Ajax 提交方式
                        url: "/index.php/Admin/Weightstation/Modify_switch", // 提交页
                        data: {record:record}, // 要提交的数据
                     //   timeout: 3000, // 超时设置，单位为毫秒
                        error: function() { // Ajax 发生错误时
                              alert("error!"); return false;
                        },
                        success: function(data) {
                        // 回调函数
                                document.getElementById('data_in').innerText = data;
                                document.getElementById('logistics_company_in').innerText = logistics_company;
                                if(data != logistics_company){
                                    var conftrue = confir_(logistics_company,data);
                                    
                                    if(conftrue===true){ submit() }
                                  return false;  
                                }
                                document.getElementById("formsub").submit();
                                return false;
                           }
                       });
                   
              }else{ 
                  submit();
              }
          }
          
          function confir_(){
                        $('.theme-popover-mask').fadeIn(200);
                        $('.theme-popover').slideDown(300);
                        
                        return  settime();
          }
          
          function submit(){
              document.getElementById("formsub").submit();
          }
          
          
           jQuery(document).ready(function($) {
                
                $('.theme-poptit .close').click(function(){
                        $('.theme-popover-mask').fadeOut(100);
                        $('.theme-popover').slideUp(200);
                        window.clearInterval(timer);
                        document.getElementById('span').innerText = 6;
                })
             //theme-popbod
               $('.theme-popbod .close').click(function(){
                        $('.theme-popover-mask').fadeOut(100);
                        $('.theme-popover').slideUp(200);
                        window.clearInterval(timer);
                        document.getElementById('span').innerText = 6;
                })
             
             
        })
        
        
        
         function settime() { 
            var val =  document.getElementById('span');    //document.getElementById('span').innerText
           if(val.innerText>0){
             val.innerText = val.innerText-1;
            }else{
                document.getElementById('Wspan').innerText='请等待..';
            }
        
            
               timer = setTimeout(function() { 
                      settime(val) 
                },1000) 
                
               if(val.innerText==0){
                 submit();
                return false;
            }   
                
                    
        } 

      //  window.onload = settime;
        
        
         </script>
         
         
         
         
        
<div class="theme-popover">
     <div class="theme-poptit">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3><span>请确认操作....</span></h3>  
     </div>
     <div class="theme-popbod dform">
        
                <ol>
                    <li><strong style=" width: 330px;"><span style=" font-size: 24px;">此订单为：<span id="logistics_company_in" style=" color: red;"></span>---您选择的快递为：<span id="data_in" style=" color: red;"></span></span>
                                <br><span style="color: red;cursor:pointer; font-size: 36px;" class="a_tishi"  >当前物流单号与您所选单号不一致</span></strong>
                         <br><br><br>
                        <strong style=" width: 330px;"> 
                            <span id ="Wspan"  style=" font-size: 24px;">|<span id="span" style=" color: red;">6</span>|S后自动确认添加.......</span>
                         </strong><br><br>
                     <input onclick="submit()" style=" margin-left: 10px;border-color: red;" class="btn" type="submit" name="submit" value=" 确定添加 " />
                      <input  style=" margin-left: 60px;  border-color: red;" class="btn close" type="submit" name="submit" value=" 取消 " />
                </ol>
          
     </div>
</div>
<div class="theme-popover-mask"></div>
         
         
         
	</body>
</html>