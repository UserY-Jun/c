<?php
namespace Admin\Controller;
use Think\Controller;
class WeightstationController extends Controller {
    public function index(){
      
        $record = $_POST['record'];
        //$record = I('post.record');
        $acttype = $_POST['acttype']?$_POST['acttype']:cookie('acttype'); cookie('acttype',$acttype,5); 
        $username = $_POST['username']?$_POST['username']:cookie('WeightUserName');
      //  $uid      = cookie('WeightUid');
       // $username = $_POST['username'];
        $uid = $_POST['uid']?$_POST['uid']:cookie('WeightUid');
        $weight = $_POST['weight'];
       // $logistics_company = $_POST['logistics_company']?$_POST['logistics_company']:cookie('logistics_company');     cookie('logistics_company',$logistics_company,5);     
       $logistics_company = $_POST['logistics_company']?$_POST['logistics_company']:cookie('logistics_company');     cookie('logistics_company',$logistics_company,3600); 
       // var_dump($logistics_company);
        $re_invoiceno = $_POST['re_invoiceno'];
        //if(empty($record)){$record = $_GET['record'];};
        if(empty($acttype)){$acttype="1000.00008"; };
        if(!is_numeric($weight)){$weight=0; };
        if(empty($weight)){$weight=0; };
        
        //$a = self::update_logistics("11123/".date('Y:m:d H:i:s'),"5");
        
        //cookie('logistics_list',null);
        //echo "<br>物流公司名称 = ".self::chk_logistics($record,5)." _ ".$record."<hr>";
        echo cookie('logistics_list')."<hr>";
        
        /*$cookie_str = explode("@",cookie('logistics_list'));
        for ($k=0; $k<=4; $k++) {
            $tmp_cookie = $cookie_str[$k];
            echo $tmp_cookie."<br>";
        } */

                //chk_logistics
        var_dump($this->chk_logistics(666666666666,5));
        
        if(is_numeric( $record)){
          
            if(strlen($record)==10 and $record>1000 and $record<1001){
                //判断操作方式的验证逻辑
                //1000.00001 退出系统
                //1000.00011 返回首页
                //1000.00002 质检台
                //1000.00003 订单缺货
                //1000.00005 查看当日统计
                //1000.00006 查看当日记录
                //1000.00007 删除记录
                //1000.00008 增加记录
                //1000.00009 更新记录
            /*
                switch ($record)
                {
                case 1000.00001:$acttype = $record;break;
                case 1000.00011:$acttype = $record;break;   
                case 1000.00002:$acttype = $record;break; 
                case 1000.00003:$acttype = $record;break; 
                case 1000.00005:$acttype = $record;break; 
                case 1000.00006:$acttype = $record;break; 
                case 1000.00007:$acttype = $record;break; 
                case 1000.00008:$acttype = $record;break; 
                case 1000.00009:$acttype = $record;break; 
                default:$acttype = 1000.00008;break; 
                }
                */
                if(1000.00001<=$record && $record<=1000.00011 && strlen((float)$record)==10)
                {
                    $acttype = $record;
                }    
                else
                {
                    $acttype = 1000.00008;
                }    
                
                unset($record); cookie('acttype',$acttype,5); 
            }elseif(strlen($record)>9 and $record>100000 and $record<999999){
                  
                //这里为会员验证逻辑
                $tmp_record = explode(".",$record);
                $tmp_record[1] = (int)$tmp_record[1];
                $model=D("user");
                $data=$model->query("SELECT barcode,username FROM cms_user where id = ".$tmp_record[1]);
                if($tmp_record[0]==$data[0]['barcode']){
                  $username = $data[0]['username'];
                  cookie('WeightUserName',$username);
                  cookie('WeightUid',$record);
                  
                  $uid = $record;
                }
                else{
                  $username = "<font color=red>用户验证失败</font>";
                  unset($uid);
                };
                unset($record);
                //var_dump($data);
            }elseif($record>0 and $record<1000){
                 
                //这里为重量验证逻辑
                $weight = $record;
                $weight = number_format($weight,3);
                unset($record);
                //echo "<div style='height:0px;width:0px;'><embed src='public/msg_wok.wav' hidden='true' autostart='true' loop='false'></div>";
            }else
            {
              $record=$record;
            }
        }
        
      //  var_dump($record);echo '<hr>';
       // if(!preg_match_all('/[0-9a-zA-Z]{5,28}.\*/',$record)){unset($record);};
       //   if(!preg_match_all('/[0-9a-zA-Z]{5,28}*/',$record)){unset($record);};
      //  var_dump($record);

        //进入快递单号验证流程
        if(!empty($record) and $weight==0){
            //5-26位长度认为物流单号数据
            //这里实现快递单号校验功能
            //单号验证规则：1、长度在5-28之间，2、包含数字、英文大小写、“.”、“*”
            $tmp_logistics_company = self::chk_logistics($record,5);   cookie('logistics_company',$tmp_logistics_company,5); 
            echo '<hr>';
            var_dump($tmp_logistics_company);
            echo '<hr>';
            if($tmp_logistics_company=="未知快递"){$tmp_logistics_company=null;};
            if(!empty($tmp_logistics_company)){

                if($logistics_company==$tmp_logistics_company)
                {
                  unset($logistics_company);
                }else
                {
                  $logistics_company = $tmp_logistics_company;                           
                };
            };
           
            unset($tmp_logistics_company);
            unset($record);
        }elseif(!empty($record))
        {
          $tmp_logistics_company = self::chk_logistics($record,5);
          if(empty($tmp_logistics_company))
          {
            if($re_invoiceno==$record)
            {
              //$record=$record;
              cookie('logistics_list',substr($record,0,3).",".strlen($record).",@".cookie('logistics_list'),36000);
              //echo cookie('logistics_list');
              unset($re_invoiceno);
            }elseif(empty($re_invoiceno))
            {
              $re_invoiceno=$record;
              unset($record);
            };
          }; 
        };

        if(empty($logistics_company)){$logistics_company="不校验物流";};
 
     
        if($weight>0 and !empty($uid) and !empty($username) and !empty($record)){
        
          //这里开始保存数据进数据库,数据要进行重复校验，按物流单号提取数据库中的数据，物流单号不唯一（代销的可能会用上同一个单号）
          //
          //
          //is_hide = 10，表示被拦截的订单
          //先从数据库中取出相关物流单号的记录信息
          //如果该信息存在，就判断是否是拦截订单、判断时间是否是已经存在订单、判断时间小于2分钟的则可以更新订单
          //如果该物流信息不存在，则增加记录
          //这里获取该物流单号对应的物流公司名称，一起保存到数据库，如果物流校验的话， 则记录物流校验结果，在称重结果中显示校验结果
          //
          //
          //操作成功,记录已删除（自动跳转时间：1秒）
          //操作成功,记录已更新（自动跳转时间：1秒）
          //操作成功,记录已添加（自动跳转时间：1秒）
          //操作失败,记录已存在（自动跳转时间：5秒）
          //订单拦截,该称重操作失败！！<br><br>该订单信息待确认,请挑选出该订单放置一边等待核实！！更新is_hide = 0（自动跳转时间：不跳转）
          $model=D("weight");
        /*  $where= array(
            "invoice_no = ".$record,
            "shopgroup = 2"
            );*/
          $where['invoice_no'] = $record;
          $data=$model
            ->field("signedtime,is_hide")
            ->where($where)
            ->find();
         //   var_dump($data);
            $is_hide = $data['is_hide'];
            $signedtime = $data['signedtime'];
            
            if($is_hide == 10){
                $this->redirect('/Admin/Weightstation/intercept');
                 exit;
            }

            $logistics_company = self::chk_logistics($record,5);
             
            if($logistics_company==='未知快递'){
                $model  = D('logistics_codes');
                $where['code_ahead']=  substr($record,0,3);
                $where['code_length']= strlen($record);
                $data = $model->field('logistics_company')->where($where)->find();
                if(!empty($data)){
                    $logistics_company = $data["logistics"];
                }else{
                    $data['code_ahead']=$where['code_ahead'];
                    $data['code_length']=$where['code_length'];
                    $data['logistics_company']='待指定快递';
                    $model->add($data);
                }
            }
            
            //添加或者更新的数据
            $_data['user_id'] = _cut('.', '', $uid);
            $_data['invoice_weight']=$weight;
            $_data['username']=$username;     
            $_data['logistics_company']=$logistics_company;
            $_data['invoice_no']=$record;
            //条件
            $model = D('weight');
            $map["invoice_no"]=$record;
            $count=$model->where($map)->count();
  
            $acttype=(float)$acttype;
            //选择了添加
       //    var_dump($logistics_company);echo '<hr>';
       //    var_dump(cookie('logistics_company'));
            
         
         
           //以下是数据库做更改操作。设置一个键  1则可以更改。2则不同意
            if($acttype===1000.00008)
           {
                if($count!=0)
                {  //如果数据库存在已添加的  则更新     test
                    $this->WeightEdit($map,$_data);                     //更新状态         2表示在添加操作时更新  1表示在更新状态下更新
                    $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>2,
                                                                         'time'   =>4,
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                }
                else
                {   
                    $this->WeightAdd($_data);
                    $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>1,
                                                                         'time'   =>1,
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                    
                }    
           }        
            //选择了修改
            if($acttype===1000.00009)
            {
                 if($count>0)
                {
                      $this->WeightEdit($map,$_data);//标准的更新操作
                      $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>1,
                                                                         'time'   =>1,
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                }      
                 else 
                 {
                     //$this->WeightEdit($map,$_data); //不存在这个订单  不能更新
                     $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>2,
                                                                         'time'   =>4,
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                 }    
            }     
            
            //选择了删除
              if($acttype===1000.00007)
           {
                if($count!=0)
                {  //如果数据库存在  则删除     test******
                    $this->WeightDel($map);                    
                    $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>1,
                                                                         'time'   =>1,
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                }
                else
                {   
                  
                    $this->redirect('/Admin/Weightstation/WeightNum',array(
                                                                        'i_word' =>2,           //不正常。没有此数据
                                                                         'time'   =>4,          //4秒看看
                                                                         'acttype' =>$acttype,  
                                                                    )); 
                }    
           } 
            

       /*   echo $is_hide;
          echo $signedtime;

          //if($is_hide==10){echo "<font color=red>该订单为拦截订单</font>"};

          echo "<hr>";
          echo "<br>用户:".$username;
          echo "<br>uid:".$uid;
          echo "<br>重量:".$weight;
          echo "<br>物流公司:".$logistics_company;
          echo "<br>物流单号:".$record;
          echo "<hr>" ;*/

        };





        $this->assign(array(
            "username"            =>  $username,
            "uid"                 =>  $uid,
            "acttype"             =>  $acttype,
            "weight"              =>  $weight,
            "logistics_company"   =>  $logistics_company,
            "re_invoiceno"        =>  $re_invoiceno
          ));
        $this->display();

    }

