<?php
	session_start();
	include 'connetion.php';

	$qurey = mysqli_query($connect,"select * from tbl_user where username='".mysqli_real_escape_string($connect,$_POST['username'])."' and password='".$_POST['password']."'");
	$row = mysqli_num_rows($qurey);

	if ($row>0) {
		$data = mysqli_fetch_array($qurey);
		$_SESSION['username'] = $data['username'];
		$_SESSION['admin_id'] = $data['id'];

		header("location:semdropdown.php");
	}
	else
	{
		header("location:index.php");
	}
?>