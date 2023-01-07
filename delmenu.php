<?php
 include("sys/connect.php");


$del_id = $_GET['id'];

$sql = "DELETE FROM food WHERE Id = '$del_id' ";
$conn->query($sql);

header('Location: index.php');

?>