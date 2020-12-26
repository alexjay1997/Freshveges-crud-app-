<?php
$con =mysqli_connect("localhost","root","")or die("Not Connected");

mysqli_select_db($con,'db_vegetable') or die ("Error");

$itemcode=$_GET['id'];

mysqli_query($con,"DELETE From tb_vegetable WHERE ItemCode ='$itemcode'")
or die("failed to  Delete Data");

header('location:delete_page.php');
?>