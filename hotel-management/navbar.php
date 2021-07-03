<?php 
  require_once("../connect.php");

?>

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
        text-decoration: none;
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

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hotel Software</title>

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <!-- <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet"> -->
  </head>
 
  <body>
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="topnav" id="myTopnav">
      <a href="home.php" >
        <img src="../docs/images/logo.png" alt="logo" style="width:35px; height:25px;">
      </a>     

      <?php if(isset($_SESSION["Staff"])){ ?>
        <a href="search-room.php" >New Reservation</a>
        <a href="reservations.php" >Reservations</a>
        <a href="">Hotel Reports</a>
        <a href="messages.php">Messages</a>
        <a href="reviews.php">Reviews</a>
        <!-- <a href="comments.php">Comments</a> -->
      <?php }else{ ?>
        
      <?php } ?>

    
      <?php if(isset($_SESSION["Staff"])){ ?>
      <a style="float:right"  href="exit.php">Logout</a>
      <?php }else{ ?>
        <a style="float:right" data-toggle="modal" data-target="#loginModal" href="">Login</a>
      <?php } ?>

      <?php if(isset($_SESSION["Staff"])){ ?>

      <?php }else{ ?>

      <?php } ?>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

  
    <div class="modal fade text-center" id="loginModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 170px;"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form class="form-signin pb-2" action="stafflogin.php" method="post">
                        <img class="mb-4" src="../docs/images/logo.png" alt="" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
                        <label  class="sr-only" >User Name</label>
                        <input type="text"  class="form-control" placeholder="User Name" name="username"
                            required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password"  class="form-control"
                            placeholder="Password" name="password" required>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        <!-- <button data-toggle="modal" data-target="#registerModal" class="btn btn-lg btn-info btn-block" type="submit" data-dismiss="modal">Sign in</button> -->
                        <p class="my-2 text-muted p-0">&copy; nisahulya</p>
                    </form>
                </div>
            </div>
        </div>
      </div>

    </div>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

