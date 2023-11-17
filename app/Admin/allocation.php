<?php
include('../database/dbConn.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-...your-sha512-here..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Students</title>
</head>

<body>
    <h4 class="text-center mt-4">Seat Allocation</h4>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-flex justify-content-between container mt-4">
                    <div class="w-25">
                        <div class="input-group input-group-sm">
                            <input type="search" id="searchInput" class="form-control" placeholder=""
                                aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-secondary btn-sm"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-plus"></i>
                        Allocation</button>
                </div>

                <div class="m-2 text-center">
                    <div class="table-responsive rounded">
                        <table id="myTable" class="table table-striped border border-3">

                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">Allocatin Number</th>
                                    <th scope="col" class="text-nowrap">Student Id</th>
                                    <th scope="col" class="text-nowrap">Room Number</th>
                                    <th scope="col" class="text-nowrap">Hall Id</th>
                                    <th scope="col" class="text-nowrap">Start Date</th>
                                    <th scope="col" class="text-nowrap">End Date</th>
                                    <th scope="col" class="text-nowrap">Action</th>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Table Data Apeare Here  -->
                            </tbody>
                        </table>
                    </div>



                </div>

                <!-- Modaal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Seat Allocation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" id="myForm">
                                <div class="modal-body">
                                    <!-- Select Student Id -->
                                    <div class="mb-3">
                                        <label class="col-form-label">Student Id</label>
                                        <select name="student_id" class="form-control required" id="studentId" required>
                                            <option value="Select Id" class="form-control">Select Id</option>
                                            <?php
                                            $sql = "SELECT * FROM `Student`";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option>' . $row["student_id"] . '</option>';
                                                }
                                            } else {
                                                echo '<option>No Block found</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Select Room Number -->
                                    <div class="mb-3">
                                        <label class="col-form-label">Room Number</label>
                                        <select name="room_number" class="form-control required" id="roomNumber" required>
                                            <option value="Select Room" class="form-control">Select Room</option>
                                            <?php
                                            $sql = "SELECT * FROM `Room`";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option>' . $row["room_number"] . '</option>';
                                                }
                                            } else {
                                                echo '<option>No Block found</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Select Hall -->
                                    <div class="mb-3">
                                    <label class="col-form-label">Hall</label>
                                        <select name="hall_id" class="form-control required" id="hallId" required>
                                            <option value="Select Hall" class="form-control">Select Hall</option>
                                            <?php
                                            $sql = "SELECT * FROM `Hall`";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option>' . $row["hall_id"] . '</option>';
                                                }
                                            } else {
                                                echo '<option>No Block found</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control required "
                                            id="startDate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">End Date</label>
                                        <input type="date" name="end_date" class="form-control required "
                                            id="endDate" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="submitBtn" name="submit"
                                        class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <!-- <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editDataLabel">Edit File</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" id="editForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="fileName" class="col-form-label">Id</label>
                                        <input type="hidden" name="id" class="form-control" id="id" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileName" class="col-form-label">Name</label>
                                        <input type="text" name="file_name" class="form-control" id="file_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileId" class="col-form-label">File Id</label> 
                                        <input type="hidden" class="form-control" id="file_id" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" name="update" id="updateBtn"
                                        class="btn btn-success btn-sm">Update</button>
                                </div> 
                            </form>

                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/JS/allocation.js"></script>
    <script src="../../public/JS/search.js"></script>
</body>

</html>