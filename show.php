<?php
session_start();
ob_start();
include 'init.php';
$do='';

if(isset($_GET['do'])){
    $do=$_GET['do'];
}
else{
    $do="manage";
}

if($do=='manage'){
    $id=isset($_GET['id']) && is_numeric($_GET['id'])?intval($_GET['id']):0;

    $data=getempl($id);
    $emp=getEmplId($id);
    
    
    ?>
        <div class="container">
    
           <div class="row">
         
      <div class="col-md-6">
     <?php foreach($data as $d): ?>     <div class="thumbnail">
             
          <img src="upload//<?php echo $d['img'] ?>" class="img-circle" alt="..." class="cricl" width="100%">
           <div class="caption">
            <h3><span class="text-danger">Name:</span> <?php echo $d['full_name'] ?></h3>
            <p><span class="text-danger">Email:</span> <?php echo $d['emali'] ?></p>
            <address class="text-danger"><span>Address:</span> <?php echo $d['address'] ?></address>
            <p><span class="text-danger">Description:</span> <?php echo $d['descs'] ?></p>
            <p><span class="text-danger">Nationality:</span> <?php echo $d['nationality'] ?></p>
            <p><span class="text-danger">Phone:</span> <?php echo $d['phone'] ?></p>
           <p><span class="text-danger">Price:</span> $<?php echo $d['price']   ?></p>       
           <a href="show.php?do=addOrder&id=<?php echo $d['me_id'] ?>" class="btn btn-success">add</a>      
            </div>
        </div> <?php endforeach;?>
       </div>
    </div>
    
      </div>
  
  
    
     <?php
}
elseif($do=='addOrder'){
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
    ?>
     <div class="container">
     <form method="post" action="show.php?do=addOrder&id=<?php echo $id ?>">
        <label>Enter your name name</label>
       <input type="text"
              name="name"
              required
              class="form-control" 
             >              <br>
      <label>Enter your Address</label>
       <textarea name="address" 
          required class="form-control"></textarea>
       <br>
      <label>Enter Email</label>
      <input type="email" 
              name="email"
             required
            class="form-control">
      <br>
       <label>Enter your phone</label>
       <input type="text"  required name="phone"  class="form-control">
      <br>
      <input type="submit" name="insert" id="insert" id="submit" value="Insert" class="btn btn-success">
  </form>
     </div>
    <?php

$emp=getEmplId($id);

if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $serv_id=$emp['id'];
    $emp_id=$emp['me_id'];
  
    //insert data
    $sql="INSERT INTO `orders` (serv_id,me_id,names,phone,locations,email)
      values (:serv_id,:me_id,:names,:phone,:locations,:email)
    ";
    //prepare the ssql
    $stmt=$con->prepare($sql);
    $data=[
      'serv_id'=>$serv_id,
      'me_id'=>$emp_id,
      'names'=>$name,
      'locations'=>$address,
      'email'=>$email,
      'phone'=>$phone
    
  
  ];
    //execute the query
    $stmt->execute($data);
    if($stmt){
        $msg= "<div class='alert alert-success'>your orders added successfully</div>";
           redircthome($msg,'index.php');
    }
    
    
  }
}
else{
    echo 'page not fount';
}

include 'include/footer.php';

?>