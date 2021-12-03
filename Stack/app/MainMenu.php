<!DOCTYPE html>
<html lang = "en">
<html>

<head>
  <meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content= "Andy Garcia and Bootstrap contributors">

  <title>BookStore Menu</title>

  <link rel = "stylesheet" href =
	"https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "css/navbar.css">

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
      margin-left: 15%;
      padding-top: 35px;
      font-size: 30px;
    }

    .wrapper .Center-section .main-text{
      margin-left: 15%;
      padding-top: 20px;
      font-size: 20px;
    }

    .wrapper .Center-section .pegasus-img{
      margin-left: 25%;
      padding-top: 10%;
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
        <br/>1.) Submit a new book request form
        <br/>2.) View book list request forms
        <br/>3.) Edit previously created forms
        <br/>All actions can be executed by pressing the buttons on the left.
      </div>

      <!--If the user is a worker and not a professor use this text.-->

      <!-- The pegasus will be edited in photoshop to match the background-->
      <div class="pegasus-img mt-3">
        <img src="pegasus.png" alt ="ucf-logo" width="200">
      <div>

   </div>




</body>




</html>
