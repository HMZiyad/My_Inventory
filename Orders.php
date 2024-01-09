<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "My_Inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Ubuntu', sans-serif;
        }

        .mynav {
            color: #fff;
        }

        .mynav li a {
            color: #fff;
            text-decoration: none;
            width: 100%;
            display: block;
            border-radius: 5px;
            padding: 8px 5px;
        }

        .mynav li a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a i {
            width: 25px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 d-flex h-100">
        <div id="bdSidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-primary text-white offcanvas-md offcanvas-start" style="width: 280px;">
            <a href="#" class="navbar-brand">
                <h5><i class="fa-solid fa-bomb me-2" style="font-size: 28px;"></i>My Inventory</h5>
            </a>
            <hr>

            <ul class="mynav nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="dashboard.php" class="">
                        <i class="fa-solid fa-gauge"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="Inventory.php" class="">
                        <i class="fa-solid fa-house"></i>
                        Inventory
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="Product.php" class="">
                        <i class="fa-brands fa-product-hunt"></i>
                        Product
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="Customers.php" class="">
                        <i class="fa-solid fa-person-walking-luggage"></i>
                        Customers
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#" class="active">
                        <i class="fa-solid fa-box"></i>
                        Orders
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="Supplier.php" class="">
                        <i class="fa-solid fa-boxes-packing"></i>
                        Supplier
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="Employee.php" class="">
                        <i class="fa-regular fa-user"></i>
                        Employee
                    </a>
                </li>
            </ul>
            <hr>
            <div class="d-flex">
                <img src="img/login.jpg" class="img-fluid rounded me-2" width="50px" alt="">
                <span>
                    <h6 class="mt-1 mb-0">John Doe</h6>
                    <small>johndoe@remotedev</small>
                </span>
            </div>
        </div>

        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-success">
                <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <div class="p-4">
                <nav style="--bs-breadcrumb-divider:'>';font-size:14px">
                    <!-- Add the search form here -->
                    <form class="d-flex justify-content-end mb-2" method="GET" action="">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-search"></i></button>
                    </form>
                    <!-- End of search form -->

                    <!-- PHP code for search results -->
                    <?php
                    // Include your database connection file or establish a connection here
                    if (isset($_GET['search'])) {
                        $searchTerm = $_GET['search'];

                        // Use prepared statements to prevent SQL injection
                       // echo $searchTerm;
                        $stmt = $conn->prepare("SELECT * FROM Inventory WHERE ProductName LIKE ?");
                        $stmt->bind_param("s", $searchTerm);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        // Display search results
                        echo "<h4>Search Results:</h4>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>Product: " . $row['ProductName'] . "</p>";
                            // Add more details as needed
                        }

                        $stmt->close();
                        // Close your database connection here
                    }
                    ?>
                    <!-- End of PHP code -->

                </nav>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Your existing JavaScript and Bootstrap script includes -->
</body>

</html>
