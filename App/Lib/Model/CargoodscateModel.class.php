<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class CargoodscateModel extends Model{

	protected $_validate = array(
		array('title', 'require', '名称填写不对！'), //
	);
	protected $_auto = array ( 
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
		array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	function addCargoodscate(){
		if($this->custom_insert()){
			D("Table")->updateTable("cargoodscate");
						return $this->add();			
		}else{
			return false;
		}
	}

	function saveCargoodscate(){
		if($this->custom_update()){
			D("Table")->updateTable("cargoodscate");
						return $this->save();
		}else{
			return false;
		}
	}

	function deleteCargoodscate(){
		if($this->custom_delete()){
			$id = $this->options["where"]["id"];
			D("Table")->updateTable("cargoodscate");
			return $this->delete();
		}else{
			return false;
		}
	}

	function custom_insert(){
		$this->fixarray();
				return true;
	}

	function custom_update(){
		$this->fixarray();
				return true;
	}

	function custom_delete(){
				return true;
	}
	
	function fixarray(){
		foreach ($this->data as $key => $value) {
			if(is_array($value)){
				$this->data[$key] = implode(",", $this->data[$key]);
			}
		}
	}

	function __get($property_name){
		if($property_name == 'field_pid'){
			$list = tree_to_list2(list_to_tree(D("Cargoodscate")->select()));
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["title"];
			}
			return $result;
		}
	}
}
?>