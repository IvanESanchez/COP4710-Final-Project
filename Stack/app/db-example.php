<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Database Test</title>
  </head>
  <body>
    <table class="table table-dark table-striped">
      <tr>
        <th>Database Name</th>
      </tr>
      <?php
        // Obtain database connection
        require 'functions/db.php';
        
        // Perform query and store in $result
        $result = $mysqli->query("SHOW DATABASES;");

        // Loop through results
        while ($row = $result->fetch_row()) {
          // fetch_row returns columns as an enumerated array
          printf("<tr><td><code>%s</code></td></tr>\n", $row[0]);
        }
      ?>
    </table>
  </body>
</html>