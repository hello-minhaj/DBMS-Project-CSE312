<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctors</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .display_doctor {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .delete_doctor_btn, .update_doctor_btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .delete_doctor_btn {
            color: white;
            background-color: red;
        }
        .update_doctor_btn {
            color: white;
            background-color: green;
        }
        .delete_doctor_btn:hover {
            background-color: darkred;
        }
        .update_doctor_btn:hover {
            background-color: darkgreen;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .empty_text {
            text-align: center;
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Include header -->
    <?php include('header.php') ?>
    <div class="container">
        <section class="display_doctor">
            <table>
                <tbody>
                    <?php
                    $display_doctor = mysqli_query($conn, "SELECT * FROM `doctors`");
                    $num = 1;
                    if (mysqli_num_rows($display_doctor) > 0) {
                        echo "<thead>
                        <th>Sl No</th>
                        <th>Doctor Image</th>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Action</th>
                        </thead>";
                        while ($row = mysqli_fetch_assoc($display_doctor)) {
                    ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['name']; ?>"></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['specialization']; ?></td>
                                <td>
                                    <a href="delete.php?delete=<?php echo $row['id']; ?>" class="delete_doctor_btn" onclick="return confirm('Are you sure?');">
                                        <i class="fas fa-trash"></i> Delete</a>
                                    <a href="update.php?edit=<?php echo $row['id']; ?>" class="update_doctor_btn">
                                        <i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                    <?php
                            $num++;
                        }
                    } else {
                        echo "<div class='empty_text'>No Doctors Available</div>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>
