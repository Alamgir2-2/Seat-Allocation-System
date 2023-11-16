<?php
include("../header.php");
?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Login</title>
</head>

<body class="bg-info">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong border rounded-4 mt-5">
                    <div class="card-body p-5">

                        <h3 class="mb-3 text-center">Login</h3>

                        <form action="./loginProcess.php" method="post">

                            <div class="form-outline mb-3">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    required />
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="typePasswordX-2">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" required />
                            </div>

                            <button class="btn btn-primary btn-md btn-block" name="login" type="submit">Login</button>
                        </form>
                        <div id="error-message" class="text-danger mt-2 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("form").submit(function (e) {
                e.preventDefault();

                var formData = {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    login: true
                };

                $.ajax({
                    type: "POST",
                    url: "./loginProcess.php",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            window.location.href = "../Admin/adminPannel.php";
                        } else {
                            $("#error-message").html(response.message);
                        }
                    },
                    error: function () {
                        $("#error-message").html("Error occurred during AJAX request.");
                    }
                });
            });
        });
    </script>

</body>