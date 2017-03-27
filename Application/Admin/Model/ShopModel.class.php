<?php
namespace Admin\Model;
use Think\Model;


class ShopModel  extends BaseModel{
   
    
        
         /******************************数据************************************/
           public function search(){
               
                $shop_id = session("user_shop")['id'];
                if(!empty($shop_id)){
                    $random_str = random_str(36).','.cookie('admin')['id'];
                    $time = date('Y-m-d H:i:s',time()+(60*15));
                    $returnData['random_str'] = _cut('', ',', $random_str);
                    $returnData['time'] = $time;
                    $data['AuthorizationCode'] = $random_str;
                    $data['AuthorizationCode_time'] = $time;
                    $this->where(array('id'=>array('EQ',$shop_id)))->save($data);
                    
                    
                    //查询绑定店铺
                    $data_ath = $this->field('authorization,authorization_time')->where(array('id'=>array('EQ',$shop_id)))->find();
                   
                        $ath_time_arr = explode(',', $data_ath['authorization_time']);
                                                array_shift($ath_time_arr);
                                                array_pop($ath_time_arr);
         
                   
                    $data_ath_arr = $this->field('Seller_nick,id')->where(array('id'=>array('in',$data_ath['authorization'])))->select();
                    
                    foreach($data_ath_arr as $v=>$k){
                        $data_ath_arr[$v]['base_time'] = $ath_time_arr[$v];
                    }
        
                    $returnData['show_data'] =$data_ath_arr;
                    
                }
                return $returnData;
           }

}
