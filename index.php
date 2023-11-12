<?php
include("./app/header.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Allocation System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- <style>
        .card-img-top {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }
    </style> -->
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- <div class="container">
        <h1 class="text-center">Seat Allocation System</h1>
    </div> -->

    <!-- Slider -->
    <section>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/hall1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/hall2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/hall3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Hall List -->
    <section class="container mt-4">
        <h1 class="text-center my-4">Hall List</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="./images/hall1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Mir Mosharraf Hossain Hall</h5>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./images/hall2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">A. F. M. Kamaluddin Hall</h5>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./images/hall3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Bangabandhu Sheikh Mujibur Rahman Hall</h6>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content.</p> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./images/hall4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Shaheed Salam Barkat Hall</h5>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./images/hall2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Maulana Bhashani Hall</h5>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="./images/hall3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Shahid Rafiq Jabbar Hall</h5>
                        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p> -->
                    </div>
                </div>
            </div>

        </div>
    </section>



</body>

</html>
<?php
include("./app/footer.php");
?>