<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID received: " . $id . "<br>";

    // Prepare a delete statement
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error . "<br>SQL: " . $sql);
    }
    echo "Statement prepared.<br>";

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $id);
    echo "Parameters bound.<br>";

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
        header("location: read.php");
        exit();
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
} else {
    die("ID not specified.");
}

$conn->close();
?>
