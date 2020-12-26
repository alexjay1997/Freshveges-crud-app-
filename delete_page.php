<?php
   session_start();
    
   	if(isset($_SESSION['id']) && $_SESSION['id'] == true) {
      
   } else {
       header('location:loginpage.php');
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Fresh Veges Delete</title>
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
               <div class="tblview" >
                  <h2 style="color:grey;margin:50px auto;text-align:center;font-family:myfont;font-weight:300px;color:Green;">Delete Vegatables </h2>
                  <table>
                     <tr>
                        <th>
                           Item Code
                        </th>
                        <th>
                           Vegetable Name
                        </th>
                        <th>
                           Types Of Vegetable
                        </th>
                        <th>
                           Color
                        </th>
                        <th>
                           Price
                        </th>
                        <th>
                           Quantity
                        </th>
                        <th>
                           Action
                        </th>
                     </tr>
                     <?php 
                        $con =mysqli_connect("localhost","root","")or die("Not Connected");
                        
                        mysqli_select_db($con,'db_vegetable') or die ("Error");
                        
                        $query="Select * from tb_vegetable";
                        $result=mysqli_query($con,$query);
                        
                        while($row=mysqli_fetch_array($result))
                        {
                            ?>
                     <tr>
                        <td><?php echo $row['ItemCode'];?></td>
                        <td><?php echo $row['VegetableName'];?></td>
                        <td><?php echo $row['TypesOfVegetable'];?></td>
                        <td><?php echo $row['Color'];?></td>
                        <td><?php echo $row['Price'];?></td>
                        <td><?php echo $row['Quantity'];?></td>
                        <td style="background-color:#d05454;"><a href="delete.php?id=<?php echo $row['ItemCode'];?>" style="text-decoration:none;color:white;padding:7px;text-align:center;border-bottom:1px solid red:">Delete</a></td>
                     </tr>
                     <?php
                        }
                         ?>
                  </table>
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

