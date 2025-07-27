<?php include 'connect.php'; ?>
<link rel="stylesheet" href="style.css">

<h2>Add Student</h2>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Roll No: <input type="text" name="roll"><br><br>
    <input type="submit" value="Add">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $roll = trim($_POST['roll']);
    if ($name && $roll) {
        $stmt = $conn->prepare("INSERT INTO students (name, roll_no) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $roll);
        try {
            $stmt->execute();
            echo "Added! <a href='index.php'>Go Back</a>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                echo "<p style='color:red;'>Error: Roll number already exists.</p>";
            } else {
                echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
            }
        }
    } else {
        echo "<p style='color:red;'>All fields are required.</p>";
    }
}
?>
