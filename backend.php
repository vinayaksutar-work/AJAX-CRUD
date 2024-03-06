<?php include 'conn.php'; ?>
<?php

extract($_POST);

if(isset($_POST['readrecord']))
{
    $data = '<table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Edit Action</th>
            <th>Delete Action</th>
        </tr>';
        $display = "SELECT * FROM crud";
        $result = mysqli_query($conn, $display);

        if(mysqli_num_rows($result) > 0)
        {
            $number = 1;
            while($row = mysqli_fetch_array($result))
            {
                $data .= '<tr>
                            <td>'.$number.'</td>
                            <td>'.$row['firstname'].'</td>
                            <td>'.$row['lastname'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['mobile'].'</td>                            
                            <td>
                                <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
                            </td>                            
                            <td>
                                <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>';
                        $number++;
            }
        }
        $data .= '</table>';
        echo $data;
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
{
    $sql = "INSERT INTO crud(firstname,lastname,email,mobile) 
    VALUES('$firstname','$lastname','$email','$mobile')";
    mysqli_query($conn,$sql);
}

?>