<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link rel = "stylesheet" href = "css/navbar.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
	/* Style sheet organized the data in a ux friendly manner */

    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      font-family: 'Roboto', sans-serif;
    }

    body{
      background: #EEEEEE;
    }

    .wrapper{
      display: flex;
      position: relative;
    }

    .wrapper .Center-section{
      width: 100%;
      margin-left: 200px;
    }

    .wrapper .Center-section .header{
      margin-left: 30%;
      padding-top: 80px;
      font-size: 30px;
    }

    .wrapper .Center-section .main-text{
      margin-left: 30%;
      padding-top: 20px;
      font-size: 20px;
    }

    .wrapper .Center-section .pegasus-img{
      margin-left: 35%;
      padding-top: 5%;
    }



  </style>


</head>
<body>

	<!-- The following code is used for the side bar menu options -->
  <div class="wrapper">
    <?php
      include("templates/navbar.php");
    ?>

    <div class="Center-section">
      <div class="header h3 mt-3 mb-4">Welcome to the UCF BookStore</div>

			<!-- Center text that shows the person logining in what they must do -->
      <div class="main-text"> The following actions should be performed by a professor.
        <br/><a href="BookForm.html" ><button type="button"  class="btn btn-secondary">Submit a new book request form</button></a>
        <a href="#" ><button type="button"  class="btn btn-secondary">View book list request forms</button></a>
        <a href="#" ><button type="button"  class="btn btn-secondary">Edit previously created forms</button></a>
        <br/>All actions can be executed by pressing the buttons on the left as well.
      </div>

      <!--If the user is a worker and not a professor use this text.-->

      <!-- The pegasus will be edited in photoshop to match the background-->
      <div class="pegasus-img mt-3">
        <img src="pegasus.png" alt ="ucf-logo" width="200">
      <div>

   </div>




</body>




</html>
