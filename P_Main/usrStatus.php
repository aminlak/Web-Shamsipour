<?php
include 'connection.php';
$user = $_REQUEST['name'];
$st = $_REQUEST['stt'];
$sql = "update panelusers set status=$st where username='$user'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    //header("Location: list.php");
    echo '1';
} else {
    //header("Location: list.php#users");
    echo '0';
}
$conn->close();
?>