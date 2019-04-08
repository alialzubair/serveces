<?php
session_start();

include 'init.php';


$data=getall('serv');
?>
<div class="container">
	 	<h1>Servecie</h1>
	 <div class="list-group">
		  <a href="#" class="list-group-item active">
		      <i class="
		glyphicon glyphicon-wrench"></i> Services
			</a>
			
			<?php foreach($data as $w): ?>
				<?php if(!empty($w['name_serves'])):?>
				<img src="admin/uploadServes/<?php echo $w['img'] ?>" alt="ali">
		  <a href="show.php?do=manage&id=<?php echo $w['id'] ?>" class="list-group-item"><?php echo $w['name_serves'] ?></a>
				
<?php else:?>
   <h1>data not found</h1>
<?php endif;?>
		
		   <?php endforeach; ?>
    </div>
</div>

<?php include 'include/footer.php'; ?>