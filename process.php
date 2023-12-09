<?php
include 'Database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];

    // File upload handling
    $targetDirectory = __DIR__ . "/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (!isset($_FILES["image"])) {
        echo "Please select an image file.";
        $uploadOk = 0;
    }

    // ... (Rest of the code)
    // Check file size (adjust as needed)
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can modify this as needed)
    $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFileTypes)) {
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
            $sql = "INSERT INTO web_con (P_name, price, Image) VALUES ('$name', '$price', '$imagePath')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Product successfully added!');</script>";
                header("Location: content.php");
               
            } else {
                echo "Error inserting data into the database: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

mysqli_close($conn);
?>