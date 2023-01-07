<?php
 include("sys/connect.php");


$del_id = $_GET['id'];

$sql = "DELETE FROM user WHERE id = '$del_id' ";
$conn->query($sql);

header('Location: index.php');

?>