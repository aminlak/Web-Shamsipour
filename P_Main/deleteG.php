<?php
include 'connection.php';
$ids = $_REQUEST['image_name'];
$ids = implode(',', array_map('absint', $ids));
$sql = "delete from usrs where username IN($ids)";
//echo $user;
//echo $sql;
if ($conn->query($sql) === TRUE) {
	header("Location: list.php");
} else {
	header("Location: list.php#users");
}
$conn->close();
?>