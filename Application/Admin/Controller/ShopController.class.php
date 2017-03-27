<?php
namespace Admin\Controller;
use Think\Controller;

class ShopController extends BaseController{
 
    public function ShopList(){
      
        //显示绑定店铺的*******************
        $shopModel = D('shop');
        $data = $shopModel->search();
        $d_time = date('Y-m-d H:i:s');
        $user_id = cookie('admin')['id'];
        $str = "user,".$user_id;
        $user_id_x = S($str);
        $F_id_isY =   S('F_id_isY');
        $user_shop_id = session('user_shop')['id'];
        $information .= '店铺管理员您好:<br>';
        $it_v='';
        foreach($F_id_isY as $v=>$k){
           if($user_shop_id ==  _cut('', ',', $k[2]) )
           if($k[3]==cookie('admin')['id']){
               $it_v= $v;
               $information.="来自用户（"._cut('', ',', $v)."）的请求<br>";
               $information .= _cut(',', '', $k[1]).'希望能与您绑定店铺并访问您店铺的数据.<br>';
           }
        }
        
         if(strlen($information) === 26){
             $information = '';
         }; 
         /*********end******************/
         
         //查询授权店铺*****************
        $model =D('shop');
        $user_shop_id =session('user_shop')['id'];
        $str_id =  ','.$user_shop_id.',';
        $grant_shop_arr = $model->field('id,seller_nick,authorization,authorization_time')->where(array('authorization'=>array('LIKE',"%$str_id%")))->select();
        //查询授权店铺*****************end--
        //判断时间
        $con_arr = array(); 
        foreach($grant_shop_arr as $v=>$k){
            $con_aut_arr = explode(',', $k['authorization']);
            $con_tim_arr = explode(',', $k['authorization_time']);
            foreach($con_aut_arr as $o=>$p){
                if($p==$user_shop_id){
                    $grant_shop_arr[$v]['authorization_time'] = $con_tim_arr[$o];
                                        break;
                }
            }
        } 
        //判断时间  --end
 
        $this->assign(array('random_str'=>$data['random_str'],
                              'time'     =>$data['time'],
                              'show_data'=>$data['show_data'],
                              'user_id_x'=>$user_id_x,   
                              'information' =>$information,
                              'it_v'   =>$it_v,
                              'grant_shop_arr'    =>$grant_shop_arr,
                ));  
        
        $this->display();
    }
    
    public function shop_pri($shop_id=''){
            $shop_id = $shop_id;
            $userModel = D('shop');
            $user_shop = $userModel->field('id,seller_nick')->where(array('id'=>array('EQ',$shop_id)))->find();
            session("user_shop",$user_shop);    
        
            $this->success('切换店铺成功','',1);exit;
    } 
    
