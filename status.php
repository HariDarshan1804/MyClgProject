<?php
session_start();
include 'connetion.php';

$qurey = "update tbl_slider set status='1' where id='".$_GET['id']."'";
$row = mysqli_query($connect,$qurey);

header("location:slider_list.php"); 
?>