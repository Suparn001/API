<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
include "connection.php";

$jon =json_decode(file_get_contents("php://input"),true);

$od=$jon['sid'];
$id  = "Update * from `API`.`contacts` where `id` = {$od}";
$result= mysqli_query($con, $id) or die("query failed");

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