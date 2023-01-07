<?php
 include("sys/connect.php");
 // ต่อdatabase
?>
 
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--ไว้ปรับขนาดอัตโนมัติบนเปิดบนมือถือ-->
    <title>Let's share</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">  <!-- กำหนดความกว้าง100 ขยับให้อยุ่กลางตลอด -->
    <br />
  <form method="POST" action="saveuser.php">  <!-- -->
    <h3 class=" mb-3 fw-normal">Who's pay</h3>  
    <div class="row justify-content-md-center">    
        <div class="col-md-6">                    <!-- ช่องคนหาร กรอกข้อมูลเข้าdatabase -->
            <div class="form-floating">
            <input type="text" class="form-control" id="txtname" name="txtname" placeholder="name">
            <label for="floatingInput">Name</label>
            </div>
            <br />
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </div>
    </div>
  </form>
  <br /> 
  
  <?php 
    $idx = 0;
    $sql = "SELECT * FROM user";   
    $result = $conn->query($sql);  
    while($row = $result->fetch_assoc()) {

       $pay = $row['pay'];          

       $idx++;

       if ($pay == 0 ) {
        echo "<a href='del.php?id=".$row["id"]."'>[ลบ]</a> id: " . $idx. " - Name: " . $row["firstname"]. "<br>";  
       } else { 
        echo "<a href='del.php?id=".$row["id"]."'>[ลบ]</a> id: " . $idx. " - Name: " . $row["firstname"]. "<br /> Food: " . $row["food"]. "<br /> Pay: " . $row["pay"]. "<hr>"; 
       }
    }
    ?>
  <!-- แสดงคนจ่ายว่ามีอะไรบ้าง -->

    <br />
    
    <form method="POST" action="savefood.php">
    <h3 class="mb-3 fw-normal">What you pay</h3>
    <div class="row justify-content-md-center">    
        <div class="col-md-6">                     <!-- ช่องสิ่งที่หาร กรอกข้อมูลเข้าdatabase -->
            <div class="form-floating">
            <input type="text" class="form-control" id="foodname" name="foodname" placeholder="foodname" >
            <label for="foodname">Name</label>
            </div>
            <div class="form-floating">
            <input type="text" class="form-control" id="price" name="price" placeholder="price">
            <label for="price">Price</label>
            </div>
            
            <?php
              $idx = 0;
              $sql = "SELECT * FROM user";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) { 
                $idx++;
            ?>
              <div class="form-floating">
              <input type="checkbox" id="user<?php echo $idx; ?>" name="user<?php echo $idx; ?>" value="<?php echo $row["id"]; ?>"> <?php echo $row["firstname"]; ?> </label>
              </div>
            <?php } ?>
            <input type="hidden" class="form-control" id="totaluser" name="totaluser" value="<?php echo $idx; ?>">
            <br />
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </div>
    </div>
  </form>
  <br />

  <?php 
   $idx = 0;
  $sql = "SELECT * FROM food";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $idx++;
        echo "<a href='delmenu.php?id=".$row["Id"]."'>[ลบ]</a> id: " . $idx. " - Name: " . $row["Food_name"]. " " . $row["Price"]. " - " . $row["Person"]. "<br>";
    }
    ?>
    <br />
</main>

</body>
</html>

