<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update User</h2>
        <?php
            include 'Database.php';
            //update logic
            if (isset($_GET['updateid'])) {
                $updateid = $_GET['updateid'];
                $sql = "SELECT * FROM admin1 WHERE email = '$updateid'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    //name,email,pass updating
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['Name'];
                    $email = $row['email'];
                    $pass = $row['pass'];

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $newName = $_POST['name'];
                        $newEmail = $_POST['email'];
                        $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $updateSql = "UPDATE admin1 SET Name='$newName', email='$newEmail', pass='$newPass' WHERE email='$updateid'";
                        if (mysqli_query($conn, $updateSql)) {
                            header('Location: display.php');
                            exit();
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    }
                    //form logic
                    echo '<form method="post" action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="'.$name.'" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="'.$email.'" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="'.$pass.'" required>
                            </div>
                            <input type="hidden" name="updateid" value="'.$updateid.'">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>';
                }
            } else {
                echo "Update ID not set.";
            }
        ?>
    </div>

    <!-- Bootstrap JS (optional, for certain features) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
