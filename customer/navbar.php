<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hotel Software</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark d-flex justify-content-between">
      <div class="d-flex align-items-center">

          <!-- Links -->
          <ul class="navbar-nav" style="margin: auto;">
              <!-- Hoetl logo -->
              <a class="navbar-brand" href="home.php" target="_self">
                  <img src="../docs/images/logo.png" alt="logo" style="width:70px;">
              </a>
              <li class="nav-item active p-3 ">
                  <a class="nav-link" href="<?php $link="about-hotel.php"; echo $link ?>" >About Hotel</a>
              </li>
              <li class="nav-item active p-3">
                <a class="nav-link" href="customer-reservation.php">New Reservation</a>
              </li>
              <li class="nav-item active p-3">
                  <a class="nav-link" href="customer-reservation-update.php">My Reservations</a>
              </li>

          </ul>
      </div>

      <div>
          
          <ul class="navbar-nav">
              <li class="nav-item active ">
                  <a class="nav-link" href="#">Logout</a>
              </li>
          </ul>
      </div>
    </nav>