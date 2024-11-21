<?php
include('config.php');  // Include the database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the task from the database
    $sql = "DELETE FROM tasks WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
