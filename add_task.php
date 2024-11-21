<?php
include('config.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];

    // Insert the task into the database
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after adding the task
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
