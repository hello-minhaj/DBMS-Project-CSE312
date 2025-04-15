<?php
include 'connect.php'; // Include the database connection


if (isset($_POST['add_doctor'])) {
    // Retrieve doctor details from the form
    $doctor_name = $_POST['doctor_name'];
    $doctor_specialization = $_POST['doctor_specialization'];
    $doctor_experience = $_POST['doctor_experience'];
    $doctor_image = $_FILES['doctor_image']['name'];
    $doctor_image_temp_name = $_FILES['doctor_image']['tmp_name'];
    
    // Define the folder where the uploaded image will be stored
    $doctor_image_folder = 'images/' . $doctor_image;
    
    // Insert doctor details into the database
    $insert_query = mysqli_query($conn, "INSERT INTO `doctors` (name, specialization, experience, image) VALUES ('$doctor_name', '$doctor_specialization', '$doctor_experience', '$doctor_image')") or die("Insert query Failed");
    
    if ($insert_query) {
        // Move the uploaded image to the folder
        move_uploaded_file($doctor_image_temp_name, $doctor_image_folder);
        $display_message = "Doctor Added Successfully";
    } else {
        $display_message = "There is some error adding doctor";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        .heading {
            text-align: center;
            color: #333;
        }
        .input_fields {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit_btn {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit_btn:hover {
            background: #218838;
        }
        .display_message {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
            border-left: 5px solid #28a745;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .display_message i {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <?php
    if(isset($display_message)){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
    }
    ?>
    
    <section>
        <h3 class="heading">Add Doctors</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="doctor_name" placeholder="Enter Doctor Name" class="input_fields" required>
            <input type="text" name="doctor_specialization" placeholder="Enter Specialization" class="input_fields" required>
            <input type="text" name="doctor_experience" placeholder="Enter Years of Experience" class="input_fields" required>
            <input type="file" name="doctor_image" class="input_fields" required accept="image/png,image/jpg,image/jpeg">
            <input type="submit" name="add_doctor" class="submit_btn" value="Add Doctor">
        </form>
    </section>
</div>

</body>
</html>
