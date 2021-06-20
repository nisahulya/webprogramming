<?php include 'navbar.php'; ?>
<?php include 'footer.php'; ?>

<head>
    <style>
        #updatebutton {
            margin: 5px;
            margin-top: 40px;
        }

        #addbutton {
            margin: 5px;
            margin-top: 110px;
        }

        #comment {
            margin-left: 75px;
        }

        #commentlabel {
            margin-left: 75px;
        }

        #commenttext {
            margin-left: 66px;
        }

        #oldreservation {
            margin-left: 75px;
        }
    </style>
</head>

<body>

    <form>
        <br>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
            </div>
            <div class="col">
                <input type="tel" class="form-control" placeholder="Phone Number">
            </div>
            <form>
                <input class="btn btn-info" type="button" value="Search" onclick="msg()">
            </form>
        </div>
    </form>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="input-group">
                    
                    <textarea id="" cols="70" rows="3"
                        name="textareaAxs">Between 29/07/2021 and 03/08/2021, there is a reservation for 2 people in room number 3.</textarea>
                    <div class="">
                        <a href="C:\hotelsoftware\hotel-management\search-room.html" style="color:white;" id="updatebutton" class="input-group-button btn btn btn-info btn-block"><i
                                class="fa fa-thumbs-down"></i>Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <div>
        <p id="oldreservation">İnfo about old reservation details and comments</p>
    </div>
    <br>


    <!-- <div>
 
        <label id="commentlabel" for="comment">Comment:</label>
        <br>
        <textarea name="" id="comment" cols="70" rows="5"></textarea>
       
        <button>Add</button>
    </div> -->

    <div>
        <h4 id="commenttext">Comment:</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <br>
                    <textarea id="commentadd" cols="70" rows="6"
                        name="textareaAxs"></textarea>
                    <div class=>
                        <a style="color:white;" id="addbutton" class="input-group-button btn btn btn-info btn-block">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
