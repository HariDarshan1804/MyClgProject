<?php
	session_start();
	include 'connetion.php';

	$delete_date = date('Y-m-d H:i:s');
	$delete_by = $_SESSION['admin_id'];

	$qurey = "update tbl_testimonials set delete_date='".$delete_date."',delete_by='".$delete_by."',is_delete='y' where id='".$_GET['id']."'";
	$row = mysqli_query($connect,$qurey);

	header("location:testimonials_list.php");
?>