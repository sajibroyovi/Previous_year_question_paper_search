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
<?php
include('../dbcon.php');
$sid=$_GET['sid'];
$sql="SELECT * FROM `student` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?>
<html>
	<head>
		<title>Insertion of document</title>
		<link href="insertstyle.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id=wlcome>
			<h1>Wealcome to admin dashboard</h1>
		</div>
        <div id="logout">
		<h3><a href="logout.php">Sign out</a></h3>
</div>
</body>
</html>
<form method="post" action="updatedata.php" enctype="multipart/form-data">
<tr>
<th>Department</th>
<td><input type="text" name="department" value=<?php echo $data['depeartment'];?>></td>

<tr>
<th>Year</th>
<td><input type="number" name="year" value=<?php echo $data['year'];?>></td>
<tr>
<th>Semister</th>
<td><input type="number" name="semister" value=<?php echo $data['semister'];?>></td>
<tr>
<th>Subject</th>
<td><input type="text" name="subject" value=<?php echo $data['subject'];?>></td>
</tr>
<tr>
	<th>Document</th>
	<td><input type="file" name="image" required></td>
</tr>
<input type="hidden" name="sid" value="<?php echo $data['id'];?>">
<button type="submit" name="submit" value="Submit">Submit</button>
</form>