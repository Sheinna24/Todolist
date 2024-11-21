<?php
include('config.php');  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $task = $result->fetch_assoc();
    } else {
        echo "Task not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $id = $_POST['id'];

    // Update the task in the database
    $sql = "UPDATE tasks SET task = '$task' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <!-- Form to edit an existing task -->
    <form action="edit_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task" value="<?php echo $task['task']; ?>" required>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
