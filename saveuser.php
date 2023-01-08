<?php
 include("sys/connect.php");            //

$txtname = $_POST['txtname'];


$sql = "INSERT INTO user (firstname) VALUES ('$txtname')";

$conn->query($sql);

header('Location: index.php');

?>