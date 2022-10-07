<?php
session_start();
  include("connect.php");
  include("header.php");
  $user_id = $_SESSION['user_id'];
  $select = mysqli_query($conn, "select * from sketc where user_id = '$user_id'");
  $row = mysqli_fetch_array($select);
  $noPayment = $row['energy'] - $row['cost'];

  $energy = $row['energy']  + 20;
 
  $querys = "update sketc set energy = $energy, energy_ds = $noPayment where user_id = $user_id";
  $results = mysqli_query($conn, $querys);
  $query = "SELECT * From sketc INNER JOIN users ON users.id = sketc.user_id";
  $result = mysqli_query($conn, $query);
?>

  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1 class="title">مرحباً بكم في NRF2</h1>
      <p class="lead">نقدم لك نظام توزيع الكهربائي الذكية لمساعدتك في مراقبة الشبكة التوزيع حيث يوجد عدادات ذكية متصلة بالشبكة وعرضها في موقعنا.</p>
      <a class="btn btn-lg btn-primary" id="button" href="#" role="button">بدء الاستخدام</a>
    </div>
  </main>

  <main id="table" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">لوحة القيادة</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">مشاركة</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">تصدير</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          هذا الأسبوع
        </button>
      </div>
    </div>

    <h2>المستهلكون</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">المبلغ</th>
            <th scope="col">القراءة الحالية</th>
            <th scope="col">المبلغ الغير مدفوع</th>
            <th scope="col">الاستهلاك الغير مدفوع</th>
            <th scope="col">حالة العداد</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
            //if($result["is_admin"][1] == 1){
              while($rows=mysqli_fetch_assoc($result)){
                $status = '';
                if($rows["energy"] > $rows["cost"]){
                  $query = "update sketc set status = 0 where user_id = $user_id";
                  $results = mysqli_query($conn, $query);
                }else{
                  $query = "update sketc set status = 1 where user_id = $user_id";
                  $results = mysqli_query($conn, $query);
                }
                if($rows['status'] == 1){
                  $status = 'نشط';
                }else{
                  $status = 'عير نشط';
                }
          ?>

          
          <tr>
            <td><?php echo $rows["id"];?></td>
            <td><?php echo $rows["name"];?></td>
            <td><?php echo $rows["cost"];?></td>
            <td>
            <?php echo $rows["energy"];?>
            </td>
            <td><?php echo $rows["cost_ds"];?></td>
            <td>
            <?php 
                if($rows["energy_ds"] <= 0){
                  echo 0;
                }else{
                  echo $rows["energy_ds"];
                }
              ?>
            </td>
            <td><?php echo $status;?></td>
          </tr>

          <?php
              }
            //}
          ?>
        </tbody>
      </table>
    </div>
  </main>

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
