<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <!-- Main container -->
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!-- Login container -->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
      <!-- Left Content -->
      <div class="left-content col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column">
        <div class="featured-image mb-3">
          <img src="img/enter.png" class="img-fluid" style="width: 250px" />
        </div>
      </div>
      <!-- Right Content -->
      <div class="right-content col-md-6">
        <form method="post" action="php/login.php" class="row align-items-center">
          <div class="header-text mb-4">
            <h2 class="text-center fw-bold">Login</h2>
            <p class="text-center">Please login to your account</p>
          </div>
          <!-- Username -->
          <div class="input-group row mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="username form-control" id="username" name="username" placeholder="Enter username"
              aria-label="Username" aria-describedby="basic-addon1" />
          </div>
          <!-- Password -->
          <div class="input-group row mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="password form-control" id="password" name="password"
              placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon1" />
          </div>
          <!-- Error message -->
          <div class="error-message mb-2">
            <small id="errmsg"></small>
          </div>
          <!-- Login button -->
          <div class="input-group mb-3">
            <button class="login btn btn-lg w-100 fs-6" name="login" onClick="check(event)">Login</button>
          </div>
          <div class="sign-up row">
            <small>Don't have account? <a href="php/register.php">Sign up</a></small>
          </div>
        </form>
        <script>
        function check(event) {
          var username = document.querySelector('#username').value;
          var password = document.querySelector('#password').value;

          if (username == "" || password == "") {
            document.querySelector('#errmsg').textContent = "Please fill in all fields!";
            event.preventDefault();
          } else {
            document.querySelector('.login').submit();
          }
        }
        </script>
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
          echo "<script>document.querySelector('#errmsg').textContent = 'Username or Password is incorrect!';</script>";
          unset($_SESSION['login_error']);
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>