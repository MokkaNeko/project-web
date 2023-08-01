<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="../css/login.css" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>

  <!-- Main container -->
  <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!-- Sign up container -->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">

      <!-- Left Content -->
      <div class="left-content col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column">
        <div class="featured-image mb-3">
          <img src="../img/enter.png" class="img-fluid" style="width: 250px" />
        </div>
      </div>

      <!-- Right Content -->
      <div class="right-content col-md-6">
        <form action="register.php" method="post" class="regform row align-items-center">
          <div class="header-text mb-4">
            <h2 class="text-center fw-bold">Register</h2>
            <p class="text-center">Create a new account</p>
          </div>
          <!-- Username -->
          <div class="mb-3">
            <label for="regUsername" class="form-label">New Username</label>
            <input type="text" class="username form-control" name="username" id="regUsername"
              placeholder="Username must be unique" aria-label="Username" aria-describedby="basic-addon1" />
          </div>
          <!-- Password -->
          <div class="mb-3">
            <label for="regPassword" class="form-label">New Password</label>
            <input type="password" class="password form-control" name="password" id="regPassword"
              placeholder="Password with at least 8 characters" aria-label="Password" aria-describedby="basic-addon1" />
          </div>
          <!-- Repeat Password -->
          <div class="mb-3">
            <label for="repeatPassword" class="form-label">Repeat Password</label>
            <input type="password" class="password form-control" name="repeatPassword" id="repeatPassword"
              placeholder="Repeat your password" aria-label="Password" aria-describedby="basic-addon1" />
          </div>
          <!-- Error Message -->
          <div class="error-message mb-2">
            <small id="errmsg"></small>
          </div>
          <!-- Sign up button -->
          <div class="input-group mb-3">
            <button class="login btn btn-lg w-100 fs-6" name="signup" onClick="check(event)">Sign up</button>
          </div>
          <div class="sign-up row">
            <small>Already registered? <a href="/index.php">Login</a></small>
          </div>
        </form>
        <script>
        function check(event) {
          var username = document.querySelector('#regUsername').value;
          var password = document.querySelector('#regPassword').value;
          var repeatPassword = document.querySelector('#repeatPassword').value;

          if (username == "" || password == "" || repeatPassword == "") {
            document.querySelector('#errmsg').textContent = "Please fill in all fields!";
            event.preventDefault();
          } else if (password.length < 8) {
            document.querySelector('#errmsg').textContent = "Password must be at least 8 characters!";
            event.preventDefault();
          } else if (password != repeatPassword) {
            document.querySelector('#errmsg').textContent = "Password does not match!";
            event.preventDefault();
          } else {
            document.querySelector('.regform').submit();
          }
        }
        </script>
        <?php
        include('config.php');
        if (isset($_POST['signup'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];

          $verify_query = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

          if (empty($username) || empty($password)) {

          } else if (strlen($password) < 8) {

          } else if ($_POST['password'] != $_POST['repeatPassword']) {

          } else {
            if (mysqli_num_rows($verify_query) > 0) {
              echo "<script>document.querySelector('#errmsg').textContent = 'Username already exists!';</script>";
            } else {
              $query = mysqli_query($conn, "INSERT INTO user (username, password, status) VALUES ('$username', '$password', 'member')");
              if ($query) {
                echo "
                <div class='header-text mb-4'>
                <h2 class='text-center fw-bold'>Succesful</h2>
                </div>
                <div class='message row mb-5'>
                <p>Account created successfully!</p>
                <div class='col d-flex justify-content-evenly'>
                <a href='register.php'>Sign up</a>
                <a href='../index.php'> Login</a>
                </div>
                </div>
                <script>document.querySelector('.regform').style.display = 'none';</script>
                  ";
              } else {
                echo "<script>alert('Failed to create account!');</script>";
              }
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>