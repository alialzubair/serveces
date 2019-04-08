<?php
//include '../init.php';
/**
 * in this page will make all action to working in database
 * make the method like [add,edit,delete,show,getall,get_single,rowCount...]
 */

 //function to redirect
 
function redircthome($themsg,$url=null,$second=3){

	//ckeck the url
	if($url==null){
		$url='index.php';
	}
	else{
		if(isset($_SERVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER']!==''){
	$url=$_SERVER['HTTP_REFERER'];

}
	   else{
		   $url='';
		  }
}

echo $themsg;
echo "<div class='alert alert-info'>you well be directed after $second second.</div>";
header("refresh:$second;url=$url");

}


 //function to get all data

 function getAll($table){
     global $con;
 $query="SELECT * from {$table}";
  //prepare the query
  $stmt=$con->prepare($query);
  //execute the query
  $stmt->execute();
  //fetch all data
  $fetch=$stmt->fetchAll();

  //return the data
  return $fetch;
 }
 //get thesiangle data
 function singel($table ,$filed,$id){
    global $con;
 $query="SELECT * from {$table} where {$filed}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetch();
   
     //return the data
     return $fetch;
 }

 //make the row count
 function rowCount($table){
    global $con;
    $query="SELECT * from {$table}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     $fetch=$stmt->fetchAll();
     $count=$stmt->rowCount();
   
     //return the data
     return $count;
 }

 //make the delete function

 function delete($table,$field, $id){
    global $con;
 $query="DELETE  from {$table} where {$field}={$id}";
     //prepare the query
     $stmt=$con->prepare($query);
     //execute the query
     $stmt->execute();
     //fetch all data
     if($stmt){
         return true;
     }
     else{
         return false;
     }
 }

 function AllSection(){
     global $con;
     $sql="SELECT section.*,major.major_name FROM section
     JOIN major ON
     section.id_major=major.major_id";
     //prepare the sql
     $stmt=$con->prepare($sql);
     //execute the query
     $stmt->execute();

     //fetch all
     $getAll=$stmt->fetchall();

     //return the getall
     return $getAll;
 }

 //sinagel
 
 function SingleSection($id){
    global $con;
    $sql="SELECT section.*,major.major_name FROM section
    JOIN major ON
    section.id_major=major.major_id
      where section_id={$id}
    ";
    //prepare the sql
    $stmt=$con->prepare($sql);
    //execute the query
    $stmt->execute();

    //fetch all
    $getAll=$stmt->fetch();

    //return the getall
    return $getAll;
}

//make the function to status
function status($user){
 
    global $con;
       $stmtx=$con->prepare("SELECT name , status FROM members where name=? and status=1");
       $stmtx->execute(array($user));
   
       $statues=$stmtx->rowcount();
      return $statues;
    
    }

//craete function to check the users

//first fuction we make to check off admin users

function admin($user){

    global $con;
      $stmt=$con->prepare("SELECT name
       , groups FROM members where name=? and groups=1");
      $stmt->execute(array($user));
      
      $admin=$stmt->rowcount();
      return $admin;
  
  
  }
  
//craete function to check the users

//first fuction we make to check off admin users

function ckeckemp($user){

    global $con;
      $stmt=$con->prepare("SELECT name
      , groups FROM members where name=? and groups=0");
      $stmt->execute(array($user));
      
      $emp=$stmt->rowcount();
     $count=$stmt->rowcount();
     return $count;
  
  
  }

//   make function to get all odrer
function getOrder($id){
    global $con;
    $sql="SELECT orders.*,members.* FROM orders

    JOIN members ON
    orders.me_id=members.me_id
where members.me_id=?";
    $stmt=$con->prepare($sql);
    $stmt->bindparam(1,$id);

    $stmt->execute();
    $fetch=$stmt->fetchall();

    return $fetch;
}

//function to get all  empl 
function getEmpl($id){
    global $con;
    $sql="SELECT serv.*,members.* FROM serv
    INNER JOIN members on members.serv_id=serv.id
where members.status=1 and serv.id=".$id." ";
//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch the data
$fetch=$stmt->fetchall();

//return fetch
return $fetch;
}

function getEmplId($id){
    global $con;
    $sql="SELECT serv.*,members.* FROM serv
    INNER JOIN members on members.serv_id=serv.id
where  members.me_id=".$id." ";
//prepare the sql
$stmt=$con->prepare($sql);
//execute the query
$stmt->execute();
//fetch the data
$fetch=$stmt->fetch();

//return fetch
return $fetch;
}
  
// make function to  get all servis where members status =1

function allServise(){
    global $con;
    $sql="SELECT serv.*,members.status FROM serv
    JOIN members ON
    serv.id=members.serv_id 
    where members.status=1";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $fetch=$stmt->fetchall();
    return $fetch;
}

function checkName($name){
    global $con;
    $sql="SELECT name from members where name= '{$name}' ";
    $stmt=$con->prepare($sql);
    $stmt->execute();
    $count=$stmt->rowcount();
    return $count;

}
  
 