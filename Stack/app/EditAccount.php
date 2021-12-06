<?php
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/admin_guard.php';
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/account_management.php';
  require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/show_feedback.php';

  $user_data = [];

  // Verify user is admin
  if (am_i_admin()) {
    // Check if uid provided via GET which will let us know what user's content to show
    if (isset($_GET['uid'])) {
      require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';

      // Get data for this user
      $user_data = get_user_no_pw($_GET['uid']);
    } else if (isset($_POST['email'])) {
      // Process change email
      if (isset($_POST['uid1'])) {
        // Change to new email and catch failure
        if (change_email($_POST['uid1'], $_POST['email'])) {
          // Need to update SESSION as well
          $_SESSION['username'] = $_POST['email'];
          session_write_close();
          show_success("Changed email to <code>" . $_POST['email'] . "</code>");
          // Reload page to show update
          header('Location: EditAccount.php?uid=' . $_POST['uid1']);
        } else {
          show_error("Failed to change email to <code>" . $_POST['email'] . "</code>");
        }
      } else {
        show_error("No uid passed.");
      }
    } else if (isset($_POST['password'])) {
      // Process change password
      if (isset($_POST['uid2'])) {
        // Change to new password and catch failure
        if (change_password($_POST['uid2'], $_POST['password'])) {
          show_success("Successfully changed password.");
          // Reload page to show update
          header('Location: EditAccount.php?uid=' . $_POST['uid2']);
        } else {
          show_error("Failed to change the password.");
        }
      } else {
        show_error("No uid passed.");
      }
    } else if (isset($_POST['name'])) {
      // Process change name
      if (isset($_POST['uid3'])) {
        // Change to new name and catch failure
        if (change_name($_POST['uid3'], $_POST['name'])) {
          show_success("Changed name to <code>" . $_POST['name'] . "</code>");
          // Reload page to show update
          header('Location: EditAccount.php?uid=' . $_POST['uid3']);
        } else {
          show_error("Failed to change name to <code>" . $_POST['name'] . "</code>");
        }
      } else {
        show_error("No uid passed.");
      }
    }
  } else {
    // If not admin, redirect elsewhere
    header('Location: login.php');
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
    <link rel = "stylesheet" href = "css/manage-account.css">
    <style>
      .Center-section .header {
        margin-left: 38%;
        padding-top: 35px;
        font-size: 30px;
      }
    </style>
  </head>
  <body>
    <?php
      include $_SERVER["DOCUMENT_ROOT"] . '/templates/adminbar.php';
    ?>
    <div class="Center-section">
      <div class="header h2 mt-3 mb-4">Modify <?php echo $user_data['name'] ?></div>
      <div class="container">
        <table class="mt-3 table">
          <thead class="table-dark">
            <tr>
              <th>Email</th>
              <th>Name</th>
              <th>Admin Status</th>
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
                $user_data['name'] . '</td><td>' . $admin . '</td>';
              ?>
            </tr>
          </tbody>
        </table>
        <form action="EditAccount.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="email" type="text" class="form-control" id="email" placeholder="Change Email to" required>
            <label for="email">Change Email</label>
            <input type="hidden" name="uid1" value="<?php echo $_GET['uid']; ?>">
          </div>
          <input type="submit" class = "mt-1 mb-3 w-50 btn-lg btn-primary" value="Change Email">
        </form>
        <form action="EditAccount.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="password" type="password" class="form-control" id="password" placeholder="Change Password to" required>
            <label for="password">Change Password</label>
            <input type="hidden" name="uid2" value="<?php echo $_GET['uid']; ?>">
          </div>
          <input type="submit" class = "mt-1 mb-3 w-50 btn-lg btn-primary" value="Change Password">
        </form>
        <form action="EditAccount.php" method="post">
          <div class = "mb-2 form-floating">
            <input name="name" type="text" class="form-control" id="name" placeholder="Change Name to" required>
            <label for="name">Change Name</label>
            <input type="hidden" name="uid3" value="<?php echo $_GET['uid']; ?>">
          </div>
          <input type="submit" class = "mt-1 mb-3 w-50 btn-lg btn-primary" value="Change Name">
        </form>
      </div>
    </div>
  </body>
</html>