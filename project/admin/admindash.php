<?php
session_start();

	if(isset($_SESSION['uid']))
	{
		echo $_SESSION['uid'];
	}
	else
	{
		echo "error.....";
		//header('location:../login.php');
	}
?>
<html>
<head>
</head>
<body>
<?php
include('html.php');
?>
</body>
</html>