<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="Style/style.css">
</head> 
<body>
<header>
<?php include 'Global_files\globalheader.php'; ?>
</header>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Register</h3>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
        <label for="image">Profile Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
      <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Register</button>
      </form>
      </div>
    </div>
  </div>
  </div>
</div>
<footer>
<?php include 'Global_files\globalfooter.php'; ?>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
include 'Database.php';


if (isset($_POST["submit"]))
 {
      $name1 = $_POST['name'];
      $pass = $_POST['password'];
      $haspass = password_hash($pass, PASSWORD_DEFAULT);
      $mail = $_POST['email'];
      $duplicate="SELECT *FROM admin1 where email='$mail' or pass='$pass'";
      $result1=mysqli_query($conn,$duplicate);
      if (mysqli_num_rows($result1) > 0) {
        echo "<script>alert('User alredy registered!');</script>";
      }
      else
      {
      // File upload handling
      $targetDirectory = __DIR__ . "/uploads/";
      $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      // ... (Rest of the code)
      // Check file size (adjust as needed)
      if ($_FILES["image"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats (you can modify this as needed)
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      } else {
        // If everything is OK, try to upload the file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

            // Insert data into the database
            $imagePath = $targetFile;
            $sql = "INSERT INTO admin1 VALUES ('$name1', '$mail', '$haspass', '$imagePath')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('User successfully registered!');</script>";
            } else {
                echo "Error inserting data into the database: " . mysqli_error($conn);
            }
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
    }
// Close the database connection
mysqli_close($conn);
?>
