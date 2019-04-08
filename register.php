<?php
ob_start();
	include 'init.php';

?>

 <div class="container">
	<!-- grid the page -->
	<div class="row">
<div class="col-md-12">
<!-- set the form inside panel -->
<div class="panel panel-primary">
 <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i> sing up</strong>  </div>
	 <form action="register.php" method="post" enctype="multipart/form-data">
	 
	 <div class="panel-body">
	 <!-- strat user name -->
			<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	 <input type="text" class="form-control"
		placeholder="write Username" 
		name="username" required
		aria-describedby="sizing-addon1">
 </div>	<br>
	 <!-- strat  fullname -->
			<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	 <input type="text" class="form-control"
		placeholder="write fullname" 
		name="fullname" required
		aria-describedby="sizing-addon1">
 </div>	<br>
 <!-- strat password -->
		<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
	 <input type="password" 
					class="form-control"
					name="password1" required
					 placeholder="write password" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- check password -->
		<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
	 <input type="password" 
					class="form-control"
					name="password2" required
					 placeholder="confirm password" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start email -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
	 <input type="email" 
					class="form-control"
					name="email" required
					 placeholder="write your email" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start address -->
		<div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="
glyphicon glyphicon-home"></i></span>
	 <input type="text" 
					class="form-control"
					name="address" required
					 placeholder="write your adddress" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start phone -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-phone-alt"></i></span>
	 <input type="text" 
					class="form-control"
					name="phone" required
					 placeholder="write your phone" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start chose servers -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-shopping-cart
"></i></span>
<select name="chose" class="form-control">
         <option value="0">chose servese</option>
          <?php     
          
          $all=getall('serv');
          foreach($all as $a){
              ?>
               <option value="<?php echo $a['id'] ?>"><?php echo $a['name_serves'] ?></option>
              <?php
          }
          ?>
       
     
        
        </select>
 </div>	
 <br>
 <!-- start price -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
	 <input type="number" 
					class="form-control"
					name="price" required
					 placeholder="write your price" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- start Gender -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
	 <select name="Gender" class="form-control">
	  <option value="female">female</option>
	  <option value="male">male</option>
	   
	 </select>
 </div>	
 <br>
 <!-- start nationality -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
	 <input type="text" 
					class="form-control"
					name="nationality" required
					 placeholder="write your nationality" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>
 <!-- strat file -->
 <div class="input-group input-group-lg">
	 <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
	 <input type="file" 
					class="form-control"
					name="img" 
					 placeholder="write your price" 
					 aria-describedby="sizing-addon1">
 </div>	
 <br>


 <input type="submit" 
				name="sing" class="btn btn-primary btn-block" 
				value="sing up">
	 </form>
 </div>
</div>	 
 </div>
</div>
</div>

<?php
if(isset($_POST['sing'])){
	   $filename = $_FILES['img']['name'];
		$filesize = $_FILES['img']['size'];
		$filetype = $_FILES['img']['type'];
		 $file_tmp=$_FILES['img']['tmp_name'];
		

		//list of allowd filestype to upload
		$fileallowd=array('png','jpg','jpeg');
		
		//get the extension
		@$fileextension=strtolower(end(explode('.',$filename)));
		
		if(!empty($filename)&& ! in_array($fileextension,$fileallowd)){
		
		  echo 'this extension is not allowd';
		
		
		}
		elseif(empty($filename)){
		
		 echo 'file cannt be empty';
		
		}
		else{
		
			$myfile=rand(0,1000000) . '_'.$filename;
		
			 move_uploaded_file($file_tmp, "upload//".$myfile);
		
		}
   //set the value of form
  $name=$_POST['username'];
  $fullname=$_POST['fullname'];
  $pass1=$_POST['password1'];
  $pass2=$_POST['password2'];
  $shapass=sha1($pass1);
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $price=$_POST['price'];
  $Gender=$_POST['Gender'];
  $nationality=$_POST['nationality'];

	$chose=$_POST['chose'];
	$check=checkname($name);
	if($check){
		echo "<script>alert('the name exist in database')</script>";

	}
  
  elseif($pass1 !=$pass2){
		echo "<script>alert('password not match')</script>";
  }
  else{
     //add the data to database
    
		//save the data
		$sql="INSERT into members (name,emali,password,phone,address,price,full_name,Gender,nationality,serv_id,img) values(:name,:emali,:password,:phone,:address,:price,:full_name,:Gender,:nationality,:serv_id,:img)";

		//prepare the query
		$stmt=$con->prepare($sql);
		$data=[
			'name'=>$name,
			'password'=>$shapass,
			'emali'=>$email,
			'serv_id'=>$chose,
			'phone'=>$phone,
			'address'=>$address,
			'price'=>$price,
			'full_name'=>$fullname,
			'Gender'=>$Gender,
			'nationality'=>$nationality,
			'img'=>$myfile


	];

		//execute the query
		$stmt->execute($data);
		if($stmt){
			$msg= "<div class='alert alert-success'>your account added successfully</div>";
			redircthome($msg,"index.php");
		}
}
}

?>

<?php include 'include/footer.php' ?>
