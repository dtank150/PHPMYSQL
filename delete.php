<?php
include("connection.php");
$id = $_GET['id'];
delete_data($connection, $id);

function delete_data($connection, $id){
$query= "DELETE FROM `movie` WHERE id=$id";
$exec= mysqli_query($connection,$query);
    if($exec){
      header('location:index.php');
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      echo $msg;
    }
}
?>