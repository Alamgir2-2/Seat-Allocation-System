<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../Login/login.php");
    exit();
}
include("./adminHeader.php");

$_SESSION['currentPage'] = isset($_SESSION['currentPage']) ? $_SESSION['currentPage'] : 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-...your-sha512-here..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('dashboard', './dashboard.php')">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('students','./students.php')">
                                <i class="fas fa-shopping-cart"></i> Students
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('hall', './hall.php')">
                                <i class="fas fa-users"></i> Halls
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('products','./products.php')">
                                <i class="fas fa-box"></i> Blocks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('products','./products.php')">
                                <i class="fas fa-box"></i> Rooms
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content area -->
            <main id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Content goes here -->
                <div id="dynamic-content"></div>
            </main>
        </div>
    </div>


<!-- Load Content -->
    <script>
        $(document).ready(function () {
            // Load the content based on the session variable
            loadContent('<?php echo $_SESSION['currentPage']; ?>', './<?php echo $_SESSION['currentPage']; ?>.php');
        });

        function loadContent(page, url) {
            // Update URL with parameters
            window.history.pushState({ page: page }, null, "?page=" + page);

            // Store the current page in a session variable
            <?php $_SESSION['currentPage'] = "' + page + '"; ?>

            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    $('#dynamic-content').html(data);
                },
                error: function () {
                    $('#dynamic-content').html('Error loading content.');
                }
            });
        }

        // Check for parameters on page load and load content accordingly
        $(document).ready(function () {
            const params = new URLSearchParams(window.location.search);
            const page = params.get('page');
            if (page) {
                loadContent(page, './' + page + '.php');
            }
        });
    </script>
</body>

</html>