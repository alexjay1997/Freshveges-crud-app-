<?php
session_start();
 
	if(isset($_SESSION['id']) && $_SESSION['id'] == true) {
   
} else {
    header('location:loginpage.php');
}

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

$con =mysqli_connect("localhost","root","")or die("Not Connected");

mysqli_select_db($con,'db_vegetable') or die ("Error");

$itemcode=$_GET['id'];

$query=mysqli_query($con,"Select * from tb_vegetable where ItemCode='$itemcode'");

$row=mysqli_fetch_array($query);

if(isset($_POST['update'])){
   
 
    
    $vegetable_name=$_POST['vegetable_name'];
    $types_of_vegetable=$_POST['types_of_vegetable'];
    $color=$_POST['color'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    
    
    
    
    mysqli_query($con,"UPDATE tb_vegetable SET VegetableName='$vegetable_name',TypesOfVegetable='$types_of_vegetable',Color='$color' ,Price='$price' ,Quantity='$quantity' WHERE ItemCode ='$itemcode'")
    or die("Error Update");

    header('location:Edit_page.php');
    
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vegetable</title>

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
                        <div class="edit-form">
                        <h2 style="color:grey;margin:10px auto;text-align:center;font-family:myfont;font-weight:300px;color:Green;">Update Vegatables details </h2>

                            <form method ="post" action="update.php?id=<?php echo $itemcode;?>">
                                
                                <p>VegatableName: </p>
                                 <input type="text" name="vegetable_name" placeholder="Vegetable Name" value="<?php echo $row['VegetableName'];?>"><br><br> 
                                 <p>Types of Vegetable: </p>
                                <input type="text" name="types_of_vegetable" placeholder="Types Of Vegetable" value="<?php echo $row['TypesOfVegetable'];?>">
                                <p>Color: </p>
                                <input type="text" name="color" placeholder="Color" value="<?php echo $row['Color'];?>"><br><br> 
                                <p>Price: </p>
                                <input type="text" name="price" placeholder="Price" value="<?php echo $row['Price'];?>">
                                <p>Quantity: </p>
                                <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $row['Quantity'];?>"><br><br>
                                <input class="update-btn" type="submit" value="Update" name="update">
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




