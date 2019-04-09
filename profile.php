<?php
session_start();
include 'init.php';

//check the account
 $admin=admin($_SESSION['user']);
 if($admin){
    $stmt=$con->prepare("SELECT members.*,serv.* from members
    JOIN serv ON
    members.serv_id=serv.id where members.me_id=?");
    $stmt->bindparam(1,$_SESSION['id']);
    $stmt->execute();
    $admin=$stmt->fetchall();
     //set all your data of admin
    ?>
     <div class="container">
     <div class="row">
      <!-- row 4 -->
    <div class="col-md-4">
  
    </div>
    <!-- row 8 -->
     <div class="col-md-8">
         <div class="panel panel-default">
          <div class="panel-heading">
     <h3 class="panel-title"><?php echo $_SESSION['user']?> profile</h3>
          </div>
          <div class="panel-body">
            <?php foreach($admin as $a):?>
              <div class="col-sm-6">
    <div  align="center"> <img alt="User" src="upload/<?php echo $a['img'] ?>" class="img-circle img-responsive"> 
    </div>
              <br>
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
               <a href="edit_admin.php" class="btn btn-success btn-sm pull-right">Edit My Profile</a>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $a['full_name'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $a['emali']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital">serves:</div><div class="col-sm-7"><?php echo $a['name_serves'] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?php echo $a['address'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?php echo $a['phone'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >price:</div><div class="col-sm-7"><?php  echo $a['price']?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7"><?php echo  $a['nationality'] ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender
:</div><div class="col-sm-7"><?php  echo $a['Gender'] ?></div>

            <?php endforeach;?>
          </div>
        </div> 
     </div>

    </div>
    </div>
         
    <?php
 }

 //check the empl account
 $ckeckemp=ckeckemp($_SESSION['user']);
 if($ckeckemp){
     //set all your data of emplyee
   $stmt=$con->prepare("SELECT members.*,serv.* from members
   JOIN serv ON
   members.serv_id=serv.id where members.me_id=?");
    $stmt->bindparam(1,$_SESSION['id']);
    $stmt->execute();
    $admin=$stmt->fetchall();
     //set all your data of admin
    ?>
     <div class="container">
     <div class="row">
      <!-- row 4 -->
    <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">my stataus</h3>
          </div>
          <div class="panel-body">
              <form action="profile.php" method="post">

              <input type="submit" class="btn btn-success" name="online"  value="online">
              <input type="submit" class="btn btn-danger"  name="ofline"  value="ofline">
              </form>
            
            

               <?php
                 if(isset($_POST['online']))
                 {
                     $sql="UPDATE members set status=1 where me_id='{$_SESSION['id']}' ";
                     $stmt=$con->prepare($sql);
                     $stmt->execute();
                     if($stmt){
                       echo '<div class="alert alert-success">you online now</div>';
                       header("refresh:3");
                     }
                 }
                 if(isset($_POST['ofline']))
                 {
                     $sql="UPDATE members set status=0 where me_id='{$_SESSION['id']}' ";
                     $stmt=$con->prepare($sql);
                     $stmt->execute();
                     if($stmt){
                       echo '<div class="alert alert-success">you ofline now</div>';
                       header("refresh:3");
                     }
                 }

               
               ?>
          </div>
        </div>
    </div>
    <!-- row 8 -->
     <div class="col-md-8">
         <div class="panel panel-default">
          <div class="panel-heading">
     <h3 class="panel-title"><?php echo $_SESSION['user']?> profile</h3>
          </div>
          <div class="panel-body">
            <?php foreach($admin as $a):?>
              <div class="col-sm-6">
              <?php
               echo "<div><img src='upload/ ".$a['img']."' /></div>";
              
              ?>
               


              <br>
              <!-- /input-group -->
              
            </div>
            <div class="col-sm-6">
               <a href="edit_empl.php" class="btn btn-success btn-sm pull-right">Edit My Profile</a>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $a['full_name'] ?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $a['emali']; ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital">serves:</div><div class="col-sm-7"><?php echo $a['name_serves'] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?php echo $a['address'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone:</div><div class="col-sm-7"><?php echo $a['phone'] ?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >price:</div><div class="col-sm-7"><?php  echo $a['price']?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7"><?php echo  $a['nationality'] ?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender
:</div><div class="col-sm-7"><?php  echo $a['Gender'] ?></div>

            <?php endforeach;?>
          </div>
        </div> 
     </div>

    </div>
    </div>
    
  
 <?php }



include 'include/footer.php';
?>
