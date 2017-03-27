<?php
namespace Admin\Model;
use Think\Model;


class OrdersModel extends BaseModel{
    
    
     /******************************数据************************************/
           public function search($pagelist=50,$recOns=0)
    {        $tid_s='tid_s';
             $where['invoice_status']=0;
             $where['invoice_no']=0;
             $where['_logic'] = "OR";
             $map["_complex"] = $where;
             $map['order_status'] = 5;
      
        /**********  查询数据****模糊查询  *******************/
                $r=I('get.p');
                if(!$r){
                    $r=1;
                }
                $r=($r-1)*$pagelist;
             
             
    $keyword=I('get.keywords');
    $keyword=trim($keyword);
           //查询全部数据   
    $button=I('get.button');
              //只点击了提交按钮。没有提交值
            if($button && !$keyword){  
                unset($map);
                unset($tid_s); 

               // $r=$page->firstRow; 
                $last=  $this->field('id')->order('')->limit($r,1)->select();
                $row=  $this->field('id')->order('')->limit($r,100)->select();
                $lastid=$last[0]['id'];
                $rowid=$row[0]['id']+1000;
                $whereid="id>=($lastid)  AND id<=($rowid)";
                
               // $lastid=$page->firstRow;  
                $lastid=$r;
                
            }
            
            
         // 3 模糊查询
            if($keyword){  //判断是否有提交值 buyer_nick
                unset($map);
                $tid_s='tid_s';
                $map['_string']="(tid like '%$keyword%') OR(receiver_name like '%$keyword%') OR(receiver_mobile like '%$keyword%')OR(logistics_numbers like '%$keyword%')OR(buyer_nick like '%$keyword%')"; // 将获取的值带入模糊查询where条件      
            } 

        /********  分页数据 *************/

         $count_=  $this->field('id')->where($map)->group($tid_s)->select();
         $count=  count($count_);   
       //  $count = $this->group('tid_s')->where($map)->count();        //获取总页数 
     //    $data=  $this->group('tid_s')->select();
        
         
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
         if($button && $keyword){
                unset($whereid);
            //    $lastid=$page->firstRow;
         }
      //   var_dump($whereid);
         $lastid=isset($lastid)?$lastid:$page->firstRow;
        
         
        // $page->setConfig('header','<a class="pages">共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页<a/>');
        $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         //跟该配置文件样式
         $page->setConfig('prev','上一页');
         $page->setConfig('next','下一页');
         $page->setConfig('last','末页');  
         $page->setConfig('first','首页');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');

         $show=$page->show();
        /**********  取出数据 ****************/
              $data=$this
                     //     ->alias('')           //取别名  
                          
                        ->field('id,tid,tid_s,buyer_nick,buyer_alipay_no,created,buyer_message,seller_memo,total_pricce,receiver_address,receiver_name,receiver_mobile,receiver_phone,invoice_status,invoice_status_time,invoice_no,invoice_no_time,instructions,instructions_time,warehouse_delivery,warehouse_delivery_time,wrong_replacement,logistics_numbers,order_status,whether_merge')
                        
                       ->where($whereid)
                       ->where($map)
                       ->order($tid_s)
                        ->limit($lastid,$page->listRows)
                       // ->limit($page->firs,$page->listRows)
                          ->select();
    
       
           /*
            * *
            * *
            * *需要优化
            * *
            */
        //将价格相加后显示   --留言也变化一下--
      foreach($data as $v=>$k){
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
      * 需要优化*/
        unset($map);
        foreach($data as $v=>$k){
            $stime=$k['created']-259200;
            $etime=$k['created']+259200;
         // 1480466340   1480466700
            $map['created']  = array('between',array($stime,$etime));
            $map['buyer_alipay_no']=$k['buyer_alipay_no'];
            $map['order_status']=array('in','1,4,0');
            $map['tid_s']=array('NEQ',$k['tid_s']);
            $many=  $this->field('tid')->where($map)->select();
            
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
             'showPage' =>$show
                     );
    } 
    
    
    
    public function OrdersAdd($data){
      //  echo memory_get_usage();echo '<hr>';
         $dataadd=array();
         $orderinfo_=array();
         
         
        if(count($data[0])>30){
            $time=  time()-1296000-1296000; //最近15+15天的数据
            $orderinfo=$this
                    ->field('tid')
                    ->where(array('created'=>array('gt',$time),
                        //    array('invoice_status'=>array('EQ',0)),
                        //    array('invoice_no'=>array('EQ',0)),
                        ))
                    ->select();
            
       //     echo '<pre>';
        //    var_dump($data);exit;
           
            foreach($orderinfo as $v=>$k){
                   $orderinfo_[$k['tid']]=$k['tid'];
            }
        }else{
                $model=D('orderinfo');
                $where['order_state']=array('not in',array('0','3'));
                $orderinfo=$model
                        ->field('')
                        ->group($tid_s)
                        ->where($where)
                        ->select();
                
           foreach($orderinfo as $v=>$k){
               $orderinfo_[$k['sku_pro_name'].$k['tid']]=1;
             }
            
        }
       // $count=  count($orderinfo_);echo $count;exit;
     //   echo '<pre>';
      // var_dump($data);exit;
        //二维数组转化为一维数组
 
     //   var_dump($data);exit;

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
            //在添加的时候做个判断  如果数据库里面有这个数据 又满足条件 则更新 tids 和运费-订单状态 金额
          //  $orderinfo=$this->where(array('tid'=>array('EQ',$k[0])))->find();
            
         //   !isset($orderinfo_[$k[0]]
           //!array_key_exists($k[0],$orderinfo_ 
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
               //  $dataadd['ouder_tid']=$k[4].$k[0];
                 
                    if(!isset($orderinfo_[$k['sku_pro_name'].$k['tid']]) && $data[$v]['order_state']!=0 && $data[$v]['order_state']!=3){
                    $return=$model->add($dataadd);
                     }else{
                         $return=$model->where(array('tid'=>array('EQ',$k['tid'])))->save(array(
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
    
    
    
    
    public function AjaxShoworderInfoModel($tids){
        
 
        
        $tidArrTwoDimensional=$this->field('tid')->where(array('tid_s'=>array('EQ',$tids)))->select();

        $tidArrOneDimensional=Two_dimensional_into_one_dimensional_array($tidArrTwoDimensional,'tid');

        $map['tid']=array('in',$tidArrOneDimensional);

        $model=D('orderinfo');
        $data=  $model
                ->alias('a')
                ->where($map)
                ->select();
        return $data;
        
    }
    
    
    
    
    
    
    
    
}