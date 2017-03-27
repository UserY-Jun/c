<?php
namespace Admin\Model;
use Think\Model;


class OrdersModel extends Model{
     /******************************数据************************************/
           public function search($pagelist=50,$recOns=0)
    {     
  
               
           $I_arr  = I('get.');    
           $button =$I_arr["button"] ;
           $keyword    =$I_arr["keyword"] ;
           $p = $I_arr['p'];
         
        //默认模式
        // 1 默认 显示的数据规则      
            $OrderStateID = I('get.OrderStateID'); 
            if($OrderStateID ==''){$OrderStateID = 5;}
            $tid_s='tid_s';
            $where['invoice_status']=0;
            $where['invoice_no']=0;
            $where['_logic'] = "OR"; 
            $map["_complex"] = $where;
            
            
          /* $map['invoice_status']=0;
             $map['invoice_no']=0;
          */
             
             
             if($OrderStateID!=0){
             $map['order_status'] = $OrderStateID;
             }else{
                 unset($OrderStateID);
             }
             $order='pay_time asc';//     $default=1;
             $order = 'id desc';
             
             
             
   
          
    
        /********  分页数据 *************distinct(tid_s)*/
        if(!empty($button) && empty($keyword) && empty($OrderStateID)){
            unset($map);
        }
          
        $count = $this->where($map)->count();        //获取总页数 //并消除重复
              
        
    
        $page=new \Think\Page($count,$pagelist,'',$nPage); //实例化分页类并传参
        $r = $page->firstRow;
        $page_=  ceil($count/$pagelist) ;
         
        if(!empty($button) && empty($keyword) && empty($OrderStateID)) 
        {   
            if(empty($p))
            {
                $p = 1;
            }else if($p>$page_)
            {
                $p = $page_;
            }
        
            $order = 'id desc';
            $lastid = $count-($p-1)*$pagelist;
            
            
            $rowid = $lastid+ 100;
            echo $rowid;
            unset($map);
            $map['id'] = array('between',"$lastid,$rowid");  
            $r = 0;
        }
       
         
        $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        //跟该配置文件样式
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');  
        $page->setConfig('first','首页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    
         $show=$page->show();
         G('begin');
        /**********  取出数据 ****************/
              $data=$this
                         ->field('instructions_num,invoice_no_num,invoice_status_num,pay_time,id,tid,tid_s,buyer_nick,buyer_alipay_no,created,buyer_message,seller_memo,total_pricce,receiver_address,receiver_name,receiver_mobile,receiver_phone,invoice_status,invoice_status_time,invoice_no,invoice_no_time,instructions,instructions_time,warehouse_delivery,warehouse_delivery_time,wrong_replacement,logistics_numbers,order_status,whether_merge')   
                         ->where($map)
                         ->group($tid_s)
                         ->order($order) 
                         ->limit($r,$page->listRows)
                         ->select();
        echo '<hr>';
        echo $this->getLastSql();
        echo '<hr>';
      
           echo  G('begin','end').'s'; 
              echo '<hr>';
     // echo $this->getLastSql();echo '<hr>';
     //        echo  G('begin','end').'s';     
        //将价格相加后显示   --留言也变化一下--
  /*      foreach($data as $v=>$k){
            $tids=$this->field('total_pricce,buyer_message')->where(array('tid_s'=>array('EQ',$k['tid_s'])))->select();
            $tids_p=0;
            $buyer_message='';
            foreach($tids as $o=>$p){
                $tids_p=$tids_p+$p['total_pricce'];
                $buyer_message=$buyer_message.$p['buyer_message'];
            }
            $data[$v]['total_pricce']=$tids_p; 
            $data[$v]['buyer_message']=$buyer_message;
        } 
        
        $array=array();
        foreach($data as $v=>$k){
            $array[$k['tid_s']][]=$k['tid'];  
        }
        
        foreach($array as $v=>$k){
            array_shift($array[$v]);
        } 
        
        foreach($array as $v=>$k){
            if(empty($k)){
                unset($array[$v]);
            }
        }
        
        foreach($array as $v=>$k){
            foreach($k as $o=>$p){
                foreach($data as $u=>$i){
                    if($i['tid']==$p){
                         unset($data[$u]);
                    } 
                }  
            }      
        }
        
     /*   ********************
      * *
      * *
      * *
      * *
      * 
      * 需优化*/
    /*    unset($map);
        foreach($data as $v=>$k){
            $stime=$k['created']-259200;
            $stime=date('Y-m-d',$stime);
            $stime=strtotime($stime);
            
            $etime=$k['created']+345600;
            $etime=date('Y-m-d',$etime);
            $etime=strtotime($etime);
            
            
         // 1480466340   1480466700
            if($k['order_status']>=5 && $k['order_status']<=9){
                $map['created']  = array('between',array($stime,$etime));
                $map['buyer_alipay_no']=$k['buyer_alipay_no'];
                $map['order_status']=array('BETWEEN','5,9');
                $map['tid_s']=array('NEQ',$k['tid_s']);
                $many=  $this->field('tid')->where($map)->select();
            }
            $m=1;
                if(count($many)>0){
                    $m=2;
                }
             $data[$v]['many']=$m;        
        } 
    /**/
        $data=back_modify_order_status($data);  
         return array(
             'order_list' => $data,
             'showPage' =>$show,
             'default'=>$default
                     );
    } 
    
    
    
    public function OrdersAdd($data){
      //  echo memory_get_usage();echo '<hr>';
         $dataadd=array();
         $orderinfo_=array();
         
         
        if(count($data[0])>30){
            
            $time=  time()-1296000-1296000; //最近15+15天的数据  如果有就更新  没有就添加的--数据
            $orderinfo=$this
                    ->field('tid')
                    ->where(array('created'=>array('gt',$time),
                        //    array('invoice_status'=>array('EQ',0)),
                        //    array('invoice_no'=>array('EQ',0)),
                        ))
                    ->select();
           
            foreach($orderinfo as $v=>$k){
                   $orderinfo_[$k['tid']]=$k['tid']; 
            }
  
        }else{
                $model=D('orderinfo');
                $where['order_state']=array('not in',array('0','3','4','8','9'));
                $orderinfo=$model
                        ->field('')
                        ->where($where)
                        ->select();
                
           foreach($orderinfo as $v=>$k){
               $orderinfo_[$k['sku_pro_name'].$k['tid']]=1;
             }
            
        }
        foreach($data as $v=>$k){
            if(count($data[0])>30){
            $dataadd['tid']=$k['tid'];                         //订单id
            $dataadd['tid_s']=$k['tid_s'];                      //tids
            $dataadd['buyer_nick']=$k['buyer_nick'];                //旺旺
            $dataadd['buyer_alipay_no']=$k['buyer_alipay_no'];          //旺旺号 支付宝
            $dataadd['created']=strtotime($k['created']);                     //创建订单时间
            $dataadd['pay_time']=strtotime($k['pay_time']) ;                //支付时间
            $dataadd['order_status']=$k['order_status'];                //订单状态
            $dataadd['buyer_message']=$k['buyer_message'];               // 买家留言
            $dataadd['post_fee']=$k['post_fee'];                     //邮费
            $dataadd['price']=$k['price'];                        //实际支付金额                             
            $dataadd['total_pricce']=$k['total_pricce'];                 //总金额
            $dataadd['receiver_address']=$k['receiver_address'];            //收件地址           
            $dataadd['receiver_name']=$k['receiver_name'];               //买家(收件)姓名 
            $dataadd['receiver_mobile']=$k['receiver_mobile'];            //号码
            $dataadd['receiver_phone']=$k['receiver_phone'];              //电话
            $dataadd['logistics_company']=$k['logistics_company'];           //物流公司  运送方式
            $dataadd['whether_merge']=$k['whether_merge'];               //是否显示合并
            $dataadd['seller_nick']=$k['seller_nick'];
            //在添加的时候做个判断  如果数据库里面有这个数据 又满足条件 则更新 tids 和运费-订单状态 金额
                if(!isset($orderinfo_[$k['tid']])){
                    $return=$this->add($dataadd);
                }else{
                    $return=$this->where(array('tid'=>array('EQ',$k['tid'])))->save(array(
                        'tid_s'=>$k['tid_s'],                     //tids
                        'pay_time'=>strtotime($k['pay_time']),      //支付时间
                        'order_status'=>$k['order_status'],
                        'buyer_nick'=>$k['buyer_nick'], 
                        'buyer_message'=>$k['buyer_message'],            //留言
                        'receiver_name'=>$k['receiver_name'],               //收件人姓名
                        'post_fee'=>$k['post_fee'],              //  邮费
                        'price'=>$k['price'],          //实际支付金额
                        'total_pricce'=>$k['total_pricce'],//总金额
                        'receiver_address'=>$k['receiver_address'],//收件地址
                        'receiver_mobile'=>$k['receiver_mobile'],//号码
                        'receiver_phone'=>$k['receiver_phone'],//电话
                        'whether_merge'=>$k['whether_merge'], //是否显示合并 
                    ));
                }
             }else{
                 $dataadd['tid']=$k['tid'];  
                 $dataadd['title']=$k['title'];  
                 $dataadd['price']=$k['price'];  
                 $dataadd['num']=$k['num'];  
                 $dataadd['outer_iid']=$k['outer_iid'];  
                 $dataadd['sku_pro_name']=$k['sku_pro_name'];  
                 $dataadd['order_state']=$k['order_state'];
               //$dataadd['ouder_tid']=$k[4].$k[0];
                 $dataadd['sku_tid_m']=$k['sku_pro_name'].$k['tid'];
                    if(!isset($orderinfo_[$k['sku_pro_name'].$k['tid']])){
                  
                        $return=$model->add($dataadd);
                     }else{
                        $return=$model->where(array('sku_tid_m'=>array('EQ',$k['sku_pro_name'].$k['tid'])))->save(array(
                           'title'=>$k['title'],  
                           'price'=>$k['price'], 
                           'num'=>$k['num'],  
                           'outer_iid'=>$k['outer_iid'],  
                           'sku_pro_name'=>$k['sku_pro_name'], 
                           'order_state'=>$k['order_state'],
                        ));
                    }
        }

    }
           if($return!==false){
            $return=true;
        }
        return $return;
    }  
    
    
    
    
    public function AjaxShoworderInfo($tids){
        $tidArrTwoDimensional=$this->where(array('tid_s'=>array('EQ',$tids)))->select();
        if($tidArrTwoDimensional===null){return false;}
        
        $order_buyer_message_arr='';
        foreach($tidArrTwoDimensional as $v=>$k){ 
            $order_buyer_message_arr.=$k['buyer_message'];
        }  
          //将留言合并
        foreach($tidArrTwoDimensional as $v=>$k){
            $tidArrTwoDimensional[$v]['buyer_message']=$order_buyer_message_arr;
        }
        
        
        $tid_in=Two_dimensional_into_one_dimensional_array($tidArrTwoDimensional,'tid');

        $map['tid']=array('in',$tid_in);

        $model=D('orderinfo');
        $data=  $model
                ->alias('a')
                ->where($map)
                ->select();

        foreach($data as $v=>$k){
            foreach($tidArrTwoDimensional as $o=>$p){
                if($k['tid']==$p['tid']){
                    foreach($p as $j=>$h){
                        $data[$v][$j] = $h;
                    }  
                }
            }  
        }
        
        
        return $data;
        
    }
    
    
    
    public function OrderBlankPrintList($tid_s){
        //先找出tid_s、的tid  再由 orderinfo 表的tid 
        $orderdata=$this
                ->alias('a')
                ->field('tid,receiver_name,receiver_address,buyer_message,seller_memo,seller_nick,invoice_no_time')
                ->where(array('tid_s'=>array('EQ',$tid_s)))
                ->select();
        
        $tid=Two_dimensional_into_one_dimensional_array($orderdata,'tid');
        
        $order_buyer_message_arr='';
        foreach($orderdata as $v=>$k){ 
            $order_buyer_message_arr.=$k['buyer_message'];
        }
          //将留言合并
        foreach($orderdata as $v=>$k){
            $orderdata[$v]['buyer_message']=$order_buyer_message_arr;
        }
        $model=D('orderinfo');
        $datainfo=$model
                ->field('id,tid,num,outer_iid,sku_pro_name')
                 ->where(array('tid'=>array('in',$tid)))
                ->select();

     return array('orderdata'=>$orderdata,'datainfo'=>$datainfo);
        
    }
    
    
    
    
    
    
    
    
    
    public function InvoicesPrintList($tid_s){
        //先找出tid_s、的tid  再由 orderinfo 表的tid 
        $orderdata=$this
                ->alias('a')
                ->field('tid,seller_nick,buyer_nick,invoice_status_time,receiver_name,receiver_mobile,receiver_phone,receiver_address,buyer_message,seller_memo')
                ->where(array('tid_s'=>array('EQ',$tid_s)))
                ->select();
       
        $tid=Two_dimensional_into_one_dimensional_array($orderdata,'tid');
        
        $order_buyer_message_arr='';
        foreach($orderdata as $v=>$k){ 
            $order_buyer_message_arr.=$k['buyer_message'];
        }
          //将留言合并
        foreach($orderdata as $v=>$k){
            $orderdata[$v]['buyer_message']=$order_buyer_message_arr;
        }
       
        $model=D('orderinfo');
        $datainfo=$model
                ->field('id,tid,num,outer_iid,sku_pro_name')
                 ->where(array('tid'=>array('in',$tid)))
                ->select();

     return array('orderdata'=>$orderdata,'datainfo'=>$datainfo);
    }
    
    
    
    public function StatisticsListPrint($tid_s){
        $orderdata=$this
                ->alias('a')
                ->field('tid,seller_nick,buyer_nick,invoice_status_time,receiver_name,receiver_mobile,receiver_phone,receiver_address,buyer_message,seller_memo')
                ->where(array('tid_s'=>array('EQ',$tid_s)))
                ->select();
        
    }
    
}