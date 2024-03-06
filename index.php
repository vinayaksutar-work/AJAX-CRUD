<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<title>index</title>
</head>
<body>
<div class="container my-5 ">
    <h1 class="text-primary text-uppercase text-center">AJAX CRUD OPERATION</h1>
    <div class="d-flex justify-content-end ">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open modal</button>
    </div>
    <h2 class="text-danger">All Records</h2>
    <div id="records_content">
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Firstname</label>
                    <input type="text" id="firstname" class="form-control" placeholder="First Name">
                    <label for="">Lastname</label>
                    <input type="text" id="lastname" class="form-control" placeholder="Last Name">
                    <label for="">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Email">
                    <label for="">Mobile No</label>
                    <input type="text" id="mobile" class="form-control" placeholder="Mobile No">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function addRecord()
    {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();

        $.ajax({
            url : "backend.php",
            type : "post",
            data : {
                firstname : firstname,
                lastname : lastname,
                email : email,
                mobile : mobile
            },
            success : function(data,status){
                readRecords();
            }
        })
    }
</script>
</body>
</html>