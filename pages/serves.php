<?php

include '../init.php';
// include '../include/header.php';
 include '../include/header.php';







$do='';

if(isset($_GET['do'])){
	$do= $_GET['do'];
}
else{
$do='manage';
}
if($do==='manage'){
	$data=DB::getAll('serv');
	$count=rowcount('serv');
	// echo $count;

foreach($data as $d){
	?>
	
<!-- 	<div class="list-group">
  <a href="#" class="list-group-item active">
    Cras justo odio
  </a>
  <a href="#" class="list-group-item"><?php echo $d['name_serves'] ?></a>
 
</div> -->
<div class="list-group">
  <button type="button" class="list-group-item">Cras justo odio</button>
  <button type="button" class="list-group-item">Dapibus ac facilisis in</button>
  <button type="button" class="list-group-item">Morbi leo risus</button>
  <button type="button" class="list-group-item">Porta ac consectetur ac</button>
  <button type="button" class="list-group-item">Vestibulum at eros</button>
</div>
<!-- <div class="well">
	
		<ul class="list-group">
  <li class="list-group-item"><?php echo $d['name_serves'] ?>
  	
  </li>

</ul>
</div>
 -->
	 
	 
	<?php
}
}
elseif($do==='create'){
	echo 'create';
}
elseif($do==='add'){
	$data=[
		   'name_serves'=>'cut here',
      'descs'=>'nnice jop'
      
	];
	$user=new user();
	$user->save($data);
	//$add=DB::getInstace()->insert('serv',$data);
	if($user){
		echo 'add success';
	}
	else{
		echo 'errors';
	}
}
elseif($do==='edit'){
	$data=[
		   'name_serves'=>'cut here',
      'descs'=>'nice jop'
      
	];
	$edit=$user->update(1,$data);
	//$edit=db::getInstace()->update('serv','id',6,$data);
	if($edit){
		echo 'data update success';
	}
	else{
		echo 'error';
	}
}
elseif($do==='update'){
	echo 'update';
}
elseif($do==='delete'){
	//$del=db::getInstace()->delete('serv',['id','=',5]);
	$del=$user->delete(7);

	if($del){
		echo 'data delted success';
	}else{echo 'error';}
}
else{
	echo 'page not found';
}
?>
