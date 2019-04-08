<?php
session_start();
include 'init.php';
$ckeckemp=ckeckemp($_SESSION['user']);

if($ckeckemp){
    $stmt=$con->prepare("SELECT members.*,serv.* from members
    JOIN serv ON
    members.serv_id=serv.id where members.me_id=?");
    $stmt->bindparam(1,$_SESSION['id']);
    $stmt->execute();
    $d=$stmt->fetch();
    ?>
     <div class="container">
     <h1 class='text-center text-success'>Edit profile</h1>
     <!-- panel -->
     <div class="panel panel-primary">
  <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i>edit <?php echo $_SESSION['user']?> profile</strong></div>
  <div class="panel-body">
   <form action="edit_empl.php" method="post">
   <input type="hidden" name="id" value="<?php echo $d['me_id'] ?>">
       <!-- strat username -->
       <div class="form-group">
       <label class="control-label">username</label>
       <input type="text" name="username" 
         value="<?php echo $d['full_name'] ?>"
       required class="form-control">
     </div>
     <!-- start password -->
     <div class="form-group">
       <label class="control-label">password</label>
       <input type="password" name="pass" required class="form-control">
     </div>
     <!-- check password -->
     <!-- start email -->
     <div class="form-group">
       <label class="control-label">email</label>
       <input type="email"  name="email"
       value="<?php echo $d['emali'] ?>"
        required class="form-control">
     </div>
     <!-- start phone -->
     <div class="form-group">
       <label class="control-label">phone</label>
       <input type="text" name="phone"
       value="<?php echo $d['phone'] ?>" 
       required class="form-control">
     </div>
     <!-- strat address -->
     <div class="form-group">
       <label class="control-label">address</label>
       <input type="text" name="address" 
       value="<?php echo $d['address'] ?>"
       required class="form-control">
     </div>
     <!-- strat price -->
     <div class="form-group">
       <label class="control-label">price</label>
       <input type="number" name="price" required 
       value="<?php echo $d['price'] ?>"
       class="form-control">
     </div>
     <!-- strat nationality -->
     <div class="form-group">
       <label class="control-label">nationality</label>
       <input type="text" name="nationality" required 
       value="<?php echo $d['nationality'] ?>"
       class="form-control">
     </div>
     <!-- strat nationality -->
     <div class="form-group">
       <label class="control-label">Gender</label>
         <select name="Gender" class="form-control">
          <option value="<?php echo $d['Gender'] ?>"><?php echo $d['Gender'] ?></option>
           <option value="female">female</option>
           <option value="male">male</option>
         </select>
     </div>
     
     
     
     <div class="form-group">
     
         <input type="submit" name="edit" class="btn btn-primary" value="Edit profile">
     </div>
   
   </form>

  </div>
</div>
     </div>
     </div>



    <?php
    if(isset($_POST['edit'])){
        $ids=$_POST['id'];
        $name=$_POST['username'];
        $pass1=$_POST['pass'];
        $shapass=sha1($pass1);
        $email=$_POST['email'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $price=$_POST['price'];
        $Gender=$_POST['Gender'];
        $nationality=$_POST['nationality'];
       // $chose=$_POST['chose']; 
          //add the data to database
       
     
          //save the data
          $sql="UPDATE members set full_name='{$name}', password='{$shapass}',emali='{$email}',phone='{$phone}',address='{$address}', price='{$price}',Gender='{$Gender}',nationality='{$nationality}' where me_id='{$ids}'";
          $stmt=$con->prepare($sql);
        //   $data=[
        //     $name,
        //     $shapass,
        //     $email,
        //     $chose,
        //     $phone,
        //     $address,
        //     $price,
        //     $ids
    
        // ];
          $stmt->execute();
     
          if($stmt){
              echo '<div  class="alert alert-success">prfile updated successfully</div>';
             //  header("location:?do=create");
          }
          else{
              echo 'some errors ';
          }
       }
   

}
include 'include/footer.php';
?>