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
          require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/get_utils.php';
          require_once $_SERVER["DOCUMENT_ROOT"] . '/functions/book_request_management.php';

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
            echo '<tr><th colspan="5">' . $name . '</th></tr>';

            // Get semesters this professor has book lists for
            $semester_ids = get_reqs_semesters_for_uid($uid);

            // Get semester components (year and season) sorted, ascending
            $semesters = get_semesters_sorted_asc($semester_ids);

            // Loop through semesters
            foreach($semesters as $semester) {
              // Output semester to table
              echo '<tr><td colspan="5">' . $semester['season'] . " " .  $semester['year'] . '</td></tr>';

              // Get the book request ID for this semeser for this professor
              $brid = pull_brid($semester['skey'], $professor);

              // Get book IDs for this brid
              $book_list = get_book_list($brid);

              // Output each book to the table
              foreach($book_list as $book) {
                // Get book's data
                
              }
            }
          }
        ?>
      </tbody>
    </table>    
  </body>
</html>