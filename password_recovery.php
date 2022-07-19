<?php
session_start();

require 'Database.php';

$message = '';

if (isset($_REQUEST['email']) ) {
	$email = $_REQUEST['email'];
	$message = "A password reset code has been sent to $email";
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include './templates/headhtml.php' ?>
</head>

<body class="bg-default">

  <?php include './templates/navbar.html' ?>

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Password Recovery</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">

              <form role="form" method="get" action="password_recovery.php">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="email" type="text" required>
                  </div>
                </div>

                <?php
                if (!empty($message)) {
                ?>
                  <div class="form-group">
                    <div class="alert alert-danger">
                      <?php echo $message; ?>
                    </div>
                  </div>
                <?php
                }
                ?>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Recover password</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">

        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; <?php echo date('Y') ?> <a href="https://www.open-sec.com" class="font-weight-bold ml-1" target="_blank">Open-Sec</a>
          </div>
        </div>

        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.open-sec.com" class="nav-link" target="_blank">Open-Sec</a>
            </li>
            <li class="nav-item">
              <a href="https://www.open-sec.com/#company" class="nav-link" target="_blank">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <?php include './templates/scripts.php' ?>

</body>

</html>
