<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['course'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        // Prepare an insert statement
        $sql = "INSERT INTO students (name, age, course) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing the query: " . $conn->error);
        }

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sis", $name, $age, $course);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            header("location: read.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student Record</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Student Record Application - Create Student</h1>
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
    <h2>Create New Student</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="age">Age</label>
            <input type="number" name="age" required>
        </div>
        <div>
            <label for="course">Course</label>
            <input type="text" name="course" required>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
</body>
</html>
