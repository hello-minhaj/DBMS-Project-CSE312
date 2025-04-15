<?php
@include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
      .container {
         max-width: 1200px;
         margin: 50px auto;
         padding: 20px;
         text-align: center;
      }
      .content {
         background-color: #fff;
         padding: 30px;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      h3 {
         font-size: 24px;
         color: #333;
         margin-bottom: 10px;
      }
      h1 {
         font-size: 36px;
         color: #2c3e50;
         margin-bottom: 20px;
      }
      p {
         font-size: 18px;
         color: #7f8c8d;
         margin-bottom: 30px;
      }
      .btn {
         display: inline-block;
         padding: 12px 30px;
         background-color: #3498db;
         color: white;
         text-decoration: none;
         border-radius: 5px;
         margin: 0 10px;
         transition: background-color 0.3s;
      }
      .btn:hover {
         background-color: #2980b9;
      }
   </style>
</head>
<body>
   <?php include 'header.php'; ?>
   
   <div class="container">
      <div class="content">
         <h3>Hi, <span>User</span></h3>
         <h1>Welcome <span>User</span></h1>
         <p>This is the User dashboard. You can Shop Product and See Cart from here.</p>
         <a href="shop_products.php" class="btn">Shop Products</a>
         <a href="cart.php" class="btn">Cart</a>
      </div>
   </div>
</body>
</html>