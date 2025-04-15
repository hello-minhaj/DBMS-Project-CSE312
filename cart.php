<?php
@include 'connect.php';

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- Custom inline CSS -->
   <style>
      /* General Styles */
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
      }

      /* Header Styling */
      header {
         background-color: #333;
         color: white;
         padding: 20px;
         text-align: center;
      }

      .container {
         max-width: 1200px;
         margin: 0 auto;
         padding: 20px;
      }

      /* Table Styling */
      table {
         width: 100%;
         margin: 20px 0;
         border-collapse: collapse;
         background-color: #fff;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      table th, table td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      table th {
         background-color: #f4f4f4;
         font-size: 16px;
         color: #333;
      }

      table td {
         font-size: 14px;
         color: #555;
      }

      table td img {
         width: 80px;
         height: 80px;
         object-fit: cover;
      }

      /* Action buttons */
      a.delete-btn, input.option-btn {
         color: #fff;
         background-color: #e74c3c;
         padding: 5px 10px;
         border: none;
         text-decoration: none;
         cursor: pointer;
         border-radius: 5px;
         transition: background-color 0.3s ease;
      }

      a.delete-btn:hover, input.option-btn:hover {
         background-color: #c0392b;
      }

      /* Disable buttons */
      a.delete-btn.disabled, .checkout-btn .btn.disabled {
         background-color: #ccc;
         cursor: not-allowed;
      }

      /* Grand total section */
      table .table-bottom {
         font-weight: bold;
         background-color: #f9f9f9;
      }

      .checkout-btn {
         margin-top: 20px;
         text-align: center;
      }

      .checkout-btn .btn {
         background-color: #2ecc71;
         color: #fff;
         padding: 12px 20px;
         text-decoration: none;
         border-radius: 5px;
         font-size: 16px;
         transition: background-color 0.3s ease;
      }

      .checkout-btn .btn:hover {
         background-color: #27ae60;
      }

      /* Input field styling */
      input.qty {
         width: 60px;
         padding: 5px;
         border: 1px solid #ddd;
         border-radius: 5px;
         text-align: center;
      }

      input.qty:focus {
         outline: none;
         border-color: #2ecc71;
      }

      /* Button and link styling */
      a.btn {
         background-color: #3498db;
         color: #fff;
         padding: 10px 20px;
         text-decoration: none;
         border-radius: 5px;
         transition: background-color 0.3s ease;
      }

      a.btn:hover {
         background-color: #2980b9;
      }
   </style>

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
   <section class="shopping-cart">
      <h1 class="heading">Shopping Cart</h1>
      <table>
         <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
         </thead>
         <tbody>
         <?php 
         
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
         ?>
            <tr>
               <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
               <td><?php echo $fetch_cart['name']; ?></td>
               <td><?php echo $fetch_cart['price']; ?> Taka</td>
               <td>
                  <form action="" method="post">
                     <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                     <input type="number" min="1" value="<?php echo $fetch_cart['quantity']; ?>" name="quantity" class="qty">
                     <input type="submit" value="update" name="update_cart" class="option-btn">
                  </form>   
               </td>
               <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
               <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
            </tr>
         <?php
           $grand_total += $sub_total;  
            };
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>
            <tr>
            <td style="text-align:center;" colspan="6">
            <a href="shop_products.php" class="btn">continue shopping</a>
            </td>
            </tr>';
         };
         ?>
         <tr class="table-bottom">
            <td colspan="4">grand total :</td>
            <td><?php echo $grand_total; ?> Taka</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
         </tr>
         </tbody>
      </table>
   </section>
</div>

</body>
</html>
