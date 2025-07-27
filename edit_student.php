<link rel="stylesheet" href="style.css">
<?php include 'connect.php';


$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $roll = trim($_POST['roll']);
    if ($name && $roll) {
        $stmt = $conn->prepare("UPDATE students SET name=?, roll_no=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $roll, $id);
        try {
            $stmt->execute();
            echo "Updated! <a href='index.php'>Go Back</a>";
            exit;
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

<h2>Edit Student</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>"><br><br>
    Roll No: <input type="text" name="roll" value="<?= htmlspecialchars($student['roll_no']) ?>"><br><br>
    <input type="submit" value="Update">
</form>
