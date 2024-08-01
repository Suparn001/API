<?php
header('Content-Type:application/json');
header('Access-Control-Allow_origin:*');
include "connection.php";
$sql  = "Select * from `API`.`contacts`";
$result  = mysqli_query($con, $sql) or die("query failed");

if(mysqli_num_rows($result) >0){
   $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($output);
}
else{
  echo json_encode(array('message' => 'No record found', 'status'=>'false'));
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
