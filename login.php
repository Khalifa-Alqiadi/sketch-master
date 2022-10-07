<?php
session_start();
if (isset($_SESSION['id'])) {
  header('Location: index.php');
}
include 'connect.php';
include 'header.php';
if (isset($_POST['login'])) {
  $Username = $_POST['Username'];
  $pass = $_POST["Pass"];

  $select = mysqli_query($conn, "select * from users where user = '$Username' and password = '$pass'");
  $row = mysqli_fetch_array($select);
  echo $row['name'];
  $_SESSION["user_id"] = $row['id'];
  if (is_array($row)) {
    $_SESSION["Username"] = $row['user'];
    $_SESSION["Pass"] = $row['password'];
    $_SESSION["name"] = $row['name'];
    // $_SESSION["id"] = $row['id'];
    //$id = $row['id'];
  } else {
    echo '<script type="text/javascript">';
    echo 'alert("المستخدم او كلمة المرور غير صحيح");';
    echo 'window.location.href = "login.php"';
    echo '</script>';
  }
  echo $_SESSION["id"];
  if (isset($_SESSION["Username"])) {
    header("Location:index.php");
    exit();
  }

  // if(isset($_SESSION["Username"])){
  //   echo $_SESSION["Username"];
  // }
}
?>

  <main class="form-signin">
    <form action="login.php" method="post">
      <img id="logo" class="mb-4" src="img/electricity logo.jpg" alt="" width="120" height="95">
      <h1 id="login-text" class="h3 mb-3 fw-normal">تسجيل دخول</h1>

      <div class="form-floating">
        <input type="test" class="form-control" id="floatingInput" placeholder="Username" name="Username" required="">
        <label for="floatingInput">المستخدم</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Pass" required="">
        <label for="floatingPassword">كلمة المرور</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> تذكرني
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="login" type="submit" style="background-color: #212529;">تسجيل دخول</button>
    </form>
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