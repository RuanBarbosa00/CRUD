
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>CRUD Application</h1>
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

<?php
session_start();
session_destroy();
header('Location: login.php');
?>

</div>
</body>
</html>
