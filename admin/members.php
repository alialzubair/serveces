<?php
include 'init.php';

//use the class of allAction to work it database


//set the var of page
$do='';

// check the get method =do
if(isset($_GET['do'])){
    $do= $_GET['do'];
}
else{
    $do='manage';
}

//make the all pages
if($do=='manage'){
    $allData=DB::getInstace()->query('SELECT members.*,serv.* from members
    JOIN serv ON
    members.serv_id=serv.id where groups !=1');
    ?>
    <h1 class="text-success text-center">Show All Serves</h1>
    <div class="container">
    <a href="members.php?do=create" class="btn btn-info">Add Emploee</a>
    <hr>

    <div class="table-responsive">
     <table class="table table-bordered table-hover">

      <tr>
      
         <td>member_id</td>
         <td>name</td>
         <td>email</td>
         <td>servers</td>
         <td>phone</td>
         <td>address</td>
         <td>price</td>
         <td>image</td>
         <td>create_at</td>
         <td>edit</td>
         <td>delete</td>
         
       

      </tr>
      <?php foreach($allData->result() as $d): ?>
<tbody id='myTable'>
    <tr>
        <td><?php echo $d->me_id ?></td>
        <td><?php echo $d->name ?></td>
        <td><?php echo $d->emali ?></td>
        <td><?php echo $d->name_serves ?></td>
        <td><?php echo$d->phone ?></td>
        <td><?php echo $d->address ?></td>
        <td><?php echo $d->price ?></td>
        <td><?php echo $d->img ?></td>
        <td><?php echo $d->create_at ?></td>
                
      <td>
        <a href="?do=edit&id=<?php echo $d->me_id ?>" class="btn btn-success">Edit</a>
        
     </td>
        <td>
        <a href="?do=delete&id=<?php echo $d->me_id ?>" class="btn btn-danger confirm">Delete</a>
        </td>

    </tr>
</tbody>

    <?php endforeach;?>
     </table>


    </div>
    </div>

    <!--  -->
    <?php
 
}
elseif($do==='create'){?>
  <!-- make the form to add the cat -->
  <h1 class="text-info">Add New Serves</h1>
    <div class="container">
 
     <!-- panel -->
     <div class="panel panel-primary">
  <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i> login form</strong>  </div>
  <div class="panel-body">
   <form action="members.php?do=create" method="post">
       <!-- strat username -->
       <div class="form-group">
       <label class="control-label">username</label>
       <input type="text" name="username" required class="form-control">
     </div>
         <!-- strat fullname -->
         <div class="form-group">
       <label class="control-label">fullname</label>
       <input type="text" name="fullname" required class="form-control">
     </div>
     <!-- start password -->
     <div class="form-group">
       <label class="control-label">password</label>
       <input type="password" name="pass" required class="form-control">
     </div>
     <!-- check password -->
     <div class="form-group">
       <label class="control-label">confirm password</label>
       <input type="password" name="checkPass" required class="form-control">
     </div>
     <!-- start email -->
     <div class="form-group">
       <label class="control-label">email</label>
       <input type="email" name="email" required class="form-control">
     </div>
     <!-- start phone -->
     <div class="form-group">
       <label class="control-label">phone</label>
       <input type="text" name="phone" required class="form-control">
     </div>
     <!-- strat address -->
     <div class="form-group">
       <label class="control-label">address</label>
       <input type="text" name="address" required class="form-control">
     </div>
     <!-- strat price -->
     <div class="form-group">
       <label class="control-label">price</label>
       <input type="number" name="price" required class="form-control">
     </div>
     <!-- start chose sreves -->
     <div class="form-group">
       <label class="control-label">chose serves</label>
        <select name="chose" class="form-control">
         <option value="0">chose servese</option>
          <?php     
          
          $all=DB::getInstace()->query('SELECT * from serv');
          foreach($all->result() as $a){
              ?>
               <option value="<?php echo $a->id ?>"><?php echo $a->name_serves ?></option>
              <?php
          }
          ?>
       
     
        
        </select>
     </div>
     <div class="form-group">
       <label class="control-label">chose image</label>
         <input type="file" name="img" class="form-control-file">
     </div>
     <div class="form-group">
     
         <input type="submit" name="add" class="btn btn-primary" value="Add New Member">
     </div>
   
   </form>

  </div>
</div>	
     <!-- end panel -->
    </div>
 <?php 
if(isset($_POST['add'])){
  //set the value of form
  $name=$_POST['username'];
  $fullname=$_POST['fullname'];
  $pass1=$_POST['pass'];
  $pass2=$_POST['checkPass'];
  $shapass=sha1($pass1);
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $price=$_POST['price'];
  $chose=$_POST['chose'];
  if($pass1 !=$pass2){
      echo '<span class="alert alert-danger">password not match</span>';
  }
  else{
     //add the data to database
     $data=[
        'name'=>$name,
        'full_name'=>$fullname,
        'password'=>$shapass,
        'emali'=>$email,
        'serv_id'=>$chose,
        'phone'=>$phone,
        'address'=>$address,
        'price'=>$price

    ];
    //save the data
    $add=DB::getInstace()->insert('members',$data);

    if($add){
        echo "<script>alert('memebers added successfully')</script>";
       //  header("location:?do=create");
    }
    else{
        echo 'some errors ';
    }
  }
  
  

    
  
}

}

elseif($do=='edit'){
    $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;

    $data=DB::getInstace()->query('SELECT members.*,serv.* from members
    JOIN serv ON
    members.serv_id=serv.id where members.me_id=?',[$id]);
   
      ?>

<?php foreach($data->result() as $d):?>
<h1 class="text-info">Edit members</h1>
    <div class="container">
      
     <!-- panel -->
     <div class="panel panel-primary">
  <div class="panel-heading"> <strong><i class="glyphicon glyphicon-user"></i> login form</strong>  </div>
  <div class="panel-body">
   <form action="members.php?do=edit" method="post">
   <input type="hidden" name="id" value="<?php echo $d->me_id ?>">
       <!-- strat username -->
       <div class="form-group">
       <label class="control-label">username</label>
       <input type="text" name="username" 
         value="<?php echo $d->name ?>"
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
       value="<?php echo $d->emali ?>"
        required class="form-control">
     </div>
     <!-- start phone -->
     <div class="form-group">
       <label class="control-label">phone</label>
       <input type="text" name="phone"
       value="<?php echo $d->phone ?>" 
       required class="form-control">
     </div>
     <!-- strat address -->
     <div class="form-group">
       <label class="control-label">address</label>
       <input type="text" name="address" 
       value="<?php echo $d->address ?>"
       required class="form-control">
     </div>
     <!-- strat price -->
     <div class="form-group">
       <label class="control-label">price</label>
       <input type="number" name="price" required 
       value="<?php echo $d->price ?>"
       class="form-control">
     </div>
     <!-- start chose sreves -->
     <div class="form-group">
       <label class="control-label">chose serves</label>
        <select name="chose" class="form-control">
         <option  value="<?php echo $d->me_id ?>"><?php echo $d->name_serves ?></option>
          <?php     
          
          $all=DB::getInstace()->query('SELECT * from serv');
          foreach($all->result() as $a){
              ?>
               <option value="<?php echo $a->id ?>"><?php echo $a->name_serves ?></option>
              <?php
          }
          ?>
       
     
        
        </select>
     </div>
     <div class="form-group">
       <label class="control-label">chose image</label>
         <input type="file" name="img" class="form-control-file">
     </div>
     <div class="form-group">
     
         <input type="submit" name="edit" class="btn btn-primary" value="Edit  Member">
     </div>
   
   </form>

  </div>
</div>
     </div>
<?php endforeach;?>
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
        $chose=$_POST['chose']; 
          //add the data to database
          $data=[
            'name'=>$name,
            'password'=>$shapass,
            'emali'=>$email,
            'serv_id'=>$chose,
            'phone'=>$phone,
            'address'=>$address,
            'price'=>$price,
            'me_id'=>$ids
    
        ];
     
          //save the data
          $edit=DB::getInstace()->update('members','me_id',$ids,$data);
     
          if($edit){
              echo '<div  class="alert alert-success">data updated successfully</div>';
             //  header("location:?do=create");
          }
          else{
              echo 'some errors ';
          }
       }
     
    
}

elseif($do=='delete'){
 $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
 
 //delete the items
 $delete=DB::getInstace()->delete('members',['me_id','=',$id]);
 if($delete){
     echo '<div class="alert alert-danger">the serves deleted successfully</div>';
    //  header("location:?do=manage");
 }else{
     echo 'errors';
 }

}
elseif($do=='active')
{
  $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
  $data=DB::getInstace()->query('SELECT members.*,serv.* from members
  JOIN serv ON
  members.serv_id=serv.id where members.me_id=?',[$id]);
     //save the data
     $active=DB::getInstace()->update('members','me_id',$id,['status','=','1']);
     if($active){
       echo 'good';
     }
}
else{
    echo 'this page not fount';
}