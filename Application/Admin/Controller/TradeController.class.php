<?php
namespace Admin\Controller;
use Think\Controller;

class TradeController extends BaseController{
    
    public function TradeList(){
        
        $model=D('orders');
        $data=$model->search();
     //     $data=modify_order_e($data);
     //     var_dump($data['order_list']);echo '<hr>';
     //     var_dump($data['tids']);
        
        $this->assign(array(
            'order_list' =>$data['order_list'],
            'showPage'  =>$data['showPage'],
            'default'   =>$data['default'],
        )); 
  
        $this->display();
    }
    
    
    //ajax更改打印状态
    public function AjaxOrdersStatus($tid,$stype,$strval=1){
             $model=D('orders');
             $time=date('Y-m-d H:i:s');
        if($stype==2){
            $data['invoice_status']=$strval;
            if($strval!=0){
                $data['invoice_status_time']=$time;
                $model->where("tid_s = $tid")->setInc("invoice_status_num");
            }
            $model->where(array('tid_s'=>array('EQ',$tid)))->save($data);
           
        }else if($stype==3){
            $data['invoice_no']=$strval;
            if($strval!=0){
                $data['invoice_no_time']=$time;
                $model->where("tid_s = $tid")->setInc("invoice_no_num");
            }
            $model->where(array('tid_s'=>array('EQ',$tid)))->save($data);
            
        }else if($stype==4){
            $data['instructions']=$strval;
            if($strval!=0){
                $data['instructions_time']=$time;
                $model->where("tid_s = $tid")->setInc("instructions_num");
            }
            $model->where(array('tid_s'=>array('EQ',$tid)))->save($data);
            
        }else{
            echo '失败了~~~';
        }
        
        
    }
    
    public function ShoworderInfo($tids){
      //  sleep(1);
        $model=D('orders');
        $data=$model->AjaxShoworderInfo($tids);$count = count($data);
        if(!$data){echo '无数据';exit;}
     //   var_dump($data);exit;
     //   $data[0]= array_shift($data);
        
        $str =
"<tbody>
    <tr style='color:#666666; font-size:12px;'>
        <td style='border-bottom:none;border-right:#E7E7E7 1PX dotted;border-bottom:#E7E7E7 1PX dotted;' title='108262' width='41' valign='middle' align='center'>1</td>
        <td style='border-right:#E7E7E7 1PX dotted;border-bottom:#E7E7E7 1PX dotted;' width='583' valign='top' align='left'>
            <div style='PADDING:10px;'>&nbsp;&nbsp;
                       <a href='http://item.taobao.com/item.htm?id=' target='_blank'>
                       <img src='/weight//images/products/D8022/D8022_0.jpg' style='vertical-align:middle;' width='50'></a>&nbsp;&nbsp;".
                    $data[0]['outer_iid'] .'&nbsp&nbsp&nbsp'.
                    _cut('颜色分类：',';',$data[0]['sku_pro_name']).
           "   </div>
        </td>
        <td style='border-bottom:#E7E7E7 1PX dotted;' width='140' align='right'><div style='PADDING:10px;'>"
          . $data[0]['price'] ."×" . $data[0]['num'] ."&nbsp;件</div>
        </td>";
    $str .= 
"<td rowspan=$count style='border-left:#E7E7E7 1PX dotted; border-bottom:none; ' width='490' valign='top' align='left'><div style='PADDING:10px;'>";
      
    foreach ($data as $v=>$k){
      $str .=       " <a href='http://trade.taobao.com/trade/detail/trade_item_detail.htm?bizOrderId=2804990884729483' target='_blank'>订单编号</a>：
        <a href='../express/index.asp?action=list&amp;keywords=2804990884729483' target='_blank'>".$k['tid']."</a><br>
        下单时间：".date('Y-m-d H:i:s',$k['created'])."<br>
        付款时间：".date('Y-m-d H:i:s',$k['pay_time'])."<br>
        支付宝账号：".$k['buyer_alipay_no']."<br>
      ";
    }
   $str .=  "买家留言：".$data[0]['buyer_message']."<br>
        卖家备注：".$data[0]['seller_memo']."</div></td>
</tr>";
array_shift($data);

foreach($data as $v=>$k){
 $str .=   "<tr style='color:#666666; font-size:12px;'>
            <td style='border-bottom:none;border-right:#E7E7E7 1PX dotted;border-bottom:none;' title='108268' width='41' valign='middle' align='center'>2</td>
            <td style='border-right:#E7E7E7 1PX dotted;border-bottom:none;' width='583' valign='top' align='left'><div style='PADDING:10px;'>&nbsp;&nbsp;
        <a href='http://item.taobao.com/item.htm?id=' target='_blank'><img src='/weight//images/products/D8022/D8022_0.jpg' style='vertical-align:middle;' width='50'></a>&nbsp;&nbsp;
     " . $k['outer_iid'] ."
       " . _cut('颜色分类：',';',$k['sku_pro_name']) ."</div></td>
        <td style='border-bottom:none;' width='140' align='right'><div style='PADDING:10px;'>
        ". $k['price'] ."×" . $k['num'] ."&nbsp;件</div></td>
    </tr>";
    }
$str .=
"</tbody>";
echo $str;
    }

