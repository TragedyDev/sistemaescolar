<?php  
session_start();  
include('../app/config.php');  
  
if(isset($_SESSION['sesion_email'])){  
    $_SESSION['last_activity'] = time();  
    echo json_encode(['status' => 'success']);  
} else {  
    echo json_encode(['status' => 'error']);  
}  
?>