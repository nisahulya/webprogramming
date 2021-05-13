<!doctype html>
<html lang="en">
  <head>
    <style>
       /* Add a black background color to the top navigation */
      .topnav {
        background-color: #17a2b8;
        overflow: hidden;
      }

      /* Style the links inside the navigation bar */
      .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }

      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #60d9eb;

      }

      /* Add an active class to highlight the current page */
      .topnav a.active {
        background-color: #0e6471;
        color: white;
      }

      /* Hide the link that should open and close the topnav on small screens */
      .topnav .icon {
        display: none;
      }
    </style>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hotel Software</title>
  </head>
 
  <body>
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="topnav" id="myTopnav">
      <a href="home.php" >
        <img src="../docs/images/logo.png" alt="logo" style="width:35px; height:25px;">
      </a>
      <a href="about-hotel.php" >About Hotel</a>
      <a href="customer-reservation.php">New Reservation</a>
      <a href="customer-reservation-update.php">My Reservations</a>
      <a style="float:right" href="#about">Logout</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <script>
      /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>

  </body>

</html>