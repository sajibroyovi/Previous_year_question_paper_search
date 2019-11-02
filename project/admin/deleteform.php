<?php

include('../dbcon.php');
   $id=$_REQUEST['sid'];
	$qry="DELETE FROM `student` WHERE `id`='$id'";
	
	$run=mysqli_query($con,$qry);
	
	if($run==true)
	{
		?>
		<script>
			alert('Delete Successfull...');
			window.open('delete.php?sid=<?php echo $id;?>','_self');
		</script>
		<?php
	}	 
?>