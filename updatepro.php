<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Product</h2>
        <?php
        //updating product logic
            include 'Database.php';
            if (isset($_GET['update'])) {
                $updateid = $_GET['update'];
                $sql = "SELECT * FROM web_con WHERE id = $updateid";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $productName = $row['P_name'];
                    $productPrice = $row['price'];
                    $productImage = $row['Image'];

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $newProductName = $_POST['productName'];
                        $newProductPrice = $_POST['productPrice'];
                       
                        $updateSql = "UPDATE web_con SET P_name='$newProductName', price=$newProductPrice WHERE id=$updateid";
                        if (mysqli_query($conn, $updateSql)) {
                            header('Location: Content.php');
                            exit();
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    }
                    echo '<form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" class="form-control" id="productName" name="productName" value="'.$productName.'" required>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price:</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" value="'.$productPrice.'" required>
                            </div>
                            <input type="hidden" name="updateid" value="'.$updateid.'">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>';
                }
            } 
            else 
            {
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
