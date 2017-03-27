<?php
namespace Admin\Model;
use \Think\Model;
class AttributeModel extends BaseModel{
    //设定添加时允许接受的字段
     protected $insertFields = array('attr_name','type_id','attr_type','attr_option_values');
    //设定修改时允许接受的字段
     protected $updateFields = array('id','attr_name','type_id','attr_type','attr_option_values');
     
     
     protected $_validate = array(
        array('attr_name','require','类型名称不能为空!'),
       );

     
     
     
        public function search($pageList=3) {
              //接收分类Id
       $typeId = I('get.type_id');
       $where = array();
       if($typeId){
           $where['type_id'] = $typeId;
       }
        /************实现商品的分页*****************/
       $count = $this->alias('a')->where($where)->count();
       $Page  = new \Think\Page($count,$pageList);
       $Page->setConfig('prev','上一页');
       $Page->setConfig('next','下一页');
       $pageString = $Page->show();
       //获取商品的数据
       $data = $this->alias('a')
               ->field('a.*,b.type_name')
               ->join('LEFT JOIN __TYPE__ b on a.type_id=b.id')
               ->where($where)
               ->limit($Page->firstRow.','.$Page->listRows)
               ->select();
        
       return array(
           'data'=>$data,
           'pageString'=>$pageString
           );
   }           
   
     
   public function _after_delete($data, $options) {
       $model=D('pro_attr');
       
       $where['attr_id']=$options['where']['id'];
       $model->where($where)->delete();
       
       
   }

     
     
     
     
}