    //验证物流单号是否符合验证规则
    public function chk_logistics($invoiceno,$shopid){
      //取出本店最近用的20个快递验证规则
      if(empty($invoiceno) or empty($shopid)){return false;};
      self::cookies_logistics($shopid); 
      $logistics_list = cookie('logistics_list');
      $logistics_list = $logistics_list."@";  
      $str_invoiceno = substr($invoiceno,0,3).",".strlen($invoiceno).",";
      if(strpos($logistics_list,$str_invoiceno) !== false){//在cookie里面存在
        //return "快递单号正常：".$invoiceno; 
        $logistics_company = self::cutstr($logistics_list,$str_invoiceno,"@",0);
        if(empty($logistics_company)){return "未知快递";}else{return $logistics_company;};  
      }else
      {
        $tmp_logistics_company = self::chk_logistics_codes($invoiceno);
        if(!empty($tmp_logistics_company)){
          cookie('logistics_list',substr($invoiceno,0,3).",".strlen($invoiceno).",".$tmp_logistics_company."@".cookie('logistics_list'),36000);
          return $tmp_logistics_company;
          }else{ return '未知快递'; };
      }

      //$logistics_list = explode("@",$logistics_list);
      //return $str_invoiceno;
      //return $logistics_list;
    }

    //把取出的20条快递验证规则保存到COOKIE
    public function cookies_logistics($shopid){
      $logistics_list = cookie('logistics_list');
      if(empty($logistics_list)){
        $logistics_list = self::get_logistics($shopid);
        $logistics_list = $logistics_list[0]['logistics_codes'];
        //$logistics_list = serialize($logistics_list);
        cookie('logistics_list',$logistics_list,36000);
      }
      
    }