    //更新订单
    public function UpdateTradesList(){  
       $model=D('orders');
        if(IS_POST){
            
            $F=$_FILES['uFileName']['tmp_name'];
       //     var_dump($F);
      //     var_dump($F);exit;
     //判断是否提交了csv文件
            if(empty($F)){
                $this->error('请选择文件');
            };
      
        $handle = fopen($F, 'r');  
                //    echo '<pre>';
                //  var_dump($handle);exit;
        $result = input_csv($handle); //解析csv   获得数据 
       //          echo '<pre>';
      //     var_dump($result);exit;
     //  array_shift($result);  //清除数组第一个无用标题
     
        $len_result = count($result);   
        if($len_result==0)   
        {   
            $this->error('无数据');   
        }
        $orders=$result;
        //去除数组里面的特殊字符
        
        foreach($orders as $v=>$k){
            foreach($k as $u=>$i){
                $orders[$v][$u]=  trim($i,'\"=\'');   
            }  
        }
         
        //判断是哪张表
        if(count($orders[0])>30){ 
        //先判断可否合并
        $OrderNew=array();
        //比对数组、获取满足条件的tid
               
       $orders= fixed_array_position_one($orders);
       $orders=modify_order_status($orders);  // order_status  订单状态转化为数值型
       //获取未发货的订单  将于获取到的数组合并，判断是否有这个tid  如果有就不需要合并 拿提交过来的值
       $orderData=$model
                     ->field('tid,buyer_nick,buyer_alipay_no,post_fee,total_pricce,price,order_status,buyer_message,receiver_name,receiver_address,logistics_company,receiver_mobile,created,pay_time,tid_s,whether_merge')
                     ->where(array('order_status'=>array('NOT BETWEEN','4,9')))
                     ->select();
       $tidArr=array();

            foreach($orders as $v=>$k){
                 foreach($orderData as $o=>$p){
                     if($k['tid']==$p['tid']){
                         unset($orderData[$v]);  //如果有相同tid  删掉。后面会自动更新的。
                     }   
                 } 
            }

            foreach($orderData as $v=>$k){
                $orders[]=$k; // 剩下的添加到数组中  形成新数组
            }
       
  
       
       //获取可以合并的数据
        foreach($orders as $v=>$k){
         // if($k['order_status']==1){
              $OrderNew[$k['buyer_nick'].$k['buyer_alipay_no'].$k['receiver_address'].$k['receiver_name'].$k['order_status']][]=$k['tid'];   
         //  }
            }  
        
        //循环满足条件的数组      
        foreach($OrderNew as $v=>$k){
            $aaa=1;
            foreach($k as $o=>$p){  
                if($aaa==1){
                    $one=$p;$aaa++;    
                } 
                //再循环数组 获取tids 放到数组末尾tids tids tids tids tids tids  表示是是合并的订单
                foreach($orders as $u=>$i){
                    if($i['tid']==$p){
                        $orders[$u]['tid_s']= $one;  
                    
                    }       
                }     
            }    
        } 
        
           fclose($handle); //关闭指针   
           $forarray=array();
           foreach($orders as $v=>$k){
               $forarray[$k['tid_s']][]=$k[0];
           }
           $array=array();
           foreach($forarray as $v=>$k){
               array_shift($forarray[$v]);
           }
           
           foreach($forarray as $v=>$k){
               if(empty($k)){
                   unset($forarray[$v]);
                }
          }  
          //显示多单合并的1
           foreach($orders as $v=>$k){
               $orders[$v]['whether_merge']=0;
               foreach($forarray as $o=>$p){       
                   if($k['tid_s']==$o){ 
                       $orders[$v]['whether_merge']=1;
                    }
                }    
            }
        }else
        {     
           $orders=fixed_array_position_two($orders);
           $orders=modify_order_status_info($orders);
                  $modelInfo=D('orderinfo');
                  $orderData=$modelInfo
                     ->field('tid,title,price,num,outer_iid,sku_pro_name,order_state')
                     ->where(array('order_status'=>array('NOT IN',array('0','3','4','8','9'))))
                     ->select();
                    $tidArr=array();

                         foreach($orders as $v=>$k){
                              foreach($orderData as $o=>$p){
                                  if($k['sku_pro_name'].$k['tid']==$p['sku_pro_name'].$p['tid']){
                                      unset($orderData[$v]);  //如果有相同tid  删掉。后面会自动更新的。
                                  }   
                              } 
                         }
                         foreach($orderData as $v=>$k){
                             $orders[]=$k; // 剩下的添加到数组中  形成新数组
                         }
        }  

           $model=D('orders');
       $tianshu = 300;    
       for($i=1;$i<=$tianshu*1000;$i++){
         //   $dataadd['id']=$i;
            $dataadd['tid']=$i;                         //订单id
            $dataadd['tid_s']=$i;                      //tids
            $dataadd['buyer_nick']=$i.'旺旺';                //旺旺
            $dataadd['buyer_alipay_no']='会撒娇粉底后'.$i;          //旺旺号 支付宝
            $dataadd['created']=(strtotime(date('Y-m-d H:i:s'))+$i*86.4)-86400*$tianshu;                     //创建订单时间
            $dataadd['pay_time']=(strtotime(date('Y-m-d H:i:s'))+$i*86.4)-86400*$tianshu;                //支付时间
            $dataadd['order_status']=rand_(0,9,array());                //订单状态
            $dataadd['buyer_message']='请按时发货';               // 买家留言
            $dataadd['post_fee']=18;                     //邮费
            $dataadd['price']=180;                        //实际支付金额                             
            $dataadd['total_pricce']=180;                 //总金额
            $dataadd['receiver_address']='浙江省 舟山市 普陀区 东港街道东港碧海莲缘银梅苑6幢302(316100)';            //收件地址       
            $dataadd['receiver_name']='SADNKJ';               //买家(收件)姓名
            $dataadd['receiver_mobile']='18088888888';            //号码
            $dataadd['receiver_phone']='13033333333';              //电话
            $dataadd['logistics_company']='圆通快递';           //物流公司  运送方式
            $dataadd['whether_merge']=0;    
            $model->add($dataadd);
        }
        $this->success('添加成功');
        exit;
 
       array_shift($orders); //去除数组中第一个数据  --is标题
     //  echo '<pre>';
     //  var_dump($orders);exit;
       
       
           
            if($model->OrdersAdd($orders)){
                $this->success('更新成功',U('TradeList'));exit;
            }else{
                $error=$model->getError();
                $this->error($error);
            };
        }
        
 /*     
       $array['collection']=array(0=>'历史',1=>'玉石',2=>'宝石','register'=>'总登记','sub_code'=>'分登记');
        echo '<pre>';
        print_r($array);echo '<hr>'; 
        
       if(!empty($array)){
        $lishi=$array['collection'][0];        unset($array['collection'][0]);
        $yushi=$array['collection'][1];        unset($array['collection'][1]);     
        $baoshi=$array['collection'][2];       unset($array['collection'][2]);
        $zong=$lishi.'=>'.$yushi.'=>'.$baoshi;
       
        array_unshift($array,$zong);
        print_r($array);
        
       } 
       

       
       
       
       // $array=$lishi1;
        print_r($array);
        
        exit;
 
         */ 
        
        $this->display();
       
    }
    
    
    public function OrderBlankPrintInfoList($tid_s){
        
        $model=D('orders');
        
        $data=$model->OrderBlankPrintList($tid_s);
        
      //  var_dump($data['datainfo']);
        
        $this->assign(array(
            'orderdata'  => $data['orderdata'],
            'datainfo'  =>$data['datainfo'],
        ));
        $this->display();
 
    }
    
