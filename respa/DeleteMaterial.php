<?php 
include_once 'dbconnect.php';
session_start();
$id_aes = $_GET['id_aes'];
		$sql = "DELETE from aes WHERE id_aes=".$id_aes."";
        echo $sql;           
       if ($DBcon->query($sql) === TRUE){
        echo '1';           
       } 
       else {
        echo '0';           
       }
    $DBcon->close();	
?>