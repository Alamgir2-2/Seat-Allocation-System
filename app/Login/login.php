<?php
include("../header.php");
?>

<?php
include("../header.php");
?>

<section class="vh-100 bg-info">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">

                        <h3 class="mb-5 text-center">Login</h3>

                        <!-- Add the form element with the appropriate action and method attributes -->
                        <form action="./loginProcess.php" method="post">

                            <div class="form-outline mb-2">
                                <!-- Add the 'name' attribute to the input fields to capture the data on form submission -->
                                <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg"
                                    required />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-2">
                                <input type="password" id="typePasswordX-2" name="password"
                                    class="form-control form-control-lg" required />
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <!-- Change the button type to 'submit' to submit the form -->
                            <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
                        </form>
                        <!-- End of form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>