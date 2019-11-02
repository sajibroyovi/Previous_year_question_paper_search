<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		header('location:admin/admindash.php');
	}
?>

<html>
<head>
<title>Admin page</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<form action="login.php" method="post">
		<div id="box">
				<h1>Admin Log in</h1>
				<div class="login">
					Username:
					
					<input type="text" placeholder="User id" name="uname" required>
				</div>
				<div class="login">
					Password:
					<input type="password" placeholder="password" name="pass" required>
				</div>
				<div class="signin">
					<button name="login" type="submit">login</button>	
				</div>
		</div>
	</form>
</body>
</html>
<?php
include('dbcon.php');
if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row <1)
	{
		?>
		
		<script>
		alert('Username or Password not match!!');
		window.open('login.php','_self');
		</script>
		<?php
	}
	else
	{
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		session_start();
		$_SESSION['uid']=$id;
		
		header('location:admin/admindash.php');
	}
}
?>