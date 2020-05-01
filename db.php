<?php
session_start();

$conn = mysqli_connect(
  'localhost:3306',
  'root',
  'root',
  'php_mysql_crud'
) ;

// if(!conn){
//   die(mysqli_error($mysqli));
// }

?>
