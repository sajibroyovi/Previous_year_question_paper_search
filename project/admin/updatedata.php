<?php

include('../dbcon.php');
    $department=$_POST['department'];
	$year=$_POST['year'];
	$semister=$_POST['semister'];
	$subject=$_POST['subject'];
	$submit=$_POST['submit'];
	$id=$_POST['sid'];	
	$imagename=$_FILES['image']['name'];
	$tempname=$_FILES['image']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimage/$imagename");
	
	$qry="UPDATE `student` SET `depeartment` = '$department', `year` = '$year', `semister` = '$semister' WHERE `id` = '$id'";
	
	$run=mysqli_query($con,$qry);
	
	if($run==true)
	{
		?>
		<script>
			alert('Data Update Successfully...');
			window.open('updateform.php?sid=<?php echo $id;?>','_self');
		</script>
		<?php
	}	 
?>