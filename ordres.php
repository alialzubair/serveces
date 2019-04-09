<?php
session_start();
include 'init.php';
$ckeckemp=ckeckemp($_SESSION['user']);
if($ckeckemp){
    $stmt=$con->prepare("SELECT * from orders where me_id=?");
		 $stmt->bindparam(1,$_SESSION['id']);
		 $stmt->execute();
         $data=$stmt->fetchall();
         $count=$stmt->rowcount();
         //show the data in ui
     ?>
      <div class="container">
       <h1 class="text-center text-info">My Orders</h1>
      <table class="table table-bordered table-hover">
        <tr>
          <td>name</td>
          <td>email</td>
          <td>address</td>
          <td>phone</td>
          <td>date of order</td>
        </tr>
          <?php
             if($count>0){?>
                          <?php foreach($data as $d):?>
          <tr>
              <td><?php echo $d['names'] ?></td>
              <td><?php echo $d['email'] ?></td>
              <td><?php echo $d['locations'] ?></td>
              <td><?php echo $d['phone'] ?></td>
              <td><?php echo $d['create_at'] ?></td>
          </tr>
<?php endforeach; ?> 
            <?php }
             else{?>
               <tr>
                  <td colspan="4"><b class="text-danger">not have order</b></td>
                 </tr>
             
             <?php }
          ?>
      </table>
      </div>
 
    <?php
}




include 'include/footer.php';
?>