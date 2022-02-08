<?php
include('connection.php');

$fetchData= fetch_data($connection);

//fetch data
function fetch_data($connection){
    $qry = "SELECT * FROM movie";
    $result = mysqli_query($connection,$qry);
    if(mysqli_num_rows($result)>0){
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data List</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
		<a href="insert.php">Add New</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Movie name</td>
				<td>Actor</td>
				<td>Actress</td>
        <td>Year</td>
        <td>Director</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['actor'];?></td>
                <td><?php echo $row['actress'];?></td>
				<td><?php echo $row['director'];?></td>
			    <td><?php echo $row['year'];?></td>
				<td>
					<a href="update.php?id=<?php echo $row['id'];?>">Edit</a> | 
					<a href="delete.php?id=<?php echo $row['id'];?>"  confirm('Are you sure?');">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>