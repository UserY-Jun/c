<?php
namespace Admin\Controller;
use Think\Controller;

class AdminController extends BaseController{
    public function AdminList(){
        $model=D('User');
        $data=$model->search();
        //获取获取部门信息***********************************************************
        $model=D('dept');
        $deptlistOne=$model->select();
        $deptlist=array();
        
        foreach ($deptlistOne as $v=>$k){
            $deptlist[$k['id']]=$k['dept_name'];
        }
        /***************  end   ***********************************/
        //获取分组信息
                $model=D('shop_group');
        $shoplistOne=$model->select();
        
        foreach ($shoplistOne as $v=>$k){
            $shoplist[$k['id']]=$k['shop_name'];
        }
       /********************  end  **************************************/ 
       
        //模板页面信息
        $this->assign(array(
            'user_list' => $data['user_list'],//用户的信息   不包括分组和部门
            'show_page' => $data['showPage'],//分页信息
            'deptlist' =>$deptlist, //部门信息
            'shoplist'=>$shoplist, //分组信息
            
            
            
        //main基本信息
            //左边
          'left'=>array(
                'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                ),
                'Two'=>array(
                    'TwoName'=>'考勤记录',
                    'TwoUrl'=>U('clock'),
                ),
                'Three'=>array(
                    'ThreeName'=>'操作日志',    
                ),
                
            ),
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                    'Color'  =>'employee_menu_curr employee_menu', 
                ),
                'Two'=>array(
                    'TwoName'=>'添加新用户',
                    'TwoUrl'=>U('AdminAdd'),
                    'Color' =>'employee_menu_type employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
            'recname'=>'回收站',
            'recurl'=>'reclist',
       
        ));
        $this->display();//这个需要在输出的模板页面下面***
    }
    
    
    public function AdminAdd(){
        
        if(IS_POST){ 
            $model=D('User');
          //  $a=$model->create();
         //  var_dump($a);exit;
            if($model->create()){
                
                $model->add();
                $this->success('添加成功',U('AdminList'));exit;
            }
            $error=$model->getError();
            $this->error($error);
        }
        
        /*****************************获取部门信息*****************************************************/
        $model=D('dept');
        $deptlistOne=$model->select();
        $deptlist=array();
       //转化为一维数组
        foreach($deptlistOne as $v=>$k){
              $deptlist[$k['id']]=$k['dept_name']; 
        }
        /********************************end*************************************************************/
        
        /*********************获取岗位信息****************************/
        $model=D('role');
        $rolelistOne=$model
                ->order('sort desc')
                ->select();
        $rolelist=array();
        foreach($rolelistOne as $v=>$k){
            $rolelist[$k['id']]=$k['role_name'];
        }
        /****************************end*********************************/
        
        
        /*********************获取分组信息****************************/
        $model=D('shop_group');
        $shoplistOne=$model
                ->order()
                ->select();
        $shoplist=array();
        foreach($shoplistOne as $v=>$k){
            $shoplist[$k['id']]=$k['shop_name'];
        }
       
        /***************************end**********************************/        
        
        
        //静态页面模板数据
        $this->assign(array(
            'deptlist'=>$deptlist, //显示部门的信息
            'rolelist'=>$rolelist, //显示岗位的信息
            'shoplist'=>$shoplist, //显示店铺分组信息
            
            
            
            
            
            
              //main基本信息
            //左边
          'left'=>array(
                'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                ),
                'Two'=>array(
                    'TwoName'=>'考勤记录',
                    'TwoUrl'=>U('clock'),
                ),
                'Three'=>array(
                    'ThreeName'=>'操作日志',    
                ),
                
            ),
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                    'Color'  =>'employee_menu_type employee_menu', 
                ),
                'Two'=>array(
                    'TwoName'=>'添加新用户',
                    'TwoUrl'=>U('AdminAdd'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
           // 'recname'=>'回收站',
            'recurl'=>'reclist',
     
        ));

        
        $this->display();
    }
    
    
    public function Admindel($id){
        $model=D('User');
        if($model->where(array('id'=>array('EQ',$id)))->delete()){
            $this->success('删除成功', U('Admin/recList'));
        };
        
        
    }

    public function AdminEdit($id){
        /***********************执行修改的逻辑*******************************************/
        if(IS_POST){
            $model=D('User');
            
            
            if($model->create(I('post.'),2)){
                if($model->save()!==false){
                    $this->success('修改成功', U('Admin/adminlist'));
                    exit;
                }
              $error=$model->getError();
              $this->error($error);
            }
            
            
            
        }
        

        
        $model=D('User');
        /***************获取到用户基本信息**************************/
        $userlist=$model->where(array('id'=>array('EQ',$id)))->find();//获取到用户基本信息
       
        /************************获取部门信息************************************************/
        $model=D('dept');
        $deptlistOne=$model->select();
        $deptlist=array();
       //转化为一维数组
        foreach($deptlistOne as $v=>$k){
              $deptlist[$k['id']]=$k['dept_name']; 
        }
        /*******************************end******************************************/
        
        /***************************获取分组信息***********************************************/
                $model=D('shop_group');
        $shoplistOne=$model
                ->order()
                ->select();
        $shoplist=array();
        foreach($shoplistOne as $v=>$k){
            $shoplist[$k['id']]=$k['shop_name'];
        }
        /*******************************end******************************************/
        
        /********************************************************/       
        /***********************获取岗位*********************************/ 
        $model=D('role');
        $rolelistOne=$model->select();
        $rolelist=array();
        foreach($rolelistOne as $v=>$k){
            $rolelist[$k['id']]=$k['role_name'];
        }     
        /************************所处那个岗位***可在中间表role_user查看*****************************/
        $model=D('role_user');
        $arrroleid=$model->field('role_id')->where(array('user_id'=>array('EQ',$id)))->find();
        
        /********************************************************/
        /**************************end**************************/
        /********************************************************/
        var_dump($arrroleid);
        
        
        /*****************模板信息*************************/
                //静态页面模板数据
        $this->assign(array(
            'userlist'=>$userlist, //显示用户的基本信息
            'deptlist'=>$deptlist, //显示部门的信息
            'rolelist'=>$rolelist,//显示岗位的基本信息
            'shoplist'=>$shoplist, //显示店铺分组信息
            'arrroleid'=>$arrroleid,   //用户所处岗位  应当在此数组里面 默认选择
                
                
                      //main基本信息
            //左边
          'left'=>array(
                'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                ),
                'Two'=>array(
                    'TwoName'=>'考勤记录',
                    'TwoUrl'=>U('clock'),
                ),
                'Three'=>array(
                    'ThreeName'=>'操作日志',    
                ),
                
            ),
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                    'Color'  =>'employee_menu_type employee_menu', 
                ),
                'Two'=>array(
                    'TwoName'=>'编辑用户',
                    'TwoUrl'=>U('AdminEdit'),
                    'Color' =>'employee_menu_curr employee_menu',
                ),      
            ),
            
            //回收功能  没有可以不填
           // 'recname'=>'回收站',
            'recurl'=>'reclist',    
                
                
                
                
                
        ));
        
