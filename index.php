<?php
ob_start();
session_start();
include 'init.php';

$data=getall('serv');
?>
<div class="container">
  <div class="row">

   <div class="col-md-9 col-sm-12">
     <!-- center -->
         <!--start carousel-->
      
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/1.jpeg" alt="Chania" width=100% class="img-responsive img-thumbnali">
     
    </div>

    <div class="item">
      <img src="image/2.jpeg" width=100% class="img-responsive img-thumbnali" alt="Chicago">
     
    </div>


    <div class="item">
      <img src="image/3.jpeg" width=100%>
      
    </div>
  </div>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
	  
       <!-- right sidebar -->
   <div class="col-md-3">

<div class="list-group">
  <a href="#" class="list-group-item active">
    Serves
  </a>
	<!-- loopt throw data -->
	<?php foreach($data as $d): ?>
	<a href="show.php?do=manage&id=<?php echo $d['id'] ?>" class="list-group-item"><?php echo $d['name_serves'] ?></a>


<?php endforeach;?>
</div>
   </div>
  </div>
</div>
  <!--end carousel-->
   </div>
  </div>
  <hr>
  <div class="row">
	  <div class="col-md-12">
	  <img src="1.jpeg" width=100% alt="">
  </div>
	  </div>
    <hr>
    <div class="container">
	  <div class="row">
	  <div class="col-md-6">
       <h1>what coustomers say</h1>
       
  </div>
	  <div class="col-md-6">
	  <img src="1.jpeg" width=100% alt="">
  </div>
	  </div>
  </div>
</div>

    </div>


<?php include 'include/footer.php'; ?>
 

