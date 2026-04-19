<?php
// 1️⃣ Database connection
$servername = "localhost";
$username = "root";       // default XAMPP username
$password = "";           // default XAMPP password
$dbname = "secure_quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2️⃣ Fetch results ordered by submitted_at
$sql = "SELECT * FROM results ORDER BY time_submitted DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Results</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Quiz Results</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Score</th>
            <th>Submitted At</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['score']."</td>
                    <td>".$row['time_submitted']."</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>
</body>
</html>