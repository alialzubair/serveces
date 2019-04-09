<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="layout/css/style.css">
    <title>Document</title>
</head>
<body>
 <div>
  
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">website</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="services.php">services</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="connent.php">connect Us</a></li>
        
         </ul>
      <?php
        if(isset($_SESSION['user'])){

      

           //check the admin
           $admin=admin($_SESSION['user']);
           if($admin==1){?>
                
<ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"><b class="text-danger">welcome</b> <b class="text-info"><?php echo $_SESSION['user']; ?></b></a>
 
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">menu<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="admin/index.php">go to Dashbord</a></li>
    <li><a href="profile.php">MY Profile</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php">logout</a></li>
  </ul>
<?php
           }
    //check if employee
    $ckeckemp=ckeckemp($_SESSION['user']);
    if($ckeckemp){?>
      <ul class="nav navbar-nav navbar-right">
<li><a href="profile.php"><b class="text-danger">welcome</b> <b class="text-info"><?php echo $_SESSION['user']; ?></b></a>
 
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="ordres.php">MY Orders</a></li>
    <li><a href="profile.php">MY Profile</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="logout.php">logout</a></li>
  </ul>

    
      
   <?php }
      
         
        }
        else{?>
           <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">login</a>
      </li>
      <li><a href="register.php">Sing Up</a>
       </li>
  

       <?php }
      
      ?>
      
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    
