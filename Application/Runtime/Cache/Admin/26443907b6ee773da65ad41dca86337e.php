<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>添加成功</title>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
             <style type="text/css">
#show{width:800px;
      height:200px;
      line-height:200px;
      text-align:center;
      background-color:#888;
  //    color:#000;
      font-size:64px;
      position:absolute;
      top:30%;
      left:30%;margin:-100px 0 0 -100px;}
#show1{width:800px;
      height:100px;
      line-height:100px;
      text-align:center;
      background-color:#999;
  //    color:#000;
      font-size:34px;
      position:absolute;
      top:58%;
      left:30%;margin:-100px 0 0 -100px;}
#t_show{width:800px;
      height:100px;
      line-height:50px;
      text-align:center;
      background-color:#aaa;
      //color:#111;
      font-size:34px;
      position:absolute;
      top:10%;
      left:30%;margin:-50px 0 0 -100px;}


</style>
    </head>
    
    <body>
        <div id="t_show"><?php echo $word; ?></div>
        <div  id="show"><?php echo $state_word; ?><br>     </div>
        <div id="show1">
            准备跳转|
            <span id="span"><?php echo $time; ?></span>.......
              <input type="button" id="btn" value="点击跳转" /> 
        </div>
   
        
        
  <script language="JavaScript">
                function ok(){
                     //   location.href='/index.php/admin/Weightstation/index';
                  }
                window.setTimeout("ok();","<?php echo $time; ?>"*1000);
 
          
            function settime() { 
            var val =  document.getElementById('span');
           if(val.innerText>0){
             val.innerText = val.innerText-1;
            }else{
                val.innerText = '请等待';
            }
                setTimeout(function() { 
                      settime(val) 
                },1000) 
            } 

        window.onload = settime;

</script>
    </body>
</html>