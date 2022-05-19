<?php
include '../conn.php';
if(isset($_POST["users_id"]))  
 {  
      $query = "SELECT * FROM users WHERE users_id = '".$_POST["users_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
?>