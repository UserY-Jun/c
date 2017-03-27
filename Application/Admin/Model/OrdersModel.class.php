<?php
namespace Admin\Model;
use Think\Model;


class OrdersModel extends OrdersBaseModel{
     /******************************数据************************************/
           public function search($pagelist=50,$recOns=0)
    {     
               
     //      $map['seller_nick'] = session("user_shop")['seller_nick'];    
               
           $I_arr  = I('get.');    
           $button =$I_arr["button"] ;
           $keyword    =$I_arr["keyword"] ;
         
           if(empty($I_arr['p'])){
               $I_arr['p'] = 1;
           }
          $p = $I_arr['p'];
          
           $RecentDays = $I_arr['RecentDays'];
           if($RecentDays==-1){unset($RecentDays);}
           if(!empty($RecentDays)){
           $RecentDays = strtotime(date('Ymd'))-(int)$RecentDays*3600*24; 
           $map["created"] = array('GT',$RecentDays);
           }

           
        //默认模式
        // 1 默认 显示的数据规则      
            $OrderStateID = $I_arr['OrderStateID']; 
            if($OrderStateID ==''){$OrderStateID = 5;}
            $where['invoice_status']=0;
            $where['invoice_no']=0;
            $where['_logic'] = "OR"; 
            $map["_complex"] = $where;
            
            /* $map["invoice_status"] = 0;
             $map["invoice_no"] = 0;
            */

            $tid_s='tid_s';
            $order = 'created desc';
            
            //两分钟内打印的数据
            $ptim[]= 'PrintTime';
            $ptim[]= 'p';
            if(is_unique_arr($I_arr,$ptim) == 1){
                unset($map["_complex"]);
                  $where['invoice_status']=1;
                  $where['invoice_no']=1;
                  $where['_logic'] = "OR"; 
                  $map["_complex"] = $where;
                  $time = date('Y-m-d H:i:s',time()-60*2);
                  $map['invoice_status_time']=array('GT',$time);var_dump($map);
            }
            
            
            //如果选中了(获取全部数据)下拉框
            if($OrderStateID!=0){
                $map['order_status'] = $OrderStateID;
            }else{
                unset($OrderStateID);
            }

        //接收到显示今日发货清单的请求 
        $tet[]='invoice_status_time';
        $tet[]='p';
      
        if(is_unique_arr($I_arr,$tet) == 1){
         //   unset( $map["invoice_no"]);
         //   unset($map["invoice_status"]);
              unset($map["_complex"]);
            $map['invoice_status'] = 1;
            $is_implement = 1;  //如 为1 则阻止下面程序执行
        } 

       /**************************-------------------------------------------------------------------------------------------- 
             /**********  查询****2模糊查询  *******************/
            $button=$I_arr['button'];
            $keyword=$I_arr['keywords'];
            $m_tet[] = 'button';
            $m_tet[] = 'keywords';
            $m_tet[] = 'p';
            $keyword=trim($keyword);
            if($button && $keyword){  //判断是否有提交值
           //     unset($map["_complex"]);    //删除默认
                unset($tid_s);
                $is_implement = 1;
            if($OrderStateID!=0){
                $map['order_status'] = $OrderStateID;
            }   
            if(is_unique_arr($I_arr,$m_tet) == 1){
            //    unset($map["invoice_status"]);
            //    unset($map["invoice_no"]);
                  unset($map["_complex"]);
                unset($map['order_status']);
            }
            $map['_string']="(tid like '$keyword%') "
                . "OR(receiver_name like '$keyword%') "
                . "OR(receiver_mobile like '$keyword%') "
                . "OR(logistics_numbers like '$keyword%') "
                . "OR(buyer_nick like '$keyword%')"; // 将获取的值带入模糊查询where条件    
            }
        /**************end 2 *********************/
       
         if(empty($is_implement) && empty($keyword) && empty($OrderStateID) && empty($OrderStateID)){
             $whole_count=S("num_whole_count");
             if(empty($whole_count)){   
              //  unset($map["invoice_status"]);
              //  unset($map["invoice_no"]);
                   unset($map["_complex"]);
                 $count = $this->where($map)->count('distinct(tid_s)');
                 S("num_whole_count",$count,3600);
             }else{
                  $count =$whole_count;
             }  
         }else{
              $count = $this->where($map)->count('tid_s');
         }   
        
 //  $count = $this->where($map)->count('distinct(tid_s)'); 
     
     /********  分页数据 *************distinct(tid_s)*/
     //   $count = $this->where($map)->count('distinct(tid_s)');        //获取总页数 //并消除重复
        $page=new \Think\Page($count,$pagelist,'',$nPage); //实例化分页类并传参
        $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        //跟该配置文件样式
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');  
        $page->setConfig('first','首页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
        $show=$page->show();
             //如果选中了获取全部数据
            //接收到显示所有订单的请求
     
        if(empty($is_implement) && empty($keyword) && empty($RecentDays) && !empty($button)){
              //  unset($map["invoice_status"]);
             //   unset($map["invoice_no"]);  
                 unset($map["_complex"]);
            $whole_where_count = F('num_whole_where_count');  
        }
        
    /***************无需修改************************/
     
    if(empty($RecentDays)){
        $F_data_num = F('F_data_num');
            $num = 0;
            foreach($F_data_num as $v=>$k){
                    $F_data_num_pop= $k;                    break;       
            }  
       $map['created'] = array('GT',$F_data_num_pop['created']);
       
            if(empty($whole_where_count)){
               
                $whole_where_count = $this->where($map)->distinct('tid_s')->count();

                    if(empty($keyword) && $OrderStateID==0){
                        F('num_whole_where_count',$whole_where_count);
                    }     
                }       
        $is_whole_count = floor($whole_where_count/$pagelist);
            if($p>=$is_whole_count){
                 unset($map['created']);
            }  
    }    
   
         /***************无需修改end************************/
              G('begin'); 
        /**********  取出数据 ****************/
              $data=$this
                         ->field('instructions_num,invoice_no_num,invoice_status_num,pay_time,id,tid,tid_s,buyer_nick,buyer_alipay_no,created,buyer_message,seller_memo,total_pricce,receiver_address,receiver_name,receiver_mobile,receiver_phone,invoice_status,invoice_status_time,invoice_no,invoice_no_time,instructions,instructions_time,warehouse_delivery,warehouse_delivery_time,wrong_replacement,logistics_numbers,order_status,whether_merge')   
                         ->where($map)
                      //   ->group($tid_s)
                         ->distinct('tid_s')
                         ->order($order) 
                         ->limit($page->firstRow,$page->listRows)
                         ->select();
              echo G('begin','end').'s';
        echo $this->getLastSql();
   
        // $tids=$this->field('total_pricce,buyer_message')->where(array('tid_s'=>array('EQ',$k['tid_s'])))->select();
        //将价格相加后显示   --留言也变化一下--
  /*    foreach($data as $v=>$k){
        //    $sql = "select 'total_pricce,buyer_message' FROM  cms_orders  FORCE INDEX (tid_s) WHERE tid_s = ".$k['tid_s'];
        //    $tids=$this->query($sql);
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
            F("Latest_update_time",date('Y-m-d H:i:s'));
            $linch_a_deal_today = F('linch_a_deal_today');
            $model =D('orders');
            $price = $model->where(array('created'=>array('GT',strtotime(date('Ymd')),'order_status'=>array('in','5,6,7,8,9'))))->sum('price');
            F('linch_a_deal_today',$price);
           if($return!==false){
            $return=true;
            }
        return $return;
    }  
    /*************************************************/
    public function _before_insert(&$data, $options) 
    {
       if($options['table']=='cms_orders')
        {
            $F_data_num = F('F_data_num');
            $arr_ = array('num'=>1,'created'=>$data['created'],'pay_time'=>$data['pay_time']); //初始化
            
            if(empty($F_data_num))
            {
                $F_data_num[date('Ymd',$data['created'])] = $arr_;
            }else{
                if(count_two_num($F_data_num)>=30)
                {      
                    if(empty($F_data_num[date('Ymd',$data['created'])]))
                    {   
                        $num = 0;
                        foreach($F_data_num as $v=>$k){
                            if($v < date('Ymd',$data['created'])){
                                $num++;
                            }
                        }
                        if($num>0){
                            $num = 0 ;
                            foreach($F_data_num as $v=>$k){
                                if($num===0){
                                    unset($F_data_num[$v]);
                                } 
                                $num++;
                            }      
                       // $F_data_num_ = array_pop_two($F_data_num);
                      //  $F_data_num = $F_data_num_;
                        $F_data_num[date('Ymd',$data['created'])]=$arr_;
                        }
                    }else
                        {
                        if($F_data_num[date('Ymd',$data['created'])]['created']>$data['created'])
                        {
                            $F_data_num[date('Ymd',$data['created'])]['created'] = $data['created'];
                        }
                        if($F_data_num[date('Ymd',$data['created'])]['pay_time']>$data['pay_time'])
                        {
                            $F_data_num[date('Ymd',$data['created'])]['pay_time'] = $data['pay_time'];
                        }
                            $F_data_num[date('Ymd',$data['created'])]['num'] = ++$F_data_num[date('Ymd',$data['created'])]['num'];
                        }     
                }else
                    {
                     if(empty($F_data_num[date('Ymd',$data['created'])]))
                    {   
                        $F_data_num[date('Ymd',$data['created'])] = $arr_;
                    }else
                        {
                        if($F_data_num[date('Ymd',$data['created'])]['created']>$data['created'])
                        {
                            $F_data_num[date('Ymd',$data['created'])]['created'] = $data['created'];
                        }
                        if($F_data_num[date('Ymd',$data['created'])]['pay_time']>$data['pay_time'])
                        {
                            $F_data_num[date('Ymd',$data['created'])]['pay_time'] = $data['pay_time'];
                        }
                        $F_data_num[date('Ymd',$data['created'])]['num'] = ++$F_data_num[date('Ymd',$data['created'])]['num'];
                        } 
                    }      
            }
            // asort($F_data_num);
             F('F_data_num',$F_data_num);
             F('num_whole_count',null); //清空所有总数
        //   var_dump($data);exit; 
       }
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