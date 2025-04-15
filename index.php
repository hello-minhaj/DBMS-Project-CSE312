<?php
@include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container">
   <section class="home">
      <div class="content">
         <h3>Welcome to Medical Shop</h3>
         <p>Find all your medical needs in one place</p>
         <a href="admin_page.php" class="btn">Admin</a>
         <a href="user_page.php" class="btn">User</a>
      </div>
   </section>
</div>

</body>
</html>
