<?php 
	session_start();

	$errorMessage = '';
	if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])){
	include 'koneksi.php';

	$userId = $_POST['txtUserId'];
	$password = $_POST['txtPassword'];
	
	$sql = "SELECT username FROM admin WHERE username = '$userId' AND password = '$password'";
	$result = mysqli_query($host, $sql) or die('Query filed.'. mysqli_error($host));

	if (mysqli_num_rows($result)==1){
		$_SESSION['basic_is_logged_in'] = true;
		header('Location: index.php');
		exit;
	}else{
		$errorMessage = 'Sorry, wrong username/password';
	}
	
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="iso-8859-1">
	<title>Login Form</title>
</head>
<body>
	<?php
		if ($errorMessage !='') {
	?>
	<p>
		<div align="center"><?php echo $errorMessage; ?> 
	</p>	
	<?php
		}
	?>
	</div>
	<form action="" method="post" name="frmLogin" id="frmLogin">
		<table width="400" border="1" align="center">
			<tr>
				<th width="160" scope="col"><div align="left">User Id</div></th>
				<th width="224" scope="col"><div align="left"><input name="txtUserId" type="text" id="txtUserId"></div></th>
			</tr>
			<tr>
				<td><div align="left">Password</div></td>
				<td><input name="txtPassword" type="password" id="txtPassword"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="btnLogin" id="btnLogin" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>