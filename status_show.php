<?php
session_start();
include 'connetion.php';

$qurey = "select id,status from tbl_slider";
$connetion = mysqli_query($connect,$qurey);
$row = mysqli_fetch_array($connetion);



if ($row['status'] == "0") {
	$qurey = "update tbl_slider set status='1' where id='".$_GET['id']."'";
}else{
	$qurey = "update tbl_slider set status='0' where id='".$_GET['id']."'";
}
$result = mysqli_query($connect,$qurey);

header("location:slider_list.php"); 
?>