<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>All registered users</h2><a href="Content.php">Content page</a>|<a href="Home.php">Home page</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Operation</th>
            </tr>
        </thead>
       <?php
       // Start the session
            include 'Database.php';
            $sql="select *from admin1";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $name=$row['Name'];
                    $email=$row['email'];
                    $pass=$row['pass'];
                    echo'<tr>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$pass.'</td>
                    <td>
    <button type="button" class="btn btn-primary" >
        <a href="update.php?updateid='.$email.'" Style="text-decoration:none;color:#fff;">Update</a>
    </button>
    <button type="button" class="btn btn-danger">
        <a href="delete.php?deleteid='.$email.'" Style="text-decoration:none;color:#fff;">Delete</a>
    </button>
</td>';
                }
            }
       ?> <!-- Add more rows as needed -->
     </tbody>
    </table>
</div>
<!-- Bootstrap JS (optional, for certain features) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
