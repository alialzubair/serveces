<?php
session_start();

include 'init.php';
$data=getall('serv');
$count=rowCountc('serv');
?>
<div class="container">
	 	<h1>Servecie</h1>
	 <div class="list-group">
		  <a href="#" class="list-group-item active">
		      <i class="
		glyphicon glyphicon-wrench"></i> Services
			</a>
			<?php
			   if($count>0){?>
                 <?php foreach($data as $w): ?>
			<img src="admin/uploadServes/<?php echo $w['img'] ?>" alt="ali">
	  <a href="show.php?do=manage&id=<?php echo $w['id'] ?>" class="list-group-item"><?php echo $w['name_serves'] ?></a>
			

	
	   <?php endforeach; ?>
			   <?php }
			   else{
				   echo 'the servrs not';
			   }
			
			?>
			
    </div>
</div>

<?php include 'include/footer.php'; ?>