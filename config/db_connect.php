<?php 
$conn = mysqli_connect('localhost','hello','12345678','pizza_tong');

//check connection

if(!$conn){
   echo 'connection fail '.mysqli_connect_error();
}


?>