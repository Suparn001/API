<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,
Access-Control-Allow-Methods,Content-Type,Authorization, 
X-Requested-With");
include "connection.php";




// you can also use get method to enter parametr in url 

$searrch = isset($_GET['search'])? $_GET['search']:die();


// this is used if you are scanning the databse
// $jon = json_decode(file_get_contents("php://input"), true);
// $search = $jon['search'];

$sql  = "SELECT * FROM `API`.`contacts` WHERE `name` like '%{$searrch}%'";
$result= mysqli_query($con, $sql) or die("query failed");

if(mysqli_num_rows($result) >0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
 echo json_encode($output);
 }
 else{
   echo json_encode(array('message' => 'No record found', 'status'=>'false'));
 }


