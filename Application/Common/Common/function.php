<?php

//封装一个下拉框函数
function buildSelect($modelName,$selectName,$valueFileName,$textFileName,$defaultValue)
  {
    //先去出下拉框的数据
    $model = M($modelName);
    $data = $model->select();
    $html = "<select name='$selectName' ><option value=''>请选择....</option>";
    foreach($data as $v){
        if($defaultValue==$v[$valueFileName])
            $secl = 'selected="selected"';
        else
            $secl=''; //option与单引号之间有一个空格
        $html .='<option '.$secl.' value="'.$v[$valueFileName].'">'.$v[$textFileName].'</option>';
    }
    $html .="</select>";
    echo $html;
    
};
 

function get_all($e,$lenth)
{
    $elem_total = count($e);
    $max = 1;
    for ($i=0; $i<$elem_total; $i++) {
        $len = count($e[$i])+1;
        $elem_size[] = $len;
        $max *= $len;
    }   
        for ($i=1; $i<$max; $i++) {
         $m = $i; 
         $item = ""; 
         $ct = 0;
            for ($j=0; $j<$elem_total; $j++) {
                $n = $m%$elem_size[$j];
                $item .= $n>0?$e[$j][$n-1].'$$':"";
                $ct += $n>0?1:0;
                $m = (int)($m/$elem_size[$j]);
                   }   
            if ($ct>=$lenth)
                $all[] = $item;
        } 
        $arr=array();
        $a=0;
        foreach($all as $k=>$v){
            $arr[$a]=substr($v, 0, -2);
            $a++;
        }
        
        
    return $arr;
}
 
//$ret = get_all($foo);
//print_r($ret);

