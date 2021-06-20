<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<body>
    <div class="card">
        <div class="card-header text-center">
            <strong>Income Table</strong>
        </div>
        <div id="takvimkutusu" style="background-color: bisque;">
            <div class="d-grid gap-2 col-6 mx-auto" [formGroup]="">
                <div class="col-md-12" style="margin-bottom: 25px; margin-top: 25px">
                    <div class="form-row">
                        <div class="col-md-5 mb-3">
                            <label for="validationCustom1" style="margin-bottom: 10px; margin-top: 6px">
                                <h5>Start :</h5>
                            </label>
                            <input class="form-control" type="date" value="" (change)="calcTotalPrice()"
                                formControlName="" id="startDate" />
                        </div>
                        <div class="col-md-5 ">
                            <label for="validationCustom2" style="margin-bottom: 10px; margin-top: 6px">
                                <h5>End :</h5>
                            </label>
                            <input formControlName="" (change)="calcTotalPrice()" class="form-control" type="date"
                                value="" id="endDate" />

                        </div>
                        <div class="col-md-2" class="d-grid gap-2" style="margin-bottom: 45px; margin-top: 49px">
                            <button class="btn btn-info" type="button">Search</button>

                        </div>

                    </div>


                </div>

            </div>
            <div class="card text-center">
                <div class="card-header bg-transparent border-success"> <strong>Income Table</strong></div>
                <div class="card-body text-dark">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left">
                            <h6 class="m-0">Daily Income :</h6>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left">
                            <h6 class="m-0">Weekly Income :</h6>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left">
                            <h6 class="m-0">Monthly Income :</h6>
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-transparent border-success"> <strong>Total Income</strong>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h6>1234567 ₺ </h6>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</body>