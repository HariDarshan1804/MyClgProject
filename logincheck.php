<?php
	session_start();
	include 'connetion.php';
	$table=$_POST['taskOption'];

	

	$qurey = mysqli_query($connect,"select * from $table where username='".mysqli_real_escape_string($connect,$_POST['username'])."' and password='".$_POST['password']."'");
	$row = mysqli_num_rows($qurey);
	$data = mysqli_fetch_array($qurey);

	if ("student_user"==$table) {
		
		$_SESSION['username'] = $data['username'];
		$_SESSION['admin_id'] = $data['id'];

		
		$_SESSION['admin'] = $data['enrollment_no'];


		header("location:dashboard.php");
	}
	else if("admin_tb"==$table)
	{
		$_SESSION['username'] = $data['username'];
		$_SESSION['admin_id'] = $data['id'];
		header("location:admin_panel/dashboard_admin.php");
	}
	else if("teacher_user"==$table)
	{
		$_SESSION['username'] = $data['username'];
		$_SESSION['teacher_id'] = $data['id'];
		header("location:teachers/dashboard_teacher.php");
	}
	else if("library_user"==$table)
	{
		$_SESSION['username'] = $data['username'];
		$_SESSION['library_id'] = $data['id'];
		header("location:library_panel/dashboard_library.php");
	}
	else if("principal_user"==$table)
	{
		$_SESSION['username'] = $data['username'];
		$_SESSION['principal_id'] = $data['id'];
		header("location:principal/dashboard_principal.php");
	}
	else {
		header("location:index.php");
	}
?>