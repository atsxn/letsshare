<?php
 include("sys/connect.php");


$foodname = $_POST['foodname'];
$price = $_POST['price'];
$totaluser = $_POST['totaluser'];

$payPerson = [];            //สร้างarrayมาเก็บว่ามีใครหารบ้าง

for ($i=1;$i<=$totaluser;$i++) {
  $field = "user".$i;
  $valField =  $_POST[$field];

  if ($valField != "") {
    $payPerson[] = $valField;
  }
}

$countPay = count($payPerson);

echo "countpay :".$countPay;
echo "<br />";

echo "payPerson :".print_r($payPerson);   //คนหาร
echo "<br />";

$perPersonPay = $price / $countPay;       //ราคาที่คนนั้นหาร=ราคาของหารด้วยจำนวนคนหาร

echo "perPersonPay :".$perPersonPay;      //ราคาต่อคน
echo "<br />";

foreach ($payPerson as $value) {          //loop จนกว่า arrayจะหมด

  $sql = "SELECT * FROM user WHERE id = '$value' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $arrName[] =  $row['firstname'];
  $dbFoodname = $row['food'];

  if ($dbFoodname != "") {
    $userFoodname = $dbFoodname.",".$foodname;
  } else {
    $userFoodname = $foodname;
  }


  $sql = "UPDATE user SET pay = pay + '$perPersonPay', food = '$userFoodname' WHERE id = '$value' ";
  $conn->query($sql);

  

}

// $user1 = $_POST['user1'];
// $user2 = $_POST['user2'];
// $user3 = $_POST['user3'];
// $user4 = $_POST['user4'];

// echo $user1;
// echo '<br />';
// echo $user2;
// echo '<br />';
// echo $user3;
// die();

$person = implode(",", $arrName);

$sql = "INSERT INTO food (Food_name,Price,Person) VALUES ('$foodname','$price','$person')";

$conn->query($sql);

header('Location: index.php');

?>