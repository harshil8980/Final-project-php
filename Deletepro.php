<?php
// Include the database connection
include 'Database.php';

// Check if the product ID is set in the URL
if(isset($_GET['deleteid'])) {
    $productID = $_GET['deleteid'];

    // Prepare and execute the delete query
    $deleteQuery = "DELETE FROM web_con WHERE id = $productID";
    if(mysqli_query($conn, $deleteQuery)) {
        // Redirect back to the product list page after deletion
        header("Location: Content.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "Product ID not provided.";
}
?>