    //更改授权
    public function edit_Shop_authorization(){
        $i_key = trim(I('post.i_key'));
        $shopModel = D('shop');
        if($i_key===0){
            $this->error("未知错误",U('Shoplist'));
        }
        if(empty($i_key)){
            $this->error("不能为空",U('Shoplist'));
        }
        
        $max_time = date('Y-m-d H:i:s',time()-60*15);
        $where['AuthorizationCode_time']=array('GT',$max_time);
        $where['AuthorizationCode']=array('like',"$i_key%");
        $data_pri= $shopModel->field('authorizationcode,authorization_time,id,seller_nick')->where($where)->find();
      
        if(empty($data_pri)){
             $this->error("秘钥过期或错误，请检查或联系店铺管理员",U('Shoplist'));
        }
        
        $user_shop_id = session("user_shop")['id'];
        //判断当中是否可以授权店铺  
        $authorization = $shopModel->field('id,authorization,authorization_time')->where(array('id'=>array('EQ',$user_shop_id)))->find();
        if($authorization['authorization']!=0){
            $authorization_arr = explode(',', $authorization['authorization']);
            array_pop($authorization_arr);
        }else{
            $authorization_arr = '';
        }
        
        if($authorization['id']==$data_pri['id']){
            $this->error("不能给自己店铺授权",U('Shoplist'));
        }
        
       $Seller_nick=$data_pri['seller_nick']; 
        foreach($authorization_arr as $v=>$k){
            if($data_pri['id']==$k){
                $this->error("已存在"."（$data_pri[seller_nick]）"."的授权。无需再次授权",U('Shoplist'));
                              
            };
        }
        //end 判断当中是否可以授权店铺
        if($authorization['authorization']!=0){
          $data['authorization'] = $authorization['authorization'].$data_pri['id'].',';
          $data['authorization_time'] = $authorization['authorization_time'].date('Y-m-d H:i:s').',';
        } else{
            $data['authorization'] = ','.$data_pri['id'].',';
            $data['authorization_time'] = ','.date('Y-m-d H:i:s').',';
        }
      
        

        $F_id_isY[cookie('admin')['username'].','.cookie('admin')['id']][] = $data;                 //【0】
        $F_id_isY[cookie('admin')['username'].','.cookie('admin')['id']][] = "$user_shop_id,".session("user_shop")['seller_nick'];         //【1】
        $F_id_isY[cookie('admin')['username'].','.cookie('admin')['id']][] = "$data_pri[id],".$data_pri['seller_nick'];       //【2】
        $aut = _cut(',', '',$data_pri['authorizationcode']);    
        $F_id_isY[cookie('admin')['username'].','.cookie('admin')['id']][] = $aut;                  //【3】
        $str = 'shop'.','.$aut;
        S($str,1,900);//显示！图标
        S('F_id_isY',$F_id_isY,900);    //保存数据
       
        
       
        session('shopData',null);
        $user_id = cookie('admin')['id'];
        $str = "user,".$user_id;
        S($str,'请求授权成功，请等待对方同意....',900);
        $this->success('请求成功',U('Shoplist'));  
        
        /*
            if($shopModel->where(array('id'=>array('EQ',$user_shop_id)))->save($data)!==false){
                $this->success('授权成功',U('Shoplist'));
                 session('shopData',null);
            };  
        */
    }
    //解除店铺授权
    public function Unbound($Unbound_id){
        $t_id = session("user_shop")['id'];
        $model = D('shop');
        $authorization_all_arr = $model->field('authorization,authorization_time')->where(array('id'=>array('EQ',$t_id)))->find();
        $authorization_arr = explode(',', $authorization_all_arr['authorization']) ;
                array_pop($authorization_arr);
        $authorization_time_arr = explode(',', $authorization_all_arr['authorization_time']) ;
                array_pop($authorization_time_arr);
                
                $str_authorization = '';
                $str_authorization_time = '';
        foreach($authorization_arr as $v=>$k){
            if($k!=$Unbound_id){
                $str_authorization.=$k['authorization'].',';
                $str_authorization_time .= $authorization_time_arr[$v].',';
            }
        }
        if($str_authorization==','){
            $str_authorization = 0;
            $str_authorization_time = 0;
        }
        
        $data['authorization'] = $str_authorization;
        $data['authorization_time'] = $str_authorization_time;
        if($model->where(array('id'=>array('EQ',$t_id)))->save($data)!==false){
            $this->success('解除成功',U('ShopList')); session('shopData',null);exit;
        }
         $this->error('解除失败',U('ShopList'));
    }
    //取消授权绑定
    public function Unaut($Unaut_id){
        $t_id = session("user_shop")['id'];
        $model = D('shop');
        $authorization_all_arr = $model->field('authorization,authorization_time')->where(array('id'=>array('EQ',$Unaut_id)))->find();
       //查找出来的authorization字段拆分数组
        $aut_arr = explode(',', $authorization_all_arr['authorization']);
        //清除首末空数组
        array_shift($aut_arr);
        array_pop($aut_arr);

        
        if(count($aut_arr)===1){
            $data['authorization']=0;
            $data['authorization_time']=0;   
        }else{   
            //新建保存数据容器
            $con_aut = ',';
            $con_tim =',';
            //查找出来的authorization_time字段拆分数组
            $aut_tim_arr =  explode(',', $authorization_all_arr['authorization_time']);
            foreach($aut_arr as $v=>$k){
                if(!($k==$t_id)){
                    $con_aut  .=$k.',';
                    $con_tim  .=$aut_tim_arr[$v].',';
                }
            }
            $data['authorization']=$con_aut;
            $data['authorization_time']=$con_tim;
        }
        
        if($model->where(array('id'=>array('EQ',$Unaut_id)))->save($data)!==false){
            $this->success('取消成功',U('ShopList'));session('shopData',null);exit;;
        }
            $this->error('取消失败',U('ShopList'));

    }






    //传递过来的同意按钮
    public function  Ajax_consent($it_v){
         
        $F_id_isY = S('F_id_isY');
        $user_id = _cut(',', '', $it_v);
        $shop_id = _cut('', ',', $F_id_isY[$it_v][1]);
        $save = $F_id_isY[$it_v][0];
        $shop_model = D('shop');
        
        
        if($shop_model->where(array('id'=>array('EQ',$shop_id)))->save($save)!==false){
               echo 1;
               $user_str = 'user,'.$user_id;
               S($user_str,'同意，已授权成功',60) ;
               S('F_id_isY',null);
                   
        }
        
    }
    //拒绝按钮
    public function refuse_orization($it_v){
        
        $F_id_isY = S('F_id_isY');
        $user_id = _cut(',', '', $it_v);
        $shop_id = _cut('', ',', $F_id_isY[$it_v][1]);
              
               $user_str = 'user,'.$user_id;
               S($user_str,'对方拒绝了您的申请',60) ;
               S('F_id_isY',null);
         echo 1;
    }
    
    
    
}