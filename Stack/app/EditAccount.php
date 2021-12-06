<?php
  $user_data = [];

  // Check if uid provided via GET which will let us know what user's content to show
  if(isset($_GET['uid'])) {
    // Get data for this user
    $user_data = get_user_no_pw($_GET['uid']);
  }
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content= "Andy Garcia and Bootstrap contributors">

    <title>Modify User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/base.css">
    <link rel = "stylesheet" href = "css/navbar.css">
  </head>
  <body>
    <div class="wrapper">
      <?php
        include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
      ?>
      <div class="Center-section">
        <div class="header h2 mt-3 mb-4">Modify <?php echo $user_data['name'] ?></div>
        <table class="mt-3 table table-striped">
          <thead class="table-dark">
            <tr align="center">
              <th style="width: 30%">Email</th>
              <th>Name</th>
              <th style="width: 25%">Admin Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                // Make admin value a string
								if ($user_data["admin"]) {
									$admin = "Yes";
								} else {
									$admin = "No";
								}

                // Display table
                echo '<td>' . $user_data['email'] .'</td><td>' .
                $user_data['name'] . '</td><td class="text-center">' . $admin . '</td>';
              ?>
            </tr>
          </tbody>
        </table>
        <form action="ChangeEmail.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="email" type="text" class="form-control" id="email" placeholder="Change Email to" required>
			  	  <label for="email">Change Email</label>
          </div>
          <input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Change Email">
        </form>
        <form action="ChangePassword.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="password" type="text" class="form-control" id="password" placeholder="Change Password to" required>
			  	  <label for="password">Change Password</label>
          </div>
          <input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Change Password">
        </form>
        <form action="ChangeName.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="name" type="text" class="form-control" id="name" placeholder="Change Name to" required>
			  	  <label for="name">Change Name</label>
          </div>
          <input type="submit" class = "mt-3 mb-3 w-50 btn-lg btn-primary" value="Change Name">
        </form>
      </div>
    </div>
  </body>
</html>