    //取出相应店铺的最近20条快递验证规则
    public function get_logistics($shopid){
      if(empty($shopid)){return;};
      $model=D("shop");
      $where['id'] = $shopid;
      $data=$model
        ->field("logistics_codes")
        ->where($where)
        ->select();
        return $data;
    }

    //校验物流单号是否在物流单号规则表内
    public function chk_logistics_codes($record){
      if(empty($record)){return;};
      $model=D("logistics_codes");
      $where= array(
        "code_ahead = ".substr($record,0,3),
        "code_length = ".strlen($record)
        );
      //print_r($where);
      $data=$model
        ->field("logistics_company")
        ->where($where)
        ->select();
        return  $data[0]['logistics_company'];
    }

    //当最近20条验证规则不符合要求的时候，则取出该店铺中已发货订单的，单号验证规则
    /*/这个函数暂时未使用
    public function chk_logistics_orders($shopid,$record){
      if(empty($shopid)){return;};
      $model=D("orders");

      $where['shopid'] = $shopid;

      $model = D('orders');
     /*   $sql = "SELECT  logistics_company,invoice_no FROM cms_orders where  SUBSTRING(invoice_no,3) = 883 and strlen(invoice_no)=6 order by id desc";
      $data_ = $model->query($sql);*/
      /*$d_time = strtotime(date('Y-m-d'));
      $pay_time = $d_time - 3600*24*7;
      $where = " where shopid=".$shopid." and left(invoice_no,3) = '".substr($record,0,3)."' and length(invoice_no)=".strlen($record)." and paytime >= ".$pay_time." ";
      $sql = "select logistics_company,invoice_no FROM cms_orders ";
      $sql = $sql . $where;
      $sql = $sql . "order by id desc";
      $data_ = $model->query($sql);

      var_dump($data_);
    }*/

