<?php include 'connect.php'; ?>
<link rel="stylesheet" href="style.css">

<h2>Attendance Records</h2>
<table border="1" cellpadding="10">
<tr><th>Date</th><th>Name</th><th>Roll No</th><th>Status</th></tr>

<?php
$sql = "SELECT a.date, s.name, s.roll_no, a.status
        FROM attendance a
        JOIN students s ON a.student_id = s.id
        ORDER BY a.date DESC";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    echo "<tr>
        <td>{$row['date']}</td>
        <td>{$row['name']}</td>
        <td>{$row['roll_no']}</td>
        <td>{$row['status']}</td>
    </tr>";
}
?>
</table>
<br><a href="index.php">⬅️ Back</a>
