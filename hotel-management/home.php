<?php include 'navbar.php'; ?>

<style>
 .hotelfoto {max-width:70%;height: auto;  position: relative; margin:auto;}

 .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='deepskyblue' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='deepskyblue' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}
</style>

<body>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100, hotelfoto" src="../docs/images/hotelfoto3.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100, hotelfoto" src="../docs/images/hotelfoto4.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100, hotelfoto" src="../docs/images/hotelfoto5.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only" >Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon"  aria-hidden="true"></span>
          <span class="sr-only" >Next</span>
        </a>
</div>

</body>

<?php include 'footer.php'; ?>   