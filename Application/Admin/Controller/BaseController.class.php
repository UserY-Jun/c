<?php
namespace Admin\Controller;

use Think\Controller;
//                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       INSERT INTO `cms_products` (`title`,`style_id`,`cat_id`,`outer_id`,`type_id`,`sub_title`,`summ`,`selling_point`,`list_time`,`logo`,`sm_logo`) VALUES ('3333','5','2','33','0','3','3','3','2017:02:16','Products/2017-02-16/58a52aab7e5ca.jpg','Products/2017-02-16/sm_58a52aab7e5ca.jpg')
class BaseController extends Controller {

    public function __construct() {
      //  F('num_whole_count',null);
   
        parent::__construct();
        //判断是否在不同电脑登录  后台的每一次操作都会重新验证IP 如果IP于数据库最后登录IP不同 则需要重新登录
        
       $priModel = D('Privilege');
       
       if($priModel->Authorization()){
           $shopData =  session('shopData');
                if(empty($shopData)){
                $shopModel=D('shop');
                $shop_id = cookie('admin')['shop_id'];
                $groupData=$shopModel->where(array('id'=>array('EQ',$shop_id)))->select();
                $shopData =array();
                $shopModel=D('shop');
                $vNum = 0;
                foreach($groupData as $v=>$k){
                  $shopData[$vNum]['shop_name'] = $k['seller_nick'];
                  $shopData[$vNum]['id'] = $k['id'];;
                  $shopData[$vNum]['is_main'] = 1;
                  $branchArr = explode( ',',$k['authorization']);
                
                        foreach($branchArr as $o=>$p){
                            if(!empty($p)){
                                $iShop = $shopModel->field('id,seller_nick')->where(array('id'=>array('EQ',$p)))->find();
                                    $vNum++;
                                    $shopData[$vNum]['shop_name'] = $iShop['seller_nick'];
                                    $shopData[$vNum]['id'] = $iShop['id'];;
                                    $shopData[$vNum]['is_main'] = 0; 
                          
                            }       
                        }  
                    
                }
              
              session('shopData',$shopData);
                }
      }
      
      
      //如果ID为1,那么。所有店铺都可以切换
      if(cookie('admin')['id'] == 1){
          $model = D('shop');
          $data = $model ->field('id,seller_nick')->select();
 
           foreach($data as $v=>$k){
               $data[$v]['shop_name'] = $k["seller_nick"];               unset($data[$v]['seller_nick']);
               if($k['id']==session("user_shop")['id']){
                   $data[$v]['is_main'] = 1;
               }else{
                    $data[$v]['is_main'] = 0;
               }
               
           } 
           session('shopData',$data);
      }
      
      
      
      
 // session('shopData',null);
      $user_shop = session("user_shop");
  
      if(empty($user_shop)){
            $shop_id = cookie('admin')['shop_id'];
            $userModel = D('shop');
            $user_shop = $userModel->field('id,seller_nick')->where(array('id'=>array('EQ',$shop_id)))->find();
            session("user_shop",$user_shop);    
      }
 
 
        $model = D('User');
        $accounts = cookie('accounts');
        $admin = $model->where(array('accounts' => array('EQ', $accounts)))->find();
        $ipOne = long2ip($admin['ip']);
        $ip = $_SERVER['REMOTE_ADDR'];
       
        $controller = __CONTROLLER__;
        if (!$admin && $controller != '/index.php/Admin/Trade') {
            $this->error('未授权操作，请重新登录', U('login/login'));
        }
                 $ctime = cookie('admin');
        if (!$ctime) {
            $this->error('超时，请重新登录', U('login/login'));
        }cookie('admin', $ctime, 2000);


        if ($ip != $ipOne && $controller != '/index.php/Admin/Trade') {
            $this->error('该用户已在别处登录，请重新登录', U('login/login'));
        }
        //后台的每一次操作 地址否存进cookie  当用户退出，再登进 还是退出时的页面
        if((!isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest")){ 
                $self = __SELF__;
                cookie('self',$self);
              }
       
        
        $Action=__ACTION__;
        $arr=  explode('/', $Action);
        $count=  count($arr);
        $module_name=$arr[$count-3];
        $controller_name = $arr[$count-2];
        $action_name = $arr[$count-1];
        $user_id=cookie('admin')['id'];
        $model=D('role_user');
        $where['user_id']=$user_id;
        
        //判断用户是否有权限操作
        $priModel = D('Privilege');
            if(!$priModel->hasPri()){
                
                echo "
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>          
            <script charset=utf-8 >function myfun()
                    {
                 
                    alert('|-没有权限-|');
                     window.history.back();
                    return false;
                    }window.onload=myfun();
                  </script>";       exit;   
            }
 
        //  判断是否有店铺授权提示
        if($priModel->Shoplist_Auth()){
             $F_id_isY = S('F_id_isY');
             $user_id = cookie('admin')['id'];
             $str = "shop,".$user_id;
             if(empty($F_id_isY)){S($str,null);}
             foreach($F_id_isY as $v=>$k){
                 if($k[3]==$user_id){
                    $shop_aid =  S($str);
                        if(__ACTION__ != '/index.php/Admin/Shop/Shoplist'){
                                if($shop_aid==1){
                                         echo '<script>function del(){var r = confirm("您有一个店铺需要授权，确定跳转跳转到授权页面吗？");
                                             if(r == true){
                                                  window.location.href="/index.php/Admin/Shop/Shoplist";	
                                              }
                                             }del()</script>';    
                                 S($str,2,900);
                              }
                        }
                 }
             }
        }
        //操作日志   
        $model=D('journal');
        $journal_data['user_id']=$user_id;
        $journal_data['operation']=$operation;
        $journal_data['operation_url']=__SELF__;
        $journal_data['operation_time']=strtotime(date('Y-m-d H:i:s',time()));  
        $journal_data['shop_id']=cookie('shop_id');
        $journal_data['operating_state']='浏览页面';
        $model->add($journal_data);
        

        /*         * ********************后台操作的时候的时候我们要把信息更新进clock表。********************************* */
        $model = D('Clock');
        $year = date('Y');     //获得年份，例如2016  
        $month = date('n');     //获得月份，例如11  
        $day = date('j');       //获得日期，例如3  
        $s_time = date('H:i:s');
        //  var_dump($s_time);exit;
        $admin = cookie('admin');

        $where['user_id'] = $admin['id'];  //用户id

        $where['year'] = $year;
        $where['month'] = $month;
        $where['day'] = $day;
        
        $clockinfo = $model->where($where)->find();

        if ($clockinfo) {
            $data['e_time'] = $s_time;
            $model->where($where)->save($data);   
        }
        /*         * ********************end。********************************* */
        //确认授权

    }    
}
