<?php include 'conn.php'; ?>
<?php

extract($_POST);

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
{
    $sql = "INSERT INTO crud(firstname,lastname,email,mobile) 
    VALUES('$firstname','$lastname','$email','$mobile')";
    mysqli_query($conn,$sql);
}

?>