    public function InvoicesPrintList($tid_s){
         $model=D('orders');
        
         
        $data=$model->InvoicesPrintList($tid_s);
   
        $buyer_message=$data['orderdata'][0]['buyer_message'];
        $seller_memo=$data['orderdata'][0]['seller_memo'];
        //获取包装参考
        $Package_Reference=Package_Reference($seller_memo,$buyer_message,$data['datainfo']);
        
   
        $this->assign(array(
            'orderdata'  => $data['orderdata'],
            'datainfo'  =>$data['datainfo'],
            'Package_Reference' =>$Package_Reference,
        ));
        $this->display();
    }
    
    public function StatisticsListPrint($tid_s){
        $model=D('orders');
        $data=$model->StatisticsListPrint($tid_s);
        
        
        
    }

    public function SetUp(){
        
        $model=D('setup');
        $user_id=  cookie('admin')['id'];
        $is_user=$model->where(array('user_id'=>array('EQ',$user_id)))->find();
        var_dump($is_user);
        if(IS_POST){
           $data= $model->create();
           $trade_waitprint0=I('post.trade_waitprint0')?I('post.trade_waitprint0'):0;   //显示发货单
           $trade_waitprint1=I('post.trade_waitprint1')?I('post.trade_waitprint1'):0;        //说明书
           $trade_waitprint2=I('post.trade_waitprint2')?I('post.trade_waitprint2'):0;        //配货单
           $data['trade_waitprint']='1'.$trade_waitprint0.$trade_waitprint1.$trade_waitprint2;
           $data['is_multiple']=I('post.is_multiple')?I('post.is_multiple'):0;
                if($is_user){        
                    if($model->where(array('user_id',$user_id))->save($data)!==false)
                    $this->success('修改成功', U('setup'));exit;     
                }else{
                     $data['user_id']=$user_id;
                     if($model->add($data))
                     $this->success('修改成功', U('setup'));exit;     
                }
               $error=$model->getError();
               $this->error($error);  
        }
        $this->assign(array(
             'userinfo'=>$is_user, 
        ));
        
        
        $this->display();
    }
    //合并订单
    public function editmerger($stype,$tids){
        
        
        if($stype==1){
        $tid_s_arr = explode(',', $tids);
        $tid_s_ = '';
        $arr_tids='';
        foreach($tid_s_arr as $v=>$k){
                if(empty($k)){
                    unset($tid_s_arr[$v]);
                }else{
                    $tid_s_ = $k;
                    $arr_tids .= $k.',';
                }   
        }
    
        $data['tid_s']  = $tid_s_;
        $data['whether_merge']  = 1;
       
        
        
        
        $model = D('orders');
        $tst = $model->where(array('tid_s'=>array('in',"$arr_tids")))->save($data);
        
        if($tst!==false){
            echo '合并成功';
        }else{
            echo '合并失败';
        }
    }elseif($stype==0){
          $model = D('orders');
          $tids = str_replace(',','',$tids);
          $tst = $model->field('tid')->where(array('tid_s'=>array('EQ',"$tids")))->select();
          $tst = Two_dimensional_into_one_dimensional_array($tst,'tid');
          
          foreach($tst as $v=>$k){
              $data['tid_s']=$k;
              $data['whether_merge']  = 0;
              $tst = $model->where(array('tid'=>array('EQ',"$k")))->save($data);
          }
            if($tst!==false){
            echo '取消合并成功';
        }else{
            echo '取消合并失败';
        }
    }
        
 }
    
    public function AjaxeditOrder(){
        $tid_s = I('post.tid_s');
        $model =D('orders');
        // $seller_memo = I('seller_memo');                         //seller_memo订单备注 
        // $wrong_replacement = I('wrong_replacement');                         //wrong_replacement是否错发补发 
        $model->seller_memo = I('seller_memo');
        $model->wrong_replacement = I('wrong_replacement');
        
        if($model->where(array('tid_s'=>array('EQ',$tid_s)))->save()!==false){
              echo " <meta http-equiv='Content-Type' content='text/html; charset=utf-8'> "
               . "<script>alert('提交成功');javascript:history.go(-1);</script>";   
        }else{
              echo " <meta http-equiv='Content-Type' content='text/html; charset=utf-8'> "
               . "<script>alert('提交失败');javascript:history.go(-1);</script>";   
        }
        
        
        
        
        
       
        
       
       
        
         
         
    }
    
    
}
