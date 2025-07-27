<?php include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
    $today = date('Y-m-d');
    foreach ($_POST['attendance'] as $sid => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $sid, $today, $status);
        $stmt->execute();
    }
    echo "Attendance marked for today!";
    echo "<br><a href='index.php'>⬅️ Back</a>";
} else {
    echo "No data received.";
}
?>
