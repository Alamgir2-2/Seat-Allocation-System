<?php
include("../header.php");
$_SESSION['currentPage'] = isset($_SESSION['currentPage']) ? $_SESSION['currentPage'] : 'studentInfo';
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Student Information</title>
</head>

<body class="">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="" alt="">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('studentInfo', './studentInfo.php')">
                                <i class="fas fa-users"></i> Student Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('hallInfo','./hallInfo.php')">
                                <i class="fas fa-building"></i> Hall Info
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('roomInfo', './roomInfo.php')">
                                <i class="fas fa-boxes"></i> Room Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="loadContent('apply', './apply.php')">
                                <i class="fas fa-align-left"></i> Apply
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
            const currentPage = localStorage.getItem('currentPage');
            loadContent(currentPage || '<?php echo $_SESSION['currentPage']; ?>', './<?php echo $_SESSION['currentPage']; ?>.php');
        });

        function loadContent(page, url) {
            window.history.pushState({ page: page }, null, "?page=" + page);
            localStorage.setItem('currentPage', page);

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