<?php

 function DiffDate($date1, $date2,$showtype) { 
  if (strtotime($date1) > strtotime($date2)) { 
    $ymd = $date2; 
    $date2 = $date1; 
    $date1 = $ymd; 
  } 
  
  list($y1, $m1, $d1) = explode('-', $date1); 
  list($y2, $m2, $d2) = explode('-', $date2); 
  
  $y = $m = $d = $_m = 0; 
  $math = ($y2 - $y1) * 12 + $m2 - $m1; 
  $y = round($math / 12); 
  $m = intval($math % 12); 
  $d = (mktime(0, 0, 0, $m2, $d2, $y2) - mktime(0, 0, 0, $m2, $d1, $y2)) / 86400; 
  if ($d < 0) { 
    $m -= 1; 
    $d += date('j', mktime(0, 0, 0, $m2, 0, $y2)); 
  } 
  $m < 0 && $y -= 1; 
  
  switch ($showtype){
        case 'yy':return $y;
        case 'mm':return $m;
        case 'dd':return $d;
        case 'yymm':return array($y,$m);
        case 'mmdd':return array($m,$d);
        case 'yymmdd':return array($y,$m,$d);
        default:return $d;
    }
 // return array($y, $m, $d); 
} 
    
function input_csv($handle) { 
    $out = array (); 
    $n = 0; 
    while ($data = fgetcsv($handle, 10000)) { 
        $num = count($data); 
        for ($i = 0; $i < $num; $i++) { 
            $out[$n][$i] = $data[$i]; 
        } 
        $n++; 
    } 
    return $out; 
} 

//修改订单状态
function modify_order_status($data){
    //全部转化为utf8格式
    foreach($data as $v=>$k){
        foreach($k as $u=>$i){
            if($a_=iconv('GB2312', 'UTF-8',$i)){
            $data[$v][$u]=$a_;
               
            }else{$data[$v][$u]=mb_convert_encoding($i,'UTF-8','GBK');}
            
            }  
    }
    foreach($data as $v=>$k){
         //§
      /*      if($k[10]=='等待买家付款'){
              $data[$v][10]=1;  
            }*/
            switch ($k['order_status'])
                { 
                  case '没有创建支付宝交易':
                      $data[$v]['order_status']=1;   //--没有创建支付宝交易
                  break; 
                  case '等待买家付款':
                      $data[$v]['order_status']=2;   //----等待买家付款
                  break; 
                  case '交易关闭':
                      $data[$v]['order_status']=3;   //--交易关闭
                  break;
                  case '付款以后用户退款成功，交易自动关闭':
                      $data[$v]['order_status']=4;   //--付款以后用户退款成功，交易自动关闭 
                  break;  
                  case '买家已付款，等待卖家发货':
                  $data[$v]['order_status']=5;   //--买家已付款，等待卖家发货
                  break;  
                  case '卖家部分发货':
                      $data[$v]['order_status']=6;   //--卖家部分发货
                  break; 
                  case '卖家已发货，等待买家确认':
                      $data[$v]['order_status']=7;   //--卖家已发货，等待买家确认
                  break;  
                  case '买家已签收,货到付款专用':
                      $data[$v]['order_status']=8;   //--买家已签收,货到付款专用
                  break;  
                  case '交易成功':
                      $data[$v]['order_status']=9;   //--交易成功
                  break; 
                 default:
                     $data[$v]['order_status']=0;
                }   
        }
          
        return $data;
}
function back_modify_order_status($data){
     foreach($data as $v=>$k){
         //§
      /*      if($k[10]=='等待买家付款'){
              $data[$v][10]=1;  
            }*/
            switch ($k['order_status'])
                { 
                  case '1':
                      $data[$v]['order_status']='没有创建支付宝交易';   //--没有创建支付宝交易
                  break; 
                  case '2':
                      $data[$v]['order_status']='等待买家付款';   //----等待买家付款
                  break; 
                  case '3':
                      $data[$v]['order_status']='<font color="#999999">交易关闭</font>';   //--交易关闭
                  break;
                  case '4':
                      $data[$v]['order_status']='付款以后用户退款成功，交易自动关闭';   //--付款以后用户退款成功，交易自动关闭 
                  break;  
                  case '5':
                  $data[$v]['order_status']='<font color="#ff5500">买家已付款</font>';   //--买家已付款，等待卖家发货
                  break;  
                  case '6':
                      $data[$v]['order_status']='卖家部分发货';   //--卖家部分发货
                  break; 
                  case '7':
                      $data[$v]['order_status']='<font color="#795960">卖家已发货</font>';   //--卖家已发货，等待买家确认
                  break;  
                  case '8':
                      $data[$v]['order_status']='买家已签收,货到付款专用';   //--买家已签收,货到付款专用
                  break;  
                  case '9':
                      $data[$v]['order_status']='<font color="#466645">交易成功</font>';   //--交易成功
                  break; 
                 default:
                     $data[$v]['order_status']='异常订单';
                }   
        }
          
        return $data;
    
}


