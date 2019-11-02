<!doctype html>
<html>
<head>
	<title>Previous year Question paper</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="wrapper">
	<h1><marquee>Search Previous Year Question Paper🙂🙂🙂🙂🙂🙂</marquee></h1>
	<div class="admin">
	<button><a href="login.php">Admin login</a></button>
	</div>
   <form action="index.php" method="post" enctype="multipart/form-data">
	<div class="dyss">
		Department<br>
		<select class="box" name="depeartment" required>
		<option value="cse" selected="1">Computer Science and engineering</option>
		<option value="ce">Civil Engineering</option>
		<option value="me">Machanical Engineering</option>
		<option value="ece">Eloctonics and Communicaton Engineering</option>		
		<option value="bba">Bachlor of Bussiness Administration</option>
		<option value="mba">Masters of Bussiness Administration</option>		
		<option value="deploma">Deploma</option>		
		<option value="Phd">PHD</option>
		</select>
	</div>
	<div class="dyss" required>
		Year<br>
		<select name="year">
			<option value="2019">2019</option>
			<option value="2018">2018</option>
			<option value="2017">2017</option>
			<option value="2016">2016</option>
			<option value="2015" selected="1">2015</option>
			<option value="2014">2014</option>
			<option value="2013">2013</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
			<option value="2010">2010</option>
			
		</select>
	</div>
	<div class="dyss" required>
		Semester<br>
		<select name="semester">
			<option value="1">1st</option>
			<option value="2">2nd</option>
			<option value="3">3rd</option>
			<option value="4">4th</option>
			<option value="5" selected="1">5th</option>
			<option value="6">6th</option>
			<option value="7">7th</option>
			<option value="8">8th</option>
			
		</select>
	</div>
	<div class="dyss">
		Subject<br>
		<select name="subject" required>
				<option value="physics">Physics</option>
				<option value="chemistry">chemistry</option>
				<option value="mathmethics" selected="1">Mathematics</option>
				<option value="computer">Computer</option>
		</select>
	</div>

<div class="submit">
<button name="submit">Submit</button>
</div>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	include('dbcon.php');
	$depeartment=$_POST['depeartment'];
	$year=$_POST['year'];
	$semester=$_POST['semester'];
	$subject=$_POST['subject'];
	
	$sql="SELECT * FROM `student` WHERE `depeartment`='$depeartment' AND `year`='$year' AND `semister`='$semester' AND `subject`='$subject'";
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run) > 0)
	{
		$data=mysqli_fetch_assoc($run);
		?>
         <div align="center" style="margin-top:70px;">
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
			<td><a href="dataimage/<?php echo $data['image']; ?>">Download</a></td>
            </tr>
            </div>
           
        <?php
		
	}
	else
	{
		echo "<script>alert('Question paper not found')</script>";
	}
}
?>
