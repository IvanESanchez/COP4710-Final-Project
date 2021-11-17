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
        // Fetch environment-specific connection data
        $mariadb_username = getenv('MARIADB_USER');
        $mariadb_password = file_get_contents('/run/secrets/mariadb-password');
        $mariadb_database = getenv('MARIADB_DATABASE');

        // You should enable error reporting for mysqli before attempting to make a connection
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Initiate connection
        $mysqli = new mysqli('db', $mariadb_username, $mariadb_password, $mariadb_database, 3306);

        // Set the desired charset after establishing a connection
        $mysqli->set_charset('utf8mb4');
        
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