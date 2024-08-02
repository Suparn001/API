<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,
Access-Control-Allow-Methods,Content-Type,Authorization, 
X-Requested-With");
include "connection.php";

$jon =json_decode(file_get_contents("php://input"),true);

$od=$jon['sid'];
$id  = "DELETE from `API`.`contacts` where `id` = {$od}";


if(mysqli_query($con, $id)) {
    echo json_encode(array('message' => 'Record Deleted Successfully', 'status'=>'true'));
 }
 else{
   echo json_encode(array('message' => 'Not Successful', 'status'=>'false'));
 }



?>