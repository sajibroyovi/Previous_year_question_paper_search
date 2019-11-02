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
		<div id=wlcome>
			<h1>Wealcome to admin dashboard</h1>
		</div>
        <div id="logout">
		<h3><a href="logout.php">Sign out</a></h3>
</div>
<div class="search" style="margin-left;150px;">
<form action="delete.php" method="post">
<tr>
<th>Enter Department</th><br><br><br><br><br>
<td><input type="text" name="department" placeholder="Enter Department" required="required"></td><br><br><br><br>
<tr>
<th>Enter Year</th><br><br><br><br><br>
<td><input type="number" name="year" placeholder="Enter year" required="required"></td><br><br><br><br>
<tr>
<th>Enter Semister</th><br><br><br><br><br>
<td><input type="number" name="semester" placeholder="Enter semister" required="required"></td><br><br><br><br>
<tr>
<th>Enter Subject</th><br><br><br><br><br>
<td><input type="text" name="subject" placeholder="Enter subject" required="required"></td><br><br><br><br>
</tr>
<input type="submit" name="submit" value="search"/>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include('../dbcon.php');
	$semester=$_POST['semester'];
	$subject=$_POST['subject'];
	
	$sql="SELECT * FROM `student` WHERE `semister`='$semester' AND `subject`='$subject'";
	
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run)<1)
	{
		echo "No record found";
		}
	else
	{
		while($data=mysqli_fetch_assoc($run))
		{
			?>
            <div align="center">
            <tr>
            <td><?php echo "Depeartment:"; echo $data['depeartment'];?></td></br>
            </tr>
            <tr>
            <td><?php echo "Year:"; echo $data['year'];?></td><br>
            </tr>
            <tr>
            <td><?php echo "Semester:" ;echo $data['semister'];?></td><br>
            </tr>
            <tr>
            <td><?php echo "Subject:"; echo $data['subject'];?></td></br>
            </tr>
            <tr>
            </div>
           <td><a href="../dataimage/<?php echo $data['image']; ?>" style="max-width:50%;margin-left:300px;"></a></td>
            </tr>
            <a href="deleteform.php?sid=<?php  echo $data['id'];?>"><h2>Delete</h2></a>
            <?php
			}
           
		}
         
	}
?>

