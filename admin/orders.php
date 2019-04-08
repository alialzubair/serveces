<?php
include 'init.php';

//get all orders

$all=DB::getInstace()->query('SELECT orders.*,members.* ,serv.name_serves from orders
JOIN members ON
orders.me_id=members.me_id
JOIN serv on 
orders.serv_id=serv.id order by orders.create_at
');
?>
    <h1 class="text-success text-center">Show All Serves</h1>
    <div class="container">
    <div class="table-responsive">
     <table class="table table-bordered table-hover">
     <tr>
      <td>id order</td>
      <td>servers name</td>
      <td>employee name</td>
      <td>custumer name</td>
      <td>date of order</td>
      
     </tr>
 <?php foreach($all->result() as $o):?>
  <tr>
       <td><?php echo $o->order_id?></td>
       <td><?php echo $o->name_serves?></td>
       <td><?php echo $o->full_name?></td>
       <td><?php echo $o->names?></td>
       <td><?php echo $o->create_at?></td>
       
  </tr>
<?php endforeach;?>  
     </table>
