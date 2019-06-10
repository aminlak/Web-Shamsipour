<?php
$ids = $_POST['name'];
$ar = json_decode($ids);
include 'connection.php';
foreach ($ar as $element) {
    $sql = "delete from usrs where username='$element'";
    if ($conn->query($sql) === TRUE) { } else { }
}
$conn->close();
?>