    /*/更新最新的快递验证规格进COOKIE
    public function update_logistics($new_logistics,$shopid){
        $model=D("shop");
        $where['id'] = $shopid;
        $data['logistics_codes'] = $new_logistics;
        $model->where($where)->save($data); 
    }*/

    /*/将称重数据写入到对应的数据库中
    public function update_weight($invoiceno,$shopid){
        $model=D("weight");
        $where['invoiceno'] = $invoiceno;
        //$data['logistics_codes'] = $new_logistics;
        $data = $model->where($where)->add($data,$options=array(),true); 
    }*/


    //cutstr 裁剪2个字符串之间的字符
    //str 传入的原字符串，begin 截取的开始字符串，end 截取的结束字符串，
    //showtype 显示形式，0表示不包括开始和结束字符串，1表示包括开始和结束字符串
    public function cutstr($str,$begin,$end,$showtype){ 
      if($begin=='' && $end != ''){
        $e = mb_strpos($str,$end);
        return mb_substr($str,0,$e); 
      }
               
      $b= mb_strpos($str,$begin) + mb_strlen($begin);
      $str = substr($str, $b);
      $e = mb_strpos($str,$end);
               
      if($end == '' ){
        return $str;
      }
               
      return mb_substr($str,0,$e);

    }

    
    public function WeightAdd($_data){
         $model = D('weight');
         return $model->add($_data);
    }
    
  
    
    


    public function WeightEdit($map=false,$_data=array()){
       $model = D('weight');
       return ($model->where($map)->save($_data)!==false);
  }   
  
  
  public function WeightDel($map=false){
      $model = D('weight');
      return ($model->where($map)->delete());
  }

    public function WeightNum($i_word=1,$time,$acttype){
      switch ($acttype)
      {
        case 1000.00007:
            if($i_word==1){
                $word='删除成功，请等待跳转';                                                                   $state_word='删除成功';
            }else{
                $word='<span style="color:red">数据库中不存在数据。请核实.</span>';                             $state_word='删除失败';
            }
                                                                                           break; 
        case 1000.00008:
            if($i_word==1){
                $word='添加成功，请等待跳转';                                                                     $state_word='物流：'.cookie('logistics_company').'|&nbsp;&nbsp;状态：'.'添加成功';
            }else{
                $word='<span style="color:red">数据库中已存在数据。将进行更新操作</span>';                         $state_word='物流：'.cookie('logistics_company').'|&nbsp;&nbsp;状态：'.'修改成功';
            }
                                                                                           break; 
        case 1000.00009:
            if($i_word==1){
                $word='修改成功，请等待跳转';                                                                     $state_word='物流：'.cookie('logistics_company').'|&nbsp;&nbsp;状态：'.'修改成功';
            }else{
                $word='<span style="color:red">不存在此数据。请先添加</span>';                                    $state_word='修改失败';$time = 3;
            }
                                                                                            break; 
        default:
                $word='操作错误';$state_word='请返回';$time = 3;
                                                                                            break; 
      }

       $this->assign(array(
            'word'       =>$word,
            'state_word'    =>$state_word,
            'time'      =>$time,
        ));
        $this->display();
  }

  


  //拦截页面
    public function intercept(){
        $this->display();
    }
    
    public function Modify_switch($record){
        $tmp_logistics_company = self::chk_logistics($record,5);
        echo $tmp_logistics_company;
       
    }
    
 
    
}

