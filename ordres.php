<?php
session_start();
include 'init.php';
$ckeckemp=ckeckemp($_SESSION['user']);
if($ckeckemp){
    $stmt=$con->prepare("SELECT * from orders where me_id=?");
		 $stmt->bindparam(1,$_SESSION['id']);
		 $stmt->execute();
         $data=$stmt->fetchall();
         //show the data in ui
     ?>
      <ul class="list-group">
         <?php foreach($data as $d):?>
          <li class="list-group-item"><?php echo $d['names'] ?></li>
         <?php endforeach;?> 
      </ul>
 
    <?php
}




include 'include/footer.php';
?>