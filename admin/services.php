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
    $allData=DB::getInstace()->all('serv');
    ?>
    <h1 class="text-success text-center">Show All Serves</h1>
    <div class="container">
      <a href="services.php?do=create" class="btn btn-info">Add Serves</a>
      <hr>
    <div class="table-responsive">
     <table class="table table-bordered table-hover">

      <tr>
      <td>Serves Name</td>
           <td>Description</td>
           <td>Edit</td>
           <td>Delete</td>

      </tr>
      <?php foreach($allData->result() as $d): ?>
       <tbody id='myTable'>
       <tr>
       <td><?php echo $d->name_serves ?></td>
             <td><?php echo $d->descs ?></td>
             <td>
               <a href="?do=edit&id=<?php echo $d->id ?>" class="btn btn-info">Edit</a>
             </td>
             <td>
             <a href="?do=delete&id=<?php echo $d->id ?>" class="btn btn-danger confirm">Delete</a>
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
    <div class="container">
    <div class="row">
    <h1 class="text-info">Add New Serves</h1>

       <div class="col-md-5">
         <form action="?do=create" method='post' enctype="multipart/form-data">
         <div class="form-group">
           <label for="" class="contol-label">serves name</label>
           <input type="text" name="addServs" class="form-control">
         </div>

         <div class="form-group">
           <label for="" class="contol-label">Description</label>
           <textarea name="desc"  cols="10" rows="5" class="form-control"></textarea>
         </div>
         <br>
         <div class="form-group">
           <label for="" class="contol-label">image</label>
           <input type="file" name="img" class="form-control">
         </div>

          
         
           <br>
           <input type="submit" value="Add" name='add' class="btn btn-info btn-block">
   </form>
       </div>
     </div>
  
    
    </div>
 <?php 

if(isset($_POST['add'])){
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
  
     move_uploaded_file($file_tmp, "uploadServes//".$myfile);
  
  }
   $serv=$_POST['addServs'] ;
 $desc=$_POST['desc'];
  //make the validate 
  $errors=[];
  if(empty($serv)){
      $errors[]='name serves cannt be empty';
  }
  if(empty($desc)){
      $errors[]='description cannt be empty';
  }

  //loop throw the errors
  foreach($errors as $er){
      echo '<div class="text-danger">'.$er.'</div>';
  }
  //check the rrrors is empty
  if(empty($errors)){
     //add the data to database
     $data=['name_serves'=>$serv,'descs'=>$desc,'img'=>$myfile];

     //save the data
     $add=DB::getInstace()->insert('serv',$data);

     if($add){
         echo '<div  class="alert alert-success">data inserted successfully</div>';
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

    $data=DB::getInstace()->get('serv',['id','=',$id]);
   
      ?>

<?php foreach($data->result() as $d):?>
<h1 class="text-info text-center">Edit Serves</h1>
    <div class="container">
    <div class="row">
       <div class="col-md-5">
         <form action="?do=edit" method='post'>
          <input type="hidden" name="id" value="<?php echo $d->id ?>">
           <input type="text" name="addServs" class="form-control" value="<?php echo $d->name_serves  ?>"><br>
           <textarea name="desc"  cols="10" rows="5" class="form-control"><?php echo $d->descs ?></textarea>
           <br>
           <input type="submit" value="Edit" name='edit' class="btn btn-info btn-block">
   </form>
       </div>
     </div>
  
    
    </div> 
<?php endforeach;?>
  

    
    


     

    <?php
    if(isset($_POST['edit'])){
        $ids=$_POST['id'];
        $serv=$_POST['addServs'] ;
      $desc=$_POST['desc'];
       //make the validate 
       $errors=[];
       if(empty($serv)){
           $errors[]='name serves cannt be empty';
       }
       if(empty($desc)){
           $errors[]='description cannt be empty';
       }
     
       //loop throw the errors
       foreach($errors as $er){
           echo '<div class="text-danger">'.$er.'</div>';
       }
       //check the rrrors is empty
       if(empty($errors)){
           
          //add the data to database
          $data=['name_serves'=>$serv,'descs'=>$desc,'id'=>$ids];
     
          //save the data
          $edit=DB::getInstace()->update('serv','id',$ids,$data);
     
          if($edit){
              echo '<div  class="alert alert-success">data updated successfully</div>';
             //  header("location:?do=create");
          }
          else{
              echo 'some errors ';
          }
       }
     }
    
}

elseif($do=='delete'){
 $id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
 echo $id;
 //delete the items
 $delete=DB::getInstace()->delete('serv',['id','=',$id]);
 if($delete){
   header("location:serves.php?do=manage");
 }


}
else{
    echo 'this page not fount';
}