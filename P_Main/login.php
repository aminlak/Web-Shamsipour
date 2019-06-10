<?php
include 'connection.php';
$user = $_REQUEST['uname'];
$pass = $_REQUEST['psw'];
$sql = "SELECT * FROM panelusers where username='$user' and password='$pass' and status=1";
$result = $conn->query($sql);
if (($result->num_rows) >=1) {
    while ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION["user"] = $row['username'];
        $_SESSION["sath"] = $row['sath'];
        header("Location: list.php");
    }
} else {
    header("Location: list.php");
}
$conn->close();
