<?php
session_start();
 
	if(isset($_SESSION['id']) && $_SESSION['id'] == true) {
   
} else {
    header('location:loginpage.php');
}

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

if(isset($_POST['add-vegetable'])){
$itemcode=$_POST['item_code'];
$vegetable_name=$_POST['vegetable_name'];
$types_of_vegetable=$_POST['types_of_vegetable'];
$color=$_POST['color'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];

$con =mysqli_connect("localhost","root","")or die("Not Connected");

mysqli_select_db($con,'db_vegetable') or die ("Error");

mysqli_query($con,"INSERT INTO tb_vegetable(ItemCode,VegetableName,TypesOfVegetable,Color,Price,Quantity) VALUES ('$itemcode','$vegetable_name','$types_of_vegetable','$color','$price','$quantity')")or die("Data Not Inserted");
echo"Vegetable  Inserted Successfully";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Veges | Add Vegetables</title>

    <link rel="stylesheet" href="css/style2.css">
    <style>
        @font-face {
  font-family: myfont;
  src: url(Lobster-Regular.ttf);
}
        </style>
</head>
<body>
<div class="page-container">
        <div class="header">
            <div class="container">
                <div class="logo">
                <h1 class="logo-name" style="font-family:myfont;font-weight:300;">Fresh Veges </h1>
                </div>
                <a href="logout.php" style="float:right;line-height:40px;padding-right:20px;padding-left:20px;color:white;font-family:calibri;text-decoration:none;background:#459078;">Logout</a>
            </div> 
            <div class="container">
            <div class="nav">
                    <nav>
                        <ul>
                            <li><a href="add_page.php">Add Veges</a></li>
                            <li><a href="edit_page.php">Edit Veges</a></li>
                            <li><a href="delete_page.php">Delete Veges</a></li>
                            <li><a href="search_page.php">Search for Veges</a></li>
                            <li><a href="view_page.php">View </a></li>
                            <li><a href="sort_page.php">Sort Page</a></li>

                        </ul>
                    </nav>    
</div>
</div>
</div>

            <div class="container">
      

                <div class="main-content">
                        <div class="add-form">
                            <h2 style="color:#253e66;font-family:calibri;">Add New Vegetables</h2><br>
                            <form method ="post" action="add_page.php">
                                
                                <input type="number" name="item_code" placeholder="Item Code">
                                 <input type="text" name="vegetable_name" placeholder="VegetableName"><br><br>  
                                
                              
                               
                                <input type="text" name="types_of_vegetable" placeholder="TypesOfVegetable">
                               
                                <input type="text" name="color" placeholder="Color"><br><br>
                          
                                <input type="number" name="price" placeholder="Price">
                          
                                <input type="number" name="quantity" placeholder="Quantity"><br><br>
                                <input class="add-btn"type="submit" value="Add" name="add-vegetable">
                                </form>
                        </div>
                </div>
                     </div>
                </div>
                <footer style="padding:20px;color:#eee;font-family:calibri;text-align:center;font-size:14px;background:#1f1f1f;">
        <span>All rights reserved 2020 Fresh Veges</span>
    </footer>
</div>
</body>
</html>




