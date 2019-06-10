<?php
include 'connection.php';
$user = $_REQUEST['uname'];
$pass = $_REQUEST['psw'];
$rpass = $_REQUEST['rpsw'];
if ($rpass === $pass) {
    $sql = "insert into panelusers(username,password,sath) values('$user' , '$pass',2)";
    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo 2;
    }
} else {
    echo 0;
}
$conn->close();
