<?php
namespace Admin\Model;
use Think\Model;

class RoleModel extends BaseModel{
    
    
    /*******************自动验证**********************************/
    protected $_validate=array(
           
        array('role_name','require','角色名称不能为空'),
        
    );
    
    public function search($pagelist=6)
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
         
         $count = $this->where()->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
         $page->setConfig('header','<br /><input type="button" value="共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页">');
         
         //跟该配置文件样式
         $page->setConfig('prev', '<input type="button" value="上一页">');
         $page->setConfig('next', '<input type="button" value="下一页">');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
        
         //获取显示数据
         $show=$page->show();
        /**********  取出数据 ****************/
              $data=$this
                          ->alias('a')           //取别名     
                          ->field('a.*,GROUP_CONCAT(c.pri_name) pri_name')
                          ->join('LEFT JOIN __ROLE_PRI__ b ON a.id=b.role_id
                                  LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id
                                   ')
                          ->where($where)
                          ->order("$kb $desc_asc")
                          ->group('a.id desc')
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
         
         return array(
             'role_list' => $data,
             'showPage' =>$show
                     );
    }
    

    

    
    protected function _after_insert($data, $options) {
        $model=D('role_pri');
        $role_id=$data['id'];
        $arr=I('post.pri_id');
        
        foreach($arr as $rows){
            $model->add(array(
                'role_id'=>$role_id,
                'pri_id'=>$rows
            ));
            
        }
    }
    
    protected function _after_delete($data, $options) {
        $model=D('role_pri');
        
       $model->where(array('role_id'=>array(EQ,$data['id'])))->delete();
  
    }
    
    public function _after_update($data, $options) {
        $model=D('role_pri');
        $model->where(array('role_id'=>array(EQ,$data['id'])))->delete();
        $pri_id=I('post.pri_id');
        foreach($pri_id as $rows){
            $model->add(array('pri_id'=>$rows,
                               'role_id'=>$data['id']
                    ));
            
        }
        
    }
    
}