        $this->display();
    }

    


/****************/
    /********************/
         //回收功能*****************************************************************************
    public function rec($id){
       
        $model=D('User');
        $data['id']=$id;
        $model->where($data)->save(array('rec'=>1));
        $this->success('回收成功', U('admin/adminlist'),1);
    }
    //回收**恢复***************************
    //回收**恢复***************************
    //回收**恢复***************************
    public function res($id){
        $model=D('User');
        $data['id']=$id;
        $model->where($data)->save(array('rec'=>0));
        $this->success('恢复成功', U('admin/reclist'),1);
        
    }
    /*********************end*******************************************/
    

    //回收页面显示
    public function reclist(){
        
        
         $model=D('User');
        $data=$model->search(6,1);
        //获取获取部门信息***********************************************************
        $model=D('dept');
        $deptlistOne=$model->select();
        $deptlist=array();
        
        foreach ($deptlistOne as $v=>$k){
            $deptlist[$k['id']]=$k['dept_name'];
        }
        /***************  end   ***********************************/
        //获取分组信息
                $model=D('shop_group');
        $shoplistOne=$model->select();
        
        foreach ($shoplistOne as $v=>$k){
            $shoplist[$k['id']]=$k['shop_name'];
        }
       /********************  end  **************************************/ 
       
        //模板页面信息
        $this->assign(array(
            'user_list' => $data['user_list'],//用户的信息   不包括分组和部门
            'show_page' => $data['showPage'],//分页信息
            'deptlist' =>$deptlist, //部门信息
            'shoplist'=>$shoplist, //分组信息
            
            
            
            
            
                    //main基本信息
            //左边
          'left'=>array(
                'One'=>array(
                    'OneName'=>'所有用户',
                    'OneUrl' =>U('AdminList'),
                ),
                'Two'=>array(
                    'TwoName'=>'考勤记录',
                    'TwoUrl'=>U('clock'),
                ),
                'Three'=>array(
                    'ThreeName'=>'操作日志',    
                ),
                
            ),
            //右边
          'right'=>array(
                 'One'=>array(
                    'OneName'=>'回收站',
                    'OneUrl' =>U('reclist'),
                    'Color'  =>'employee_menu_curr employee_menu', 
                ),
   
            ),
            
            //回收功能  没有可以不填
            'recname'=>'返回',
            'recurl'=>'Adminlist',
            
            
            
            
        ));

        $this->display();
    }



    //考勤******************************************************************************************
    public function  clock(){
        //$R=I('get.r');
        $CountDate=I('CountDate');//当前点击的月份---------------------------------------------------------
        !empty($CountDate)?'':$CountDate=date('Y-n');

        //获取到某个月的 时间蹉 。我们把他显示出来
        $date=strtotime($CountDate);

        $ThisMonth=date('n');   //当月
        $ThisYean=date('Y');  //当年
        $ThisYM=date('Y-n');  //当年当月
        
        
        //date()函数************************都是点击的当前月  而并非今天***********
        $year = date('Y', $date);     //获得年份，例如2016  
        $month = date('n',$date);     //获得月份，例如11  
        $day = date('j',$date);       //获得日期，例如3  
        $i=date('w',$date);           //获取周 例如2
        
        $t=date('t', $date);          //获取本月天数 
        $ti=strtotime($t) ;
        
        $ti2= date('Y-m-01',$date);  //获取到第几个月的第一天的时间 格式
        $ti3=  strtotime($ti2);     //获取到第几个月的第一天的时间蹉  
   

        // 通过mktime()函数和date()函数获得当月的总天数。
        //获得当月的总天数  
        $daysInMonth = date("t",mktime(0,0,0,$month,1,$year)); 

        //这个我用来测试函数是否可行：：：：OKOK  
        $bet=  $this->getDiffDate($CountDate,$ThisYM,'-');//相差月份
 
        /*******************考勤信息显示、**********************************************************************************/
        $model=D('User');
        $data=$model->clock($year,$month); 
       // var_dump($data['userList']);
       // echo '<hr>';
       //获取点击某年某月的考勤信息
        $clock=$data['clockList'];
       //var_dump($clock);
  
        /*******************end**********************************************************************************/
        //我们要把数据转化一下。同一用户。放到同一数组、
        //现在查询出来所有的用户ID 与之下面对应、
        $model=D('User');
        $UserArr=$model->field('id')->select();
        //现在把他转化为一维数组
      //  var_dump($UserArr);
        $user=array();
        foreach($UserArr as $v=>$k){
            $user[$k['id']]='';
            
        }
        
      //  var_dump($user);
     //   echo '<hr>';
        $clockOne=array();
        $userS=array();
        $test=array();//临时存储数据  将其放在USERs['天数']里面
        
        //$day=array();
             $model=D('clock');
        foreach($user as $u=>$s){ //循环用户  获取到多少用户  就循环多少次 
            
            $where['user_id']=$u;   //条件是本 【哪个】用户
            $where['year']=$year;  //条件是本年
            $where['month']=$month; //条件是本月
            $day=$model->where($where)->select();
       //     var_dump($day);echo '<hr>';
            

           $num=count($day);
                $test=array(); //格式化test数组
                
                for($i=0;$i<$num;$i++){
  
                     $test[$day[$i]['day']]=array(
                         'year'      =>$day[$i]['year'],
                          'month'    =>$day[$i]['month'],
                          'day'      =>$day[$i]['day'],
                          's_time'   =>$day[$i]['s_time'],
                          'e_time'   =>$day[$i]['e_time'],
                          'ip'       =>$day[$i]['ip'],
                          's_status' =>$day[$i]['s_status'],
                           'status'  =>$day[$i]['status'],
                           'remark'  =>$day[$i]['remark'],  
                         
                    );
                    $userS[$u]=$test;
       
                }

        }

     //     echo '<pre>';
      //   var_dump($userS);
       // var_dump($userS);
     //    exit;
        //模板页面需要的数据
        
        $this->assign(array(
            
            'hetght'=>'height: 0px',
            
            
            'year' =>$year,         //年
            'month'=>$month,        //月
            'day'   =>$day,         //日
            'i'     =>$i,           //周几
            't'     =>$t,           //每月天数
            'ti'    =>$ti3,         //当前月份第一天的时间蹉
            'bet'   =>$bet,         //当前点击的月份与此年此月相差月份
            
            'CountDate' =>$CountDate,
            
            'ThisMonth'=>$ThisMonth,
            'ThisYean'=>$ThisYean,
            'ThisYM'    =>$ThisYM, //此年此月
            
            
            
            /****************考勤数据*************************/
            'userList'=>$data['userList'],//用户基本信息
            'clockList'=>$userS,
        ));
        
   
        
        $this->display();
    }
    /********************************end**********************************************************/
    
    //
    //考勤保留 （备用）******************************************************************************************
    public function  clock_1(){
         //$R=I('get.r');
        $CountDate=I('CountDate');
        !empty($CountDate)?$CountDate:$CountDate=date('Y-M');
        echo $CountDate;
        echo '<hr>';
        //获取到某个月的 时间蹉 。我们把他显示出来
        $date=strtotime($CountDate);
        echo $date;
        echo '<hr>';
        
        !empty($R)?$R:$R=0;  //判断是否有R提交过来。否则就为当前时间 （月份）
        
        echo '<hr>';
        $M=3600*24*30;  //一个月的时间
        $time=time()-$M*$R;  //上个月今日
        echo $M; //一个月多少秒
        echo '<hr>';
        //date()函数***********************************
        $year = date('Y', $date);     //获得年份，例如2016  
        $month = date('n',$date);     //获得月份，例如11  
        $day = date('j',$time);       //获得日期，例如3  
        $i=date('w',$time);           //获取周 例如2
        $t=date('t', $date);          //获取本月天数 
        //$ti=strtotime($t) ;
        
        //$ti2= date('Y-m-01',$time);  //获取到第几个月的第一天的时间 格式
        //$ti3=  strtotime($ti2);     //获取到第几个月的第一天的时间蹉  
        //echo '<hr>';
        //echo '<hr>';
        //echo $ti3;
        //echo '<hr>';
        //echo '<hr>';

        // 通过mktime()函数和date()函数获得当月的总天数。
        //获得当月的总天数  
        $daysInMonth = date("t",mktime(0,0,0,$month,1,$year)); 
        echo $year,'年';
        echo '<hr>';
        echo    $month,'月';
        echo '<hr>';
        echo    $day,'日' ; 
        echo '<hr>';
        echo $i,'周';
        echo '<hr>';
        echo $t,'天';
       
        //模板页面需要的数据
        
        $this->assign(array(
            'year' =>$year,          //年
            'month'=>$month,        //月
            'day'   =>$day,         //日
            'i'     =>$i,           //周几
            't'     =>$t,           //每月天数
            'ti'    =>$ti3,         //当前月份第一天的时间蹉
        ));
        
        
        
        
        
        
        $this->display();
    }
    /********************************end**********************************************************/
    
    //操作日志
    public function logbook(){
        
        
        $this->display();
    }
    
    
    
    
    //计算日期差
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
  

  return array($y, $m, $d); 
}  
    //计算月份差
function getDiffDate( $date1, $date2, $tags='-' ){
 $date1 = explode($tags,$date1);
 $date2 = explode($tags,$date2);
 return abs($date1[0] - $date2[0]) * 12 + abs($date1[1] - $date2[1]);
}
    
    
}