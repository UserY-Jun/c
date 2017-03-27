<?php
namespace Admin\Model;
use Think\Model;

class SkuModel extends BaseModel{
    public function _after_insert($data, $options) {
        $model=D('Stock');
       
        $model->add(array(
            'sku_id'    =>$data['id']  
        ));
 
    }
    

    
    
    
    
    
    
}