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
                    <label>Firstname</label>
                    <input type="text" id="firstname" class="form-control" placeholder="First Name">
                    <label>Lastname</label>
                    <input type="text" id="lastname" class="form-control" placeholder="Last Name">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Email">
                    <label>Mobile No</label>
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

    <!-- update modal -->
    <div class="modal" id="user_update_modal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Modal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" id="update_firstname" class="form-control">
                    <label>Lastname</label>
                    <input type="text" id="update_lastname" class="form-control">
                    <label>Email</label>
                    <input type="email" id="update_email" class="form-control">
                    <label>Mobile No</label>
                    <input type="text" id="update_mobile" class="form-control">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateuserdetail()">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="hidden" id="hidden_user_id">
            </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function readRecords()
    {
        var readrecord = "readrecord";
        $.ajax({
            url : "backend.php",
            type : "post",
            data : { readrecord : readrecord },
            success : function(data,status){
                $('#records_content').html(data);
            }
        })
    }
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
    function DeleteUser(deleteid)
    {
        var cnfm = confirm("Are you sure you want to delete this user");
        if(cnfm == true){
            $.ajax({
                url : "backend.php",
                type : "post",
                data : { deleteid : deleteid },
                success : function(data,status){
                    readRecords();
                }
            })
        }
    }
    function GetUserDetails(id)
    {
        $('#hidden_user_id').val(id);
        $.post("backend.php",{ id:id },
        function(data,status){
            var user = JSON.parse(data);
            $('#update_firstname').val(user.firstname);
            $('#update_lastname').val(user.lastname);
            $('#update_email').val(user.email);
            $('#update_mobile').val(user.mobile);
        });
        $('#user_update_modal').modal("show");
    }
</script>
</body>
</html>