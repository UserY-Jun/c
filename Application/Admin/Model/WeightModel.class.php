<?php 
namespace Admin\Model;
use Think\Model;
class weightModel extends Model{
	
	public function people($id)
	{
		/*$arrayName = array('ID' => $id );
		$people = Model("employee")->where($arrayName)->field("NickName");
*/
		return md5($id);
	}
}

?>