<?php
  if (!empty($_POST['username']) and !empty($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Need to check database


    // Assuming that comes back okay...
    require "functions/no_cookies.php";
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    session_write_close();
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang = "en">
  <head>

    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content= "Andy Garcia and Bootstrap contributors">

    <title>Login</title>

    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css">

    <!-- Style sheet to make the ux simple -->
    <style>
      body{ align-items: center;
      padding-top: 100px;
      background-color: #89859D;}

      .form-signin{
      width: 100%;
      margin: auto;
      max-width: 550px;
      padding: 15px;
      background: #EEEEEE;
      border radius: 100px;}

      .form-signin .form-floating{
        margin: auto;
        max-width: 330px;
      }

      .form-signin .button{padding: 100px;}
    </style>
  </head>
  <body class = "text-center">

    <main class = "form-signin">
      <!-- This is the sign in form that contain user information -->
      <form action = "login.php" method="post">

        <h1 class = "mb-2">Book Store At</h1>

        <div class = "logo">
          <img class = "mb-3" src = "UCF.jpg" alt="" width = "300" height "57">
        </div>

        <h1 class = "h3 mb-3 fw-normal">User Login</h1>

        <div class="form-floating">
          <input name="username" type="text" class="form-control" id="username"
          placeholder="Username">
          <label for="username">Username</label>
        </div>

        <div class="form-floating">
          <input name="password" type="password" class="form-control" id="password"
          placeholder="Password">
          <label for="password">Password</label>
        </div>

        <div>
            <button class = "mt-2 mb-1 w-50 btn-lg btn-primary"
            type = "submit">Sign in
            </button>
        </div>

        <div class = "new-user">
          <a href = "NewUser.html">Create Account.</a>
        </div>

        <dic class = "forgot-password">
          <a href = "ForgotPassword.html">Forgot Password?</a>
        </div>

      </form>

    </main>

  </body>

</html>
