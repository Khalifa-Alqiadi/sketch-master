<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>NRF2</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" style="font-weight: 600;">NRF2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">الصفحة الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">من نحن</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="payment.php">تسديد</a>
          </li>
          <?php
          if (isset($_SESSION['user_id'])) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='logout.php'>تسجيل خروج</a>";
            echo "</li>";
          } else {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='login.php'>تسجيل دخول</a>";
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