function modify_order_status_info($data){
    
        foreach($data as $v=>$k){
            foreach($k as $u=>$i){
                $data[$v][$u]=iconv('GB2312', 'UTF-8',$i);
            }  
        }

        foreach($data as $v=>$k){
          switch ($k['order_state'])
                { 
                  case '没有创建支付宝交易':
                      $data[$v]['order_state']=1;   //--没有创建支付宝交易
                  break; 
                  case '等待买家付款':
                      $data[$v]['order_state']=2;   //----等待买家付款
                  break; 
                  case '交易关闭':
                      $data[$v]['order_state']=3;   //--交易关闭
                  break;
                  case '付款以后用户退款成功，交易自动关闭':
                      $data[$v]['order_state']=4;   //--付款以后用户退款成功，交易自动关闭 
                  break;  
                  case '买家已付款，等待卖家发货':
                  $data[$v]['order_state']=5;   //--买家已付款，等待卖家发货
                  break;  
                  case '卖家部分发货':
                      $data[$v]['order_state']=6;   //--卖家部分发货
                  break; 
                  case '卖家已发货，等待买家确认':
                      $data[$v]['order_state']=7;   //--卖家已发货，等待买家确认
                  break;  
                  case '买家已签收,货到付款专用':
                      $data[$v]['order_state']=8;   //--买家已签收,货到付款专用
                  break;  
                  case '交易成功':
                      $data[$v]['order_state']=9;   //--交易成功
                  break; 
                 default:
                     $data[$v]['order_state']=0;
                }   
            }
        return $data;
};
//Two_dimensional_into_one_dimensional_array

//二维数组转化为一维数组
 function Two_dimensional_into_one_dimensional_array($data,$id='tid'){
            $dataOne=array();
     foreach($data as $v=>$k){
         $dataOne[]=$k[$id];
     }
     return $dataOne;
}

//固定获取到的csv数组的位置
function fixed_array_position_one($data){
        $Zero=$data[0];
        $replace=array();
        foreach($Zero as $v=>$k){
            $k = trim($k);
            switch (iconv('GBK', 'UTF-8',$k))
                 {
                 case '订单编号':
            //     $tid='tid';              //新数组的下标  指定---
             //    $data_v_tid=$v;      //旧数组的下标  保存---
                   $replace[$v]='tid';
                   break;  
                 case '买家会员名':         //1
                   $replace[$v]='buyer_nick';
                   break;
                 case '买家支付宝账号':
                   $replace[$v]='buyer_alipay_no';
                   break;
                 case '买家应付邮费'://4
                   $replace[$v]='post_fee';
                   break;
               case '总金额':
                   $replace[$v]='total_pricce';
                   break;
               case '买家实际支付金额':
                   $replace[$v]='price';
                   break;
               case '订单状态':
                   $replace[$v]='order_status';
                   break;
               case '买家留言':
                   $replace[$v]='buyer_message';
                   break;
               case '收货人姓名':
                   $replace[$v]='receiver_name';
                   break;
                 case '收货地址':
                   $replace[$v]='receiver_address';
                   break;    
               case '运送方式':           //14
                   $replace[$v]='logistics_company';
                   break;
               case '联系电话 ':    //15
                   $replace[$v]='receiver_phone';
                   break;
               case '联系手机':   //16
                   $replace[$v]='receiver_mobile';
                   break;
               case '订单创建时间':   //17
                   $replace[$v]='created';
                   break;
               case '订单付款时间':
                   $replace[$v]='pay_time';
                   break;
               case '店铺名称':
                   $replace[$v]='seller_nick';
                   break;
                 default:
                 }  
        }
    foreach($data as $v=>$k){
        foreach($k as $o=>$p){
            foreach($replace as $u=>$i){
                if($u==$o){
                    $data[$v][$i]=$p;
                    unset($data[$v][$o]);
                    break;
                }    
            }  
        }    
    }
    return $data;
}


