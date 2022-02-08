<?php
include('connection.php');
if( isset($_POST['submit_data']) ){
    $message = insert_data($connection);
}
//insert data
function insert_data($connection){
    $name = $_POST['name'];
	$actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $director = $_POST['director'];
	$year = $_POST['year'];

    $query = "INSERT INTO movie (movie_name,actor,actress,director,year)
    VALUES('$name','$actor','$actress','$director','$year')";

    $exec=mysqli_query($connection,$query);
    if($exec){
        $msg="Data was created sucessfully";
        return $msg;
      
      }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="post">
			<tr>
				<td>Movie name:</td>
				<td><input name="name" type="text"></td>
			</tr>
			<tr>
				<td>Actor:</td>
				<td><input name="actor" type="text"></td>
			</tr>
            <tr>
				<td>Actress:</td>
				<td><input name="actress" type="text"></td>
			</tr>
    	    <tr>
				<td>Director:</td>
				<td><input name="director" type="text"></td>
			</tr>
			<tr>
				<td>Year:</td>
				<td><input name="year" type="text"></td>
			</tr>
			<tr>
				<td><a href="index.php">See Data</a></td>
				<td><input name="submit_data" type="submit" value="Insert Data"></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>