

<?php
   $con=mysqli_connect("localhost","root","")or die("Not Connected");
    mysqli_select_db($con,'db_vegetable') or die ("Error");
   
   	if(isset($_POST['login'])){
    
   		session_start();
      	
   		$username=$_POST['username'];
       $password=$_POST['password'];
       
       $q= mysqli_query($con,"select * from tb_user where username='$username' && password='$password'");
   
   		if (mysqli_num_rows($q) == 0){
   			
   			
   			header('location:loginpage.php');
   
   		}
   		else{
   			$row=mysqli_fetch_array($q);
    
   			
   			$_SESSION['id']=$row['id'];
   			header('location:add_page.php');
   		}
   	}
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Fresh Veges Login page</title>
      <style>
         *{margin:0;}
         body{
         width:100%;
         background-image: url("./img/login-bg2.jpg");
         background-size: cover;
         background-position: bottom;
         background-repeat: no-repeat;
         background-attachment: fixed;
         }
         .login-form{
         margin:100px auto;
         background:rgba(0,0,0,0.3);
         padding:40px;
         font-family: calibri;
         height:auto;
         max-width:380px;
         color:#ffffff;
         }
         input[type=text], input[type=password] {
         width: 100%;
         padding: 12px 20px;
         margin: 8px auto;
         display: inline-block;
         border-radius:30px;
         box-sizing: border-box;
         border:none;
         outline:none;
         background-color:white;
         }
         .close-btn{
         width:100%;
         height:auto;
         text-align: right;
         float:right;
         padding:5px;
         }
         a{
         color:#ffff;
         text-decoration:none;
         font-family:arial;
         }
         .button {
         background-color: #459078;
         color: white;
         padding:12px;
         margin-top:5px;
         border: none;
         cursor: pointer;
         width: 150px;
         border-radius:30px;
         }
         button:hover {
         background-color: #4741c6;;
         }
      </style>
   </head>
   <body>
      <div class="page-container">
      <div class="hero-login">
      <div class="container">
         <div class="login-form">
            <a href="index.php" class="close-btn">Close</a>
            <h2>Login Form</h2>
            <br>
            <form method="post" action="loginpage.php" style="" >
               <input type="text" placeholder="Enter Username" name="username" required>
               <input type="password" placeholder="Enter Password" name="password" required><br>
               <div style="width:100%;text-align:center;"><input type="submit" class="button" name="login" value="Login" ></div>
            </form>
         </div>
         <footer style="position:absolute;bottom:5%;width:100%;color:#eee;font-family:calibri;text-align:center;font-size:16px;color:#ccc;">
            <span >All rights reserved 2020 Fresh Veges</span>
         </footer>
      </div>
   </body>
</html>