function fixed_array_position_two($data){
        $Zero=$data[0];
        $replace=array();
     foreach($Zero as $v=>$k){
            switch (iconv('GBK', 'UTF-8',$k))
                 {
                 case '订单编号':
                   $replace[$v]='tid';
                   break;  
                 case '标题':         //1
                   $replace[$v]='title';
                   break;
                 case '价格':
                   $replace[$v]='price';
                   break;
                                case '购买数量':
                   $replace[$v]='num';
                   break;
                                case '外部系统编号':
                   $replace[$v]='outer_iid';
                   break;
                                               case '商品属性':
                   $replace[$v]='sku_pro_name';
                   break;
                                               case '订单状态':
                   $replace[$v]='order_state';
                   break;
                 default:
                 }  
     }
        
        foreach($data as $v=>$k){
            foreach($k as $o=>$p){
                foreach($replace as $u=>$i){
                    if($u==$o){
                        $data[$v][$i]=$p;
                        unset($data[$v][$o]);
                        break;
                    }    
                }  
            }    
    }
    return $data;
}

//包装参考
function Package_Reference($seller_memo='',$buyer_message='',$datainfo=array()){
    //return stripos('abecdefg', 'e');
    //查出是否买了相同的型号和规格 
          $DataInfoClone=$datainfo;
          $NewDataInfo=array();
          foreach($datainfo as $v=>$k){
              $NewDataInfo[$k['sku_pro_name']]=$NewDataInfo[$k['sku_pro_name']]+$k['num'];
          }
          //是否提及‘卷’这一关键词
       $Company=strstr($seller_memo,'卷');
         //如果没有 卷这个关键词  就查看是否有套这个关键词
            if(empty($Company)){
              $Company=strstr($seller_memo,'套');
          }
          //如果有这些关键词 再查看是否提及了长度  在M 和米 之前的数量词
         if(!empty($Company)){
           $length = Company($seller_memo);  
         }    
      //   return $length;
        //如果备注上没有标明  就去查看买家留言上是否有标明
         if(empty($length)){
           $length = Company($buyer_message); 
         }   
         //如果没有明确多少长度 那么、
         if(empty($length)){
             //这是默认的  如果啥都没说 啥都没有 就按默认的 
             $proposal=Proposed_data($NewDataInfo);
         } 
         if(!empty($length)){
         //如果明确了长度  就把长度参数带入
         $proposal=Proposed_data($NewDataInfo,$length,$length);
         }
          return $proposal;
}

function Proposed_data($NewDataInfo,$YL=50,$Other=10){
          //这是默认的  如果啥都没说 啥都没有 就按默认的 
         $proposal='';
         foreach($NewDataInfo as $v=>$k){
                  $arr_key=$v;
                  $win=strtok($arr_key,'：');  $wing=substr(strtok('/'),2); 
                  $wide=strtok('*');
                  $long=strtok(';');
                  
                  $num=$k*intval($long);
                  //如果是‘YL’ 这个型号的  基数是50 米
                  if(strtoupper(substr($wing,0,2))=='YL'){
                      $Surplus=$num%$YL;
                      $longnum=floor($num/$YL);
                      if($longnum>0){
                        $proposal .= $wing .' = ';
                        $proposal .= $wide.'×';
                        $proposal .= $YL.'m'.'×';
                        $proposal .= $longnum.' 卷';  
                        $proposal =  "<font color=red>$proposal</font>";
                    }
                        if($long>=1 && $Surplus!==0){
                          $proposal .='<br>';
                          $proposal .="<font color=green>".$wing .' = ';
                          $proposal .=$wide .'×';
                          $proposal .=$Surplus.'m' .'×' . 1 . ' 卷'."</font>";
                       }
                     //  return $k;
                  }else{
                    $Surplus=$num%$Other;
                    $longnum = floor($num/$Other);
                    if($longnum>0){
                    $proposal .= $wing .' = ';
                    $proposal .= $wide.'×';
                    $proposal .= $Other.'m'.'×';
                    $proposal .= $longnum.' 卷';  
                    $proposal =  "<font color=red>$proposal</font>";
                    }
                  if($long>=1 && $Surplus!==0){
                          $proposal .='<br>';
                          $proposal .="<font color=green>".$wing .' = ';
                          $proposal .=$wide .'×';
                          $proposal .=$Surplus.'m' .'×' . 1 . ' 卷'."</font>";
                      }
                 }     
                  $proposal .='<br>';
     
              }
          return $proposal; 
}


