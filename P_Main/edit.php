<?php
include 'connection.php';
$user = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$sql = "update usrs set phoneNo='$phone' where username='$user'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
	//header("Location: list.php");
} else {
	//header("Location: list.php#users");
}
$conn->close();
?>