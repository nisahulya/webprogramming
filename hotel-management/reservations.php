<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<head>
    <style>
        #nav-cusname{
            margin-top:50px;
        }
    </style>
</head>

<div class="tab-pane fade show active"  id="nav-cusname" role="tabpanel" aria-labelledby="nav-cusname-tab">
    <form id="searchnameform" method="POST" action="reservations-result.php">
        <div class="form-row" >
            <div class="form-group col-2">

            </div>
            <div class="form-group col-6">
                <input type="text" name="username" id="username" placeholder="Enter customer username"
                    class="form-control" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group col-2">
                <input class="btn btn-info w-100" type="submit" value="Search">
            </div>
            <div class="form-group col-2">

            </div>
        </div>
    </form>
</div>