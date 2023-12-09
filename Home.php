<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Awesome Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Style/style.css">
    <style>
        body {
            height:50vh;
            background-size: cover;
            background-position: center;
            color: white; /* Text color */
        }

        .center-text {
            text-align: center;
            padding: 100px 0; /* Adjust the padding as needed */
        }
    </style>
</head>
<body class="Home" Style="background:maroon">
    <header>
        <?php include 'Global_files\globalheader.php' ; ?>
    </header>
    <section class="container my-5">
        <div class="row">
            <div class="col-md-12 center-text">
                <h2>Welcome to Our Awesome Website</h2>
                <p>This is the home page of our awesome website. Learn more about us!</p>
            </div>
        </div>
    </section>
    <footer>
        <?php include 'Global_files\globalfooter.php'; ?>
    </footer>
    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
