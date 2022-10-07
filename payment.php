<?php
   
    ob_start();
    session_start();
    include 'connect.php';
    include 'header.php';
    ?>

  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1 class="title">مرحباً بكم في NRF2</h1>
      <p class="lead">نقدم لك نظام توزيع الكهربائي الذكية لمساعدتك في مراقبة الشبكة التوزيع حيث يوجد عدادات ذكية متصلة بالشبكة وعرضها في موقعنا.</p>
      <a class="btn btn-lg btn-primary" id="button" href="#" role="button">بدء الاستخدام</a>
    </div>
    <div class="row">
      <div class="col-8">
        <img src="img/maxresdefault.jpg" class="img-thumbnail" alt="Cinque Terre" style="height: 500px;">
      </div>
      <div class="col-4 form-signin">
        <form action="payment.php" method="post">
          <h1 id="login-text" class="h3 mb-3 fw-normal">تسديد الكهرباء</h1>
          <div class="form-floating">
            <input type="number" class="form-control" id="floatingInput" placeholder="cost" name="cost" required="">
            <label for="floatingInput">المبلغ</label>
          </div>
          <br>
          <button class="w-100 btn btn-lg btn-primary" name="pay" type="submit" style="background-color: #212529;">دفع</button>
        </form>
      </div>
    </div>
  </main>

  <?php
  if(isset($_SESSION["Username"])){
    echo $_SESSION["Username"];
  }
    
    if(isset($_POST['pay'])){
      $cost = $_POST['cost'];
      $available_balance = $cost / 350;
      $user_id = $_SESSION['user_id'];
      $select = mysqli_query($conn, "select * from sketc where user_id = '$user_id'");
      $row = mysqli_fetch_array($select);
      if(isset($row['user_id'])){
        $cost += $row['cost'];
        $available_balance += $row['available_balance'];
        $querys = "update sketc set cost = $cost, available_balance = $available_balance where user_id = $user_id";
        $results = mysqli_query($conn, $querys);
      }else{
        $query = "insert into sketc (cost, available_balance, user_id) values ('$cost', '$available_balance', '$user_id')";
        $result = mysqli_query($conn, $query);
      }
      
    }
  ?>

  <div class="footer">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3" style="">
        <li class="nav-item"><a href="payment.php" class="nav-link px-2 text-muted">تسديد</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link px-2 text-muted">من نحن</a></li>
        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">الصفحة الرئيسية</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2022 NRF2 جميع الحقوق محفوظة</p>
    </footer>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>
<?php 
ob_end_flush();
?>
