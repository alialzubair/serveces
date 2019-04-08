<?php
include '../init.php';

$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;



$data=getEmplId($id);
 
 print_r($data);
// foreach($data->result() as $d){

// 	$serv_id=$d->id;
// 	$me=$d->me_id;
// 	$name='ahmed ali osman';
// 	$address='sudan';
// 	$tel='099888';
// 	// echo $serv_id;
// 	// echo $me;
// 	$addcart=db::getInstace()->insert('orders',[
//    'serv_id'=>$serv_id,
//    'me_id'=>$me,
//    'name'=>$name,
//    'phpone'=>$tel,
//    'address'=>$address
// ]);	
//  if($addcart){
// 	echo "<script>alert('the orders add success')</script>";
// 	header("location:../index.php");
// }
// else{
// 	echo 'errors';
// }
// }

// print_r($data);

// $addcart=db::getInstace()->insert('orders',[
//    'serv_id'=>1,
//    'me_id'=>9
// ]);	

// if($addcart){
// 	echo 'add';
// }
// else{
// 	echo 'errors';
// }