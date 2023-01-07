<?php
 include("sys/connect.php");


$sql = "SELECT * FROM user";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
}

$sql = "SELECT * FROM food";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Id"]. " - Name: " . $row["Food name"]. " " . $row["Price"]. "<br>";
}





echo "LET'S SHARE"



?>