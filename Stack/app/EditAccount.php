<?php
  // Check if uid provided via GET which will let us know what user's content to show
  if(isset($_GET['uid'])) {
    // Get data for this user
    
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
        <div class="header h2 mt-3 mb-4">Modify </div>
      </div>
    </div>
  </body>
</html>