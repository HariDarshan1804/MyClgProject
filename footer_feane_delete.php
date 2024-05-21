<?php
	session_start();
	include 'connetion.php';

	$delete_date = date('Y-m-d H:i:s');
	$delete_by = $_SESSION['admin_id'];

	$qurey = "update tbl_footer_feane set delete_date='".$delete_date."',delete_by='".$delete_by."',is_delete='y' where id='".$_GET['id']."'";
	$row = mysqli_query($connect,$qurey);

	header("location:footer_feane_list.php");
?>