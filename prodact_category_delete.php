<?php
	session_start();
	include 'connetion.php';

	$id = $_GET['id'];
	$delete_date = date('Y-m-d H:i:s');
	$delete_by = $_SESSION['admin_id'];

	$qurey = "update tbl_prodact_category set delete_date='".$delete_date."',delete_by='".$delete_by."',is_delete='y' where id='".$id."'";
	$row = mysqli_query($connect,$qurey);

	$category_delete_qurey = "update tbl_prodact set delete_date='".$delete_date."',delete_by='".$delete_by."',is_delete='y' where category_id='".$id."'";
	$category_delete_row = mysqli_query($connect,$category_delete_qurey);
 	header("location:prodact_category_list.php");
?>