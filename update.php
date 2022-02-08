<?php
include('connection.php');
if( isset($_POST['submit_data']) ){

    $id= $_GET['edit'];
    $editData= edit_data($connection, $id);
}
function edit_data($connection, $id)
{
 $query= "SELECT * FROM movie WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row = mysqli_fetch_assoc($exec);
 return $row;
}
function update_data($connection, $id){
	// Gets the data from post
	$id = $_POST['id'];
	$name = $_POST['name'];
	$actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $director = $_POST['director'];
    $year = $_POST['year'];
   

    $query="UPDATE movie 
            SET mname='$name',
                actor='$actor',
                actress= '$actress',
                director='$director' 
                year='$year' WHERE id=$id";
      $exec= mysqli_query($connection,$query);
      if($exec){
        header('location:index.php');
     
     }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
        echo $msg;  
     }
}
?>