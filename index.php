<?php
include('config.php');  // Include the database connection

// Get all tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        /* Add basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        input[type="text"] {
            padding: 8px;
            margin: 5px;
        }
        button {
            padding: 8px 12px;
            margin: 5px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
        }
        li {
            margin: 10px 0;
        }
        a {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>

    <!-- Form to add a new task -->
    <form action="add_task.php" method="post">
        <input type="text" name="task" placeholder="Enter a task" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>Task List</h2>
    <ul>
        <?php
        // Display tasks from the database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['task'] . " 
                    <a href='edit_task.php?id=" . $row['id'] . "'>Edit</a> 
                    <a href='delete_task.php?id=" . $row['id'] . "'>Delete</a></li>";
            }
        } else {
            echo "<li>No tasks found</li>";
        }
        ?>
    </ul>
</body>
</html>
