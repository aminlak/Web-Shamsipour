<?php
include 'connection.php';
$user = $_REQUEST['image_name'];
$sql = "delete from usrs where username='$user'";
//echo $user;
//echo $sql;
if ($conn->query($sql) === TRUE) {
	header("Location: list.php");
} else {
	header("Location: list.php#users");
}
$conn->close();
?>