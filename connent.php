<?php
session_start();
include 'init.php';

//sent the message to database
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $title=$_POST['title'];
    $message=$_POST['message'];
    //insert data
    $sql="INSERT into message (name,email,title,message) values(:name,:email,:title,:message)";
    //prepare the sql
    $stmt=$con->prepare($sql);
    $data=[
        ':name'=>$name,
        ':email'=>$email,
        ':title'=>$title,
        ':message'=>$message
    ];
    //execute the query
    $stmt->execute($data);
    if($stmt){
        echo '<div class="alert alert-success">Thank your to sent sugest message</div>';
        header("refresh:3");
    }

    
}
?>
<!-- make the content us -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
           
        </div>
        <div class="col-md-8">
          <form action="connent.php" method="post">
              
                   <h1 class="texts">connect Us</h1>
            <div class="form-group">
                <label for="" class="control-label texts">name</label>
                <input type="text" 
                  required class="form-control"
                  name="name"
                  >
            </div>
            <div class="form-group">
                <label for="" class="control-label texts"> email</label>
                <input type="email" 
                required
                name="email"
                 class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="control-label texts">title </label>
                <input type="text" 
                required 
                name="title"
                 class="form-control">
</div>
                <div class="form-group">
                <label for="" class="control-label texts">message </label>
                 <textarea class="form-control"  name="message" required cols="5" rows="10"></textarea>
            </div>
             <div class="form-group">
                 <input type="submit" name="send" class="btn btn-primary" value="send">
             </div>
          </form>
            </div>
        </div>
    </div>

</div>

<?php include 'include/footer.php'; ?>