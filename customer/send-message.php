<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        #contact-side{
            margin-top:50px;
        }

        #search-button{
            margin-top:20px;
        }

        #contact-us{
            margin-top:50px;
            color:info;
        }
    </style>
</head>
<section class="mb-4">

    <!--Section heading-->
    <h2 id="contact-us" class="h1-responsive font-weight-bold text-center">Contact us</h2>
    <!--Section description-->
    <!-- <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly.</p> -->

    <div class="row" id="contact-side">
        <div class="col-md-1">

        </div>
        <!--Grid column-->
        <div  class="col-md-7 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="send-message-result.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control">

                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control">

                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">

                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2"
                                class="form-control md-textarea"></textarea>

                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <div id="search-button" class="text-center text-md-left">
                    <input type="submit" class="btn btn-info" value="Send">
                </div>
                <div class="status"></div>
            </form>

            
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Antalya, Kaş, TR</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 90 242 567 42 66</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@boutiquehotel.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->
        <div class="col-md-1">

        </div>
    </div>

</section>
<!--Section: Contact v.2-->