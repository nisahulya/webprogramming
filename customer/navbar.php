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
      <a href="about-hotel.php" >About Hotel</a>
      <a href="customer-reservation.php">New Reservation</a>
      

      <?php if(isset($_SESSION["User"])){ ?>
        <a href="customer-reservation-update.php">My Reservations</a>
      <?php }else{ ?>
        
      <?php } ?>

    
      <?php if(isset($_SESSION["User"])){ ?>
      <a style="float:right"  href="exit.php">Logout</a>
      <?php }else{ ?>
        <a style="float:right" data-toggle="modal" data-target="#loginModal" href="">Login</a>
      <?php } ?>

      <?php if(isset($_SESSION["User"])){ ?>

      <?php }else{ ?>
        <a style="float:right" data-toggle="modal" data-target="#registerModal" href="">Sign-up</a>
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
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 170px;">New
                        message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form class="form-signin pb-2" action="memberlogin.php" method="post">
                        <img class="mb-4" src="../docs/images/logo.png" alt="" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
                        <label  class="sr-only" >User Name</label>
                        <input type="text"  class="form-control" placeholder="User Name" name="username"
                            required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control"
                            placeholder="Password" name="password" required>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        <!-- <button data-toggle="modal" data-target="#registerModal" class="btn btn-lg btn-info btn-block" type="submit" data-dismiss="modal">Sign in</button> -->
                        <p class="my-2 text-muted p-0">&copy; nisahulya</p>
                    </form>
                </div>
            </div>
        </div>
      </div>


      <div class="modal fade text-center" id="registerModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 170px;">New
                        message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form class="form-signin pb-2" action="signupresult.php" method="post">
                        <img class="mb-4" src="../docs/images/logo.png" alt="" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign-up</h1>
                        <label  class="sr-only">Username</label>
                        <input type="text"  name="username" id="userName" class="form-control " placeholder="Username"
                            required autofocus>

                        <label for="userName" class="sr-only">First Name</label>
                        <input type="text"  name="first_name" id="userName" class="form-control " placeholder="First Name"
                            required autofocus>
    
                        <label for="userlastName" class="sr-only">Last Name</label>
                        <input type="text"  name="last_name" id="userlastName" class="form-control "
                            placeholder="Last Name" required>
    
                        <label for="userPhone" class="sr-only">Phone Number</label>
                        <input type="text"  name="tel_no" id="userPhone" class="form-control "
                            placeholder="Phone Number" required>

                            <label for="userTcNo" class="sr-only">Tc No</label>
                        <input type="text"  name="tc_no" id="userTC" class="form-control "
                            placeholder="Tc No" required>
    
                        <label for="inputEmail" class="sr-only">E-Mail</label>
                        <input type="email"  name="email" id="inputEmail" class="form-control " placeholder="E-Mail"
                            required>
    
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control"
                            placeholder="Password" required>
    
                        <input  data-toggle="modal" data-target="#signupresultModal"
                            class="btn btn-lg btn-success btn-block" type="submit"  value="Sign-up">
                        <p class="my-2 text-muted p-0">&copy; nisahulya</p>
                    </form>
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

<?php
// $DatabaseConnection	=	null;
?>