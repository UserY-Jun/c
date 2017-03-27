<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends BaseModel{
    
    
    protected $updateFields=array('id','username','password','cpassword','captcha','job_numbers','mobile','email','shop','is_active','is_iuqn','remark','departid','employee_color');
    protected $insertFields=array('accounts','username','password','cpassword','captcha','job_numbers','mobile','email','shop_group','is_active','is_iuqn','remark','departid','employee_color');

/*
    protected $_validate=array(
        array('username','require','管理员名称不能为空',1,'regx',3),
        array('username','1,10','用户名长度应该在1-10',1,'length',3),
        array('password','require','密码不能为空'),
        
        array('password','cpassword','两次密码输入不一致 ',1,'confirm',1),
        array('password','cpassword','两次输入密码不一致',1,'confirm',2),
        
        array('captcha','require','验证码不能为空',1,'',9),
        array('captcha','captcha','验证码输入错误',1,'callback',9),
        
    );

    */
    
    
    public function captcha($captcha){
        $verify=new \Think\Verify();
        
        return $verify->check($captcha);
        
        
        
    }

    

    public function userAdd(){
        $username=  $this->acccounts;
        $password=  $this->password;
       
        $password=  md5($password.C('MD5_KEY'));
      
        $data1=$this->where(array('acccounts'=>array('EQ',$acccounts)))->find();
        if($data1){
            $this->error='用户名已经存在';
            return FALSE;
        }
       // var_dump($data1);exit;
        if($this->add(array(
            'username'=>$username, //用户名
            'password'=>$password, //用户密码
              ))){
            return true;
             }else{
            $this->error='添加失败';
            return FALSE;
        };
    }
    
    
    
    /**************************添加之前做的判断**********************************/
    public function _before_insert(&$data, $options) {
        $data['password']=md5($data['password'].C('MD5_KEY'));
        
        $accounts=  $this->accounts;
        //添加之前判断用户是否存在
        $info=$this->where(array('username'=>array('EQ',$accounts)))->find();
        if($info){
            $this->error='用户名已经存在';
            return FALSE;         
         }
    
    }
   
    public function _after_insert($data, $options) {
     /****************添加之后 给用户分配岗位*******************************************************/
        /****************************************/
        $user_id=$data['id'];
        $model=D('role_user');
        $role_id=I('role_id');
        $model->add(array(
            'user_id'=>$user_id,
            'role_id'=>$role_id,  
        ));
        /****************添加之后 给用户分配店铺分组*******************************************************/ 
        //   如果表是一对一。那我已经在user表里面添加了
    }
    /**************************在修改后执行的操作*******************************************************/
    public function _after_update($data, $options) {

       // var_dump($data);exit;
        $role_id=I('post.role_id');
        //获取到； 提交过来的role_id
        //先删除中间表的对应。再添加
        if($role_id){
        $model=D('role_user');
        $model->where(array('user_id'=>array('EQ',$data['id'])))->delete();
        $model->add(array(
            'role_id' => $role_id,
            'user_id' => $data['id'],
            
        ));
        }
    }




    /**************************end*******************************************************/

    
    
    /**************************在修改前执行的操作*******************************************************/
    public function _before_update(&$data, $options) {
        
        if(!$data['is_iuqn']){
            $data['is_iuqn']=0;
        }
        
        
        if($data['password']){
            $data['password']=md5($data['password'].C('MD5_KEY'));
        }else{
            unset($data['password']);
        }
       // var_dump($data);exit;
    }


    /**************************end*******************************************************/

    public function login($accounts,$password){
        
            /**************登录************************/
     
           // $model=D('admin');

            $password=  md5($password.C('MD5_KEY'));
            
            $admin=$this->where(array('accounts'=>array('EQ',$accounts)))->find();
            
           
                if($admin){
                   // var_dump($password);exit;
                    if($password==$admin['password']){
                       // var_dump($root);exit;
                    $user_ip=$_SERVER['REMOTE_ADDR'];
                    $user_ip=  ip2long($user_ip);
                    // $data['ip']=$user_ip;
                   //TP框架获取IP方法   上方法在TP框架只获取到127.0.0.1   可能与本地测试有关，上传到服务器可以再测试 
                   //$Ip = new \Think\Library\Org\Net\IpLocation('UTFWry.dat');      
                   //$area = $Ip->getlocation();
                   //var_dump($area);exit;
                    $this->where(array('accounts'=>array('EQ',$accounts)))->save(array('ip'=>$user_ip));  
                    
                       cookie('accounts',$admin['accounts']);
                    //   var_dump(cookie('username'));exit;
                    //   cookie('ctime',true,900);
                      cookie('admin',$admin,3000);
                      
                      
                      // session('username',$username);
                    /**********************登陆的时候我们要把信息存进clock表。**********************************/
                    $model=D('Clock');
                     $year = date('Y');     //获得年份，例如2016  
                     $month = date('n');     //获得月份，例如11  
                     $day = date('j');       //获得日期，例如3  
                     $s_time=date('H:i:s');
                   //  var_dump($s_time);exit;
                     $s_time_=date('Y-m-d H:i:s');
                     
                     
                     $where['user_id']=$admin['id'];
                     $where['year']=$year;
                     $where['month']=$month;
                     $where['day']=$day;
                     
                     
                    $clockinfo=$model->where($where)->find();
                   // var_dump($clockinfo);exit;
                    if(!$clockinfo){
                        $model->add(array(
                            'user_id'=>$admin['id'],
                            'year'=>$year,
                            'month'=>$month,
                            'day'=>$day,   
                            'ip' =>$user_ip,
                            's_time'=>$s_time,
                            's_time_'=>$s_time_,
                        ));     
                    }else{
                       // var_dump($clockinfo);exit;
                    }
                    
                     /**********************end。**********************************/
                    $model=D('shop_group');
                    $shop_group=$model->where(array('id'=>array('EQ',$admin['shop_group'])))->find();
                    cookie('shop_name',$shop_group['shop_name']);
                    cookie('shop_id',$shop_group['id']);
                    
                    
                    
                    
                    
                       return true;
                   }else{
                       $this->error='密码错误';
                       return FALSE;
                   }
                   
                   
                   
                   
               }else{
                   $this->error='不存在这个用户名';
                   return FALSE;
               }  
        }
    
        
        //退出登录***************************************************************
        public function loginout(){
            cookie('accounts',NULL);
            cookie('admin',NULL);
            session(null);        
        }
    /******************************数据************************************/
           public function search($pagelist=6,$recOns=0)
    { 
       /***********************升序降序**************************************/
            $kb='id';$desc_asc='asc';
            $ob=I('get.ob');
            if($ob=='price_desc')
            {   
                $kb='shop_price';
                $desc_asc='desc';
            }elseif($ob=='price_asc')
              {
                $kb='shop_price';
                $desc_asc='asc';
              };
                     
            
        /********  分页数据 *************/
         //import('ORG.Util.Page');
         //$where['type']=$_GET['type'];
         $where['rec']=$recOns;
 
         $count = $this->where($where)->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
         //$page->setConfig('header','<a class="pages">共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页<a/>');
            $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         //跟该配置文件样式
         $page->setConfig('prev', '上一页');
         $page->setConfig('next','下一页');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
         //获取显示数据
         $show=$page->show();
        /**********  取出数据 ****************/
              $data=$this
                          ->alias('a')           //取别名     
                          ->field('a.*,GROUP_CONCAT(c.role_name)role_name')
                          ->join('LEFT JOIN __ROLE_USER__ b ON a.id=b.user_id
                                  LEFT JOIN __ROLE__ c ON b.role_id=c.id
                                   ')
                          ->where(array('rec'=>array('EQ',$recOns)))
                          ->order("$kb $desc_asc")
                          ->group('a.id desc')
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
         
         return array(
             'user_list' => $data,
             'showPage' =>$show
                     );
    } 
         

    /*****************************考勤需要的信息*** 现在没用  控制器中已经调用*******************************************************************************************************************/
    
    public function clock($year,$month,$pagelist=6){
         /********  分页数据 *************/
     
         $count = $this->where()->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
         $page->setConfig('header','<br /><input type="button" value="共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页">');
         
         //跟该配置文件样式
         $page->setConfig('prev', '<input type="button" value="上一页">');
         $page->setConfig('next', '<input type="button" value="下一页">');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
        
         //获取显示数据
         $show=$page->show();
        
        
        
        //用户基本信息  名字  工号
       
        $userListOne=$this
                ->field('id,job_numbers,username')
                ->where($where)
                 ->limit($page->firstRow,$page->listRows)
                ->select();
        //我们可以吧数据转化为一维数组  
        $userList=array();
        
        foreach ($userListOne as $v=>$k){
                $userList[$k['id'].$k['job_numbers']]=$k['username'];
                //$userList['id']=$k['id'];
                //$userList['username']=$k['username'];
                //$userList['job_numbers']=$k['job_numbers'];
                //$userList['id']=array($k['id']=array($userList[$k['job_numbers']]=>$k['username']));
         
        }
        //我们要查出用户状态。
        $model=D('Clock');
        $where['year']=$year;
        $where['month']=$month;
        
        $clockList=$model
              //  ->group('user_id')
                ->where($where)
             
                ->select();
        
        
        return array(
            'userList' =>$userList,
            'clockList'=>$clockList,
            'showPage' =>$show,
        );
        
    }
    
    //测试新数据
    
    public function test(){
        //用户数据
        $model=D('User');
        $user=$model->alias('a')->field('a.id,a.username,a.job_numbers')->select();
        return $user;
    }
    
    
    
    
    
    
    
}
