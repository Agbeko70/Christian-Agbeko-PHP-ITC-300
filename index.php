<?php
include 'db.php';

// Handle form submission
if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $task_description = $_POST['task_description'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (subject, task_description, due_date)
            VALUES ('$subject', '$task_description', '$due_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green; text-align:center;'>Task added successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch all tasks
$result = $conn->query("SELECT * FROM tasks ORDER BY due_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Study Planner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2 style="text-align:center;">Student Study Planner</h2>

<div class="form-container">
    <form method="POST" action="">
        <label>Subject:</label><br>
        <input type="text" name="subject" required><br><br>

        <label>Task/Description:</label><br>
        <textarea name="task_description" required></textarea><br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date" required><br><br>

        <button type="submit" name="submit">Add To Planner</button>
    </form>
</div>

<h3 style="text-align:center;">Upcoming Tasks</h3>
<table border="1" cellpadding="10" align="center">
    <tr>
        <th>Subject</th>
        <th>Task</th>
        <th>Due Date</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['task_description']; ?></td>
        <td><?php echo $row['due_date']; ?></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