function Company($Remarks_or_message){ 
          $Remarks_or_message=str_rev($Remarks_or_message);        //反转
          
          $length_position=strpos($Remarks_or_message,'M');  //获取翻转的出现字符串的长度
          
          if(empty($length_position)){
              $length_position=stripos($Remarks_or_message,'米');
          }
          
          $length=  substr($Remarks_or_message, $length_position,7); //截取到
          
          
          $length=strrev($length);      //再次翻转过来
          $length= preg_replace('/\D/s', '', $length);
          //    $length=  intval($length);
          return $length;
         
}





function str_rev($str){
        //先判断参数是否为字符串，且为UTF8编码
        if(!is_string($str)||!mb_check_encoding($str,"utf-8")){
            die("输入的不是utf8类型的字符串");
        }                        
        //用mb_strlen函获取算utf8字符串的长度
        $length=mb_strlen($str,"utf-8");                       
        //声明一个数组备用
        $arr=array();                     
        //将字符串拆开放入数组
        for($i=0;$i<$length;$i++){
            $arr[$i]=mb_substr($str,$i,1,"utf-8");
        }                       
        //将数组按键名大小反转
        krsort($arr);                       
        //将数组中单个字符元素重新组合成字符串
        $str=implode("",$arr);                      
        //将翻转后的字符串返回
        return $str;
    }
     
    
 function _cut($begin,$end,$str){
            if($begin=='' && $end != '')
            {
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
        
        
   function rand_($s,$e,$no_arr = array()){
       $rand_ = rand($s,$e);
       if(in_array($rand_,$no_arr)){
          return  rand_($s,$e,$no_arr);
       }
       return $rand_;
   } 
   
   function count_two_num($arr_){
       $num = 0;
       foreach($arr_ as $k){
           $num = ++$num;
       }
       return $num;
   }
   
   function array_pop_two($arr_){
       $num = 0 ;
       foreach($arr_ as $v=>$k){
           if($num===0){
               unset($arr_[$v]);
           } 
           $num++;
       }  
       return $arr_;
   }
   
   function is_unique_arr($arr,$is_unique_arr=array()){
       if(count($is_unique_arr)==0){
           return false;
       }
       if(count($arr)==0){
           return false;
       }
       
       $arr_=array();
       
       foreach($arr as $v=>$k){
           $arr_[] = $v;
       }
 
       $new=array();
       foreach($is_unique_arr as $v=>$k){
           if(in_array($k,$arr_)){
               $new[] = $k;
           }else{
               return false;
           }   
       } 
       if(count($new)!=count($arr_)){
           return false;
       }
       return 1;  
   }
   function random_str($length)
{
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = array_merge(range(0, 9), range('A', 'Z'));
    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++)
    {
        $rand = mt_rand(0, $arr_len-1);
        $str.=$arr[$rand];
    }
 
    return $str;
}



//加密算法
function encryption($s){
    $k = 105;
    for($i=0; $i<strlen($s); $i++) {
        $n = ord($s{$i}) + $k;
        if($n > 126) $n = ($n + 32) & 0x7f;
        $s{$i} = chr($n);
    }
    return  $s;  
}


//解密算法
function Decrypt($s){
    
    for($i=0; $i<strlen($s); $i++) {
        $n = ord($s{$i}) - $k;
        if($n < 32) $n = ($n - 32) & 0x7f;
        $s{$i} = chr($n);
    }
    return  $s;
    
}









