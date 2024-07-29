<?php
include 'includes/db.php';

// Execute a query to fetch data from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Student Records</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Student Record Application - Read Data</h1>
</header>
<nav>
    <a href="index.php">Home</a>
    <a href="create.php">Create</a>
     <a href="read.php">Read | Delete</a>
    <a href="update.php">Update</a>
     
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</nav>
<div class="container">
    <h2>Student List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Course</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "<td><a href='update.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
