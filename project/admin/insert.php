<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location:../login.php');
	}
?>

<html>
	<head>
		<title>Insertion of document</title>
		<link href="insertstyle.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id=insert>
			<h1>Wealcome to admin dashboard</h1>
		</div>
	</body>
</html>
<div class="position">
<form method="post" action="insert.php" enctype="multipart/form-data">

<tr>
<th>Department</th><br>
<td><input type="text" name="department" placeholder="Enter Department"></td><br><br>

<tr>
<th>Year</th><br>
<td><input type="number" name="year" placeholder="Enter year"></td><br><br>
<tr>
<th>Semister</th><br>
<td><input type="number" name="semister" placeholder="Enter semister"></td><br><br>
<tr>
<th>Subject</th><br>
<td><input type="text" name="subject" placeholder="Enter subject"></td><br><br>
</tr>
<tr>
	<th>Document</th><br>
	<td><input type="file" name="image" required></td><br><br>
</tr>
<button type="submit" name="submit" value="Submit">Submit</button><br><br>

</form>
</div>
<?php
if(isset($_POST['submit']))
{
	include('../dbcon.php');
    $department=$_POST['department'];
	$year=$_POST['year'];
	$semister=$_POST['semister'];
	$subject=$_POST['subject'];
	$submit=$_POST['submit'];
	
	
	$imagename=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimage/$imagename");
	
	$qry="INSERT INTO `student`(`depeartment`, `year`, `semister`, `subject`,`image`) VALUES ('$department','$year','$semister','$subject','$imagename')";
	
	$run=mysqli_query($con,$qry);
	
	if($run==true)
	{
		?>
		<script>
			alert('Data Inserded Successfully...');
		</script>
		<?php
	}	
}
?>
