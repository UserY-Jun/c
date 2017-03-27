<?php
namespace Admin\Model;
use Think\Model;
class PrivilegeModel extends Model{
    
    /******************验证合法性*****************************/
    protected $insertFields=array('parent_id','pri_name','module_name','controller_name','action_name');
    protected $updateFields=array('parent_id','pri_name','module_name','controller_name','action_name');
    
    /*******************自动验证**********************************/
    protected $_validate = array(
        array('pri_name', 'require','不能为空'),
        array('module_name','require','不能为空'),
        array('controller_name','require','不能为空'),
        
    );
    
    
       public function getTree(){
           $data=  $this->field('id,pri_name,parent_id')->select();     
           $arr=  $this->Tree($data); 
           return $arr;
    }

    
    
    public function Tree($data,$parentid=0,$lave=0){
        static $arr=array();
        foreach($data as $rows){
            if($rows['parent_id']==$parentid){
                $rows['lave']=$lave;
                $arr[]=$rows; 
                $this->Tree($data,$rows['id'],$lave+1);    
            }      
        }  
        return $arr;
    }

    //判断是否有权限访问当前的功能
    public function hasPri(){
        //先根据管理员id获取角色的id,
        //再根据角色的Id获取权限信息
        $adminId = cookie('admin')['id'];
        //判断是否是超级管路员如果是久不再验证其权限
        if($adminId==1)
           return TRUE;
        //只要管理员登录了就可以进入后台的的首页
        if(MODULE_NAME=='Admin' && CONTROLLER_NAME=='Index')
            return TRUE;
        //取出管理员权限的流程:先根据管理员ID->取出这个管理员拥有的角色id
        //->再根据角色ID取出权限id->再根据权限的id取出对应权限信息
        $raModel = M("Role_user");
        $has = $raModel->alias('a')
                ->join('LEFT JOIN __ROLE_PRI__ b ON a.role_id=b.role_id 
                       LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id ')
                ->where(array(
                    'a.user_id'=>array('eq',$adminId),
                    'c.module_name'=>array('eq',MODULE_NAME),
                    'c.controller_name'=>array('eq',CONTROLLER_NAME),
                    'c.action_name'=>array('eq',ACTION_NAME)
                ))->count(); //获取一共有多少条记录
       // print_r($has);die;
         //是AJAX请求  我们把所有AJAX请求通过
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
               return true;
              }
        return ($has>0);
    }
    //多店切换权限
    public function Authorization(){
            $adminId = cookie('admin')['id'];
            $raModel = M("Role_user");
                $has = $raModel->alias('a')
                 ->join('LEFT JOIN __ROLE_PRI__ b ON a.role_id=b.role_id 
                          LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id ')
                     ->where(array(
                         'a.user_id'=>array('eq',$adminId),
                          'c.module_name'=>array('eq','admin'),
                          'c.controller_name'=>array('eq','privilege'),
                          'c.action_name'=>array('eq','Authorization')
                     ))->find(); //获取一共有多少条记录
        $adminId = cookie('admin')['id'];
        //判断是否是超级管路员如果是就不再验证其权限
        if($adminId==1){
           return TRUE;    
        }        
        if(empty($has)){
            return false;
        }    
        return true;
    }
    
    public function Shoplist_Auth(){
        
         $adminId = cookie('admin')['id'];
            $raModel = M("Role_user");
                $has = $raModel->alias('a')
                 ->join('LEFT JOIN __ROLE_PRI__ b ON a.role_id=b.role_id 
                          LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id ')
                     ->where(array(
                         'a.user_id'=>array('eq',$adminId),
                          'c.module_name'=>array('eq','admin'),
                          'c.controller_name'=>array('eq','shop'),
                          'c.action_name'=>array('eq','shoplist')
                     ))->find(); //获取一共有多少条记录
      
        //判断是否是超级管路员如果是就不再验证其权限
        if($adminId==1){
           return TRUE;    
        }    
      
        if(empty($has)){
            return false;
        }    
        return true;
    } 
 
}
