<?php
namespace Admin\Model;
use Think\Model;

class TypeModel extends BaseModel{
    
    
        //设定添加时允许接受的字段
     protected $insertFields = array('type_name');
    //设定修改时允许接受的字段
     protected $updateFields = array('id','type_name');
     
     
     protected $_validate = array(
     array('type_name','require','类型名称不能为空!'),
       );

    
     public function search($pagelist=6,$recOns=0){
              
        /********  分页数据 *************/
         //import('ORG.Util.Page');
         //$where['type']=$_GET['type'];
         
         $count = $this->where()->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参
         
         $page->setConfig('header','<br /><input type="button" value="共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页">');
         
         //跟该配置文件样式
         $page->setConfig('prev', '<input type="button" class="page" value="上一页">');
         $page->setConfig('next', '<input type="button" class="page" value="下一页">');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
        
         //获取显示数据
         $show=$page->show();
        /**********  取出数据 ****************/
              $data=$this
                          ->alias('')           //取别名     
                          ->field('')
                          ->join('')
                          ->where($where)
                          ->order("")
                          ->group('')
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
         
         return array(
             'typelist' => $data,
             'showPage' =>$show
                     );
         
     }
    
    
     public function _before_delete($options) {
         
         if($where['type_id']=$options['where']['id']){
             $model=D('Attribute');
             $model->where($where)->delete();
         }
         
         
     }
     

    
}