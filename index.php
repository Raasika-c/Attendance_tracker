<?php include 'connect.php'; ?>

<html>
<head><title>Attendance Tracker</title>
<link rel="stylesheet" href="style.css">
</head>
<body><h2>Mark Attendance</h2>
<form method="post" action="mark_attendance.php">
<table border="1">
<tr><th>Name</th><th>Roll No</th><th>Status</th><th>Actions</th></tr>
<?php
$res = $conn->query("SELECT * FROM students");
while ($row = $res->fetch_assoc()) {
    echo "<tr>
        <td>{$row['name']}</td>
        <td>{$row['roll_no']}</td>
        <td>
            <input type='radio' name='attendance[{$row['id']}]' value='Present' required> Present
            <input type='radio' name='attendance[{$row['id']}]' value='Absent'> Absent
        </td>
        <td>
            <a href='edit_student.php?id={$row['id']}'>Edit</a> |
            <a href='delete_student.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
        </td>
    </tr>";
}
?>

</table><br>
<input type="submit" value="Submit Attendance">
</form>
<br>
<a href="add_student.php">+ Add Student</a> | <a href="view_attendance.php">View Records</a></body>
</html>
