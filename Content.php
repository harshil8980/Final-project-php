<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Management</title>
        <!-- Bootstrap CSS link -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="Style/style.css">
    </head>
    <body>

    <div class="container">
    <h2>Content Page</h2>
        <h2>Add Product</h2>
        <a href="Display.php">Users page</a>|<a href="Home.php">Home page</a>
        <!-- Product Form -->
        <form method="post" action="process.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
        </div>
        <div class="form-group">
            <label for="productPrice">Product Price:</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
        </div>
        <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
        <hr>
        <h2>Product List</h2>
        <!-- Product Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                </tr>
            </thead>
            <tbody>
<?php

// Fetch and display products from the database

// Replace this with your database connection and query logic

include 'Database.php';

$sql = "SELECT id,P_name,price,SUBSTRING(Image,40,90) FROM web_con";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $name = $row['P_name'];
        $price = $row['price'];
        $path = $row['SUBSTRING(Image,40,90)'];
        echo '<tr>
                <td>' . $name . '</td>
                <td>' . $price . '</td>
                <td><img src="uploads/'.$path.'" style="max-width: 100px; max-height: 100px;"></td>
                <td>
                    <button type="button" class="btn btn-primary"><a href="updatepro.php?update='.$id.'"Style="text-decoration:none;color:#fff;">Update</a></button>
                    <button type="button" class="btn btn-danger"><a href="Deletepro.php?deleteid='.$id.'"Style="text-decoration:none;color:#fff;">Delete</a></button>
                </td>
            </tr>';
    }
}
?>

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    </html>
