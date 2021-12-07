<!DOCTYPE html>
<html lang = "en">

  <head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content= "Andy Garcia and Bootstrap contributors">

    <title>Final Book Requests</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel = "stylesheet" href = "css/base.css">
  </head>
  <body>
    <table class="table table-dark table-hover">
      <tbody>
        <?php
          require $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';

          // Get professors
          $professors = get_all_professors_with_requests();

          // Loop through professors
          foreach($professors as $professor) {
            // Get professor's name
            $name = get_name($professor);

            // Set name to some default if one wasn't retrieved
            if ($name == null) {
              $name = 'MissingNo';
            }

            // Make a header row for the professor
            echo '<th colspan="5">' . $name . '</th>';

            // Get semesters this professor has book lists for
          }
        ?>
      </tbody>
    </table>    
  </body>
</html>