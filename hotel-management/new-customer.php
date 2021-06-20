<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<body>

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2>New Customer Info:</h2>
                <form action="/action_page.php">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" id="usr" name="username">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname:</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone Number:</label>
                        <input type="tel" class="form-control" id="phonenumber" name="phonenumber">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <br><br><br><br><br><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi elementum euismod metus ut porttitor.
                    Donec placerat ante enim, nec fringilla diam laoreet in. Curabitur eu condimentum tellus. Nam rutrum
                    mi quis ex posuere posuere. Donec a arcu ac nisi sollicitudin vehicula vitae eu ligula. Proin nec
                    rhoncus nibh.
                </p>
            </div>
        </div>
        <div>
            <h3 class="text-center">Total Cost:</h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-5">

                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success">Confirm</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>


    </div>

</body>

</html>