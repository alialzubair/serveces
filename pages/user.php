<?php

class User{

	public function save($data=array()){
		$add=DB::getInstace()->insert('serv',$data);

		return $data;

	}
	public function update($id,$data=[]){
		$edit=db::getInstace()->update('serv','id',$id,$data);

		return $edit;
	}
	public function delete($id){
		$delete=db::getInstace()->delete('serv',['id','=',$id]);

		return $delete;
	}
}