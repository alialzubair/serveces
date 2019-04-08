<?php
 include 'init.php';

 $do='';

 if(isset($_GET['do'])){
     $do=$_GET['do'];
 }
 else{
     $do='manage';
 }
 if($do=='manage'){
    $allData=DB::getInstace()->all('message');
   ?>
   <div class="container">
       <?php foreach($allData->result() as $m):?>
       <div class="well">
       <h1>Title:<?php echo $m->title ?></h1>
        <p class="lead">Measseg: <?php echo $m->message ?></p>
        <small>Send By: <?php echo $m->name ?></small><br>
        <strong>Time Send: <?php  echo $m->create_at ?></strong><br>
        <a class="btn btn-danger confirm" href="?do=delete&id=<?php echo $m->id ?>">Delete </a>

       </div>
       

 <?php endforeach;?>
   </div>


<?php
 }

 elseif($do=="delete"){
     $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
     

      $delete=DB::getInstace()->delete('message',['id','=',$id]);
      if($delete){
          echo 'message delete';
          header("location:index.php");

      }

  
     
 }

?>