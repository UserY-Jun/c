<?php
namespace Admin\Model;
use Think\Model;

class StockModel extends BaseModel{
    
        //设定修改时允许接受的字段
     protected $updateFields = array('id','stock_num','location','a_stoct','remark','batch_number');
    //查询商品的信息 (基于库存)
    
      protected $_validate = array(
        array('attr_name','require','类型名称不能为空!'),
       );
    
    
    
      public function search($pagelist=5,$recOns=0)
    { 

        /**********  查询数据****模糊查询  *******************/
        // 1 模糊查询
            $keyword=I('get.keywords');
           
            if($keyword){  //判断是否有提交值
                $where['_string']="(outer_id like '%$keyword%') OR(title like '%$keyword%')"; // 将获取的值带入模糊查询where条件
                 
            }
            /*   //2 价格区间
            $Pmin=I('get.Pmin');  //最小值
            $Pmax=I('get.Pmax');  //最大值
            if($Pmin && $Pmax)    //同时接收到数据
                $where['shop_price']=array('BETWEEN',array($Pmin,$Pmax)); //带入条件
            elseif($Pmin)        //只填写了最小值
                $where['shop_price']=array('EGT',$Pmin);                  //带入条件
            elseif($Pmin)       //只填写了最大值
                $where['shop_price']=array('ELT',$Pmax);                  //带入条件     
               
               */
             
       /***********************升序降序**************************************/
     /*      $kb='id';$desc_asc='asc';
            $ob=I('get.ob');
            if($ob=='price_desc')
            {   
                $kb='shop_price';
                $desc_asc='desc';
            }elseif($ob=='price_asc')
              {
                $kb='shop_price';
                $desc_asc='asc';
              };*/
            //获取分类
             $cat_id=I('get.cat_id');    
            
             if($cat_id){
               $where['cat_id']=$cat_id;
               
             }
         /********  分页数据 *************/
         //import('ORG.Util.Page');
         //$where['type']=$_GET['type'];
  /*      $model=D('sku');
             
         $count = $model->where()->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参 
         $page->setConfig('header','<a class="pages">共%TOTAL_ROW%条记录  第%NOW_PAGE%页/共%TOTAL_PAGE%页<a/>');
         //跟该配置文件样式
         $page->setConfig('prev', '<input type="button" value="上一页">');
         $page->setConfig('next', '<input type="button" value="下一页">');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% ');
    */    
        $model=D('sku');
             
         $count = $model
                 ->alias('b')
                 ->where($where)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                 ->join('LEFT JOIN __PRODUCTS__ a ON a.id=b.pro_id
                       
                       ')
                 ->count();        //获取总页数
         $page=new \Think\Page($count,$pagelist); //实例化分页类并传参 
         $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
         //跟该配置文件样式
         $page->setConfig('prev','上一页');
         $page->setConfig('next','下一页');
         $page->setConfig('last','末页');  
         $page->setConfig('first','首页');
         $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%'); 


         $page->parameter=I('get.');
         //获取显示数据
         $show=$page->show();
        /**********  取出数据 ****************/
            /*
         
              $data=$model
                          ->alias('b')           //取别名   
                      //    ->join('LEFT JOIN __SKU__ b ON a.id=b.pro_id')
                          ->where($where)
                                 
                           ->field('a.*,b.spec,one,c.*')
                           ->join('LEFT JOIN __PRODUCTS__ a ON a.id=b.pro_id
                              LEFT JOIN __STOCK__ c ON b.id=c.sku_id
                                ')
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
         */
         
                        //测试时间--------------
                       // $model=D('');
                       $data=$model
                          ->alias('b')           //取别名   
                      //    ->join('LEFT JOIN __SKU__ b ON a.id=b.pro_id')
                          ->where($where)
                                 
                           ->field('a.sm_logo,outer_id,b.*')
                           ->join('LEFT JOIN __PRODUCTS__ a ON b.pro_id=a.id           
                                ')  //   LEFT JOIN __STOCK__ c ON b.id=c.sku_id 
                          ->limit($page->firstRow,$page->listRows)
                          ->select();
                       $where=array();//清空where
                       $data_=array();
                       
                       
                       $a_=1;
                       
                       foreach($data as $k=>$v){
                           $data_[$a_].=",".$v['id'];     
                       }
                    
                       
                       
                    $model=D('stock');    
                    if(!empty($data)){
                        $data_[0]='in'; 
                        $where['sku_id']=$data_;
                        $stock_data=$model->field('stock_num,sku_id')->where($where)->select();   
                    }
                  

                    foreach($stock_data as $v=>$k){
                        foreach($data as $l=>$m){
                            if($m['id']==$k['sku_id']){
                                $data_[$l]=array_merge($data[$l],$stock_data[$v]);
                            } 
                        }
                    }

         return array(
             'pro_list' => $data_,
             'showPage' =>$show
           //  'showPage' =>$p
                     );
    } 
    
    public function EditData($sku_id){
           $model=D('sku');
           $where['sku_id']=$sku_id;
           $data=$model
                   ->alias('a')
                   ->field('a.spec,b.*,c.outer_id,d.cat_name')
                   ->where($where)
                   ->join('LEFT JOIN __STOCK__ b ON a.id=b.sku_id   
                           LEFT JOIN __PRODUCTS__ c ON a.pro_id=c.id
                           LEFT JOIN __CATION__ d ON c.cat_id=d.id
                            ')
                   ->find();
           return $data;
        
    }
    
    
    
}

 