<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-...your-sha512-here..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Students</title>
</head>

<body>
<h4 class="text-center mt-4">Students</h4>
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
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-plus"></i> Student</button>
                </div>

                <div class="m-2 text-center">
                    <div class="table-responsive rounded">
                        <table id="myTable" class="table table-striped border border-3">

                            <thead>
                                <tr>
                                    <!-- <th scope="col" class="text-nowrap">Id</th> -->
                                    <th scope="col" class="text-nowrap">Student Id</th>
                                    <th scope="col" class="text-nowrap">Name</th>
                                    <th scope="col" class="text-nowrap">Department</th>
                                    <th scope="col" class="text-nowrap">Session</th>
                                    <th scope="col" class="text-nowrap">Hall</th>
                                    <th scope="col" class="text-nowrap">Room</th>
                                    <th scope="col" class="text-nowrap">Block</th>
                                    <th scope="col" class="text-nowrap">Action</th>
                                </tr>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" id="myForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label  class="col-form-label">Student Id</label>
                                        <input type="text" name="stu_id" class="form-control" id="stuendtId" required>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileId" class="col-form-label">Name</label>
                                        <input type="text" name="stu_name" class="form-control required stuendtName"
                                            id="stuendtName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label  class="col-form-label">Department</label>
                                        <input type="text" name="dept" class="form-control" id="deptName" required>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="session" class="col-form-label">Session</label>
                                        <input type="text" name="session" class="form-control required "
                                            id="session" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hall" class="col-form-label">Hall</label>
                                        <input type="text" name="hall_name" class="form-control required hallName"
                                            id="hallName" required>
                                        <!-- <small id="idError">Fill the input field</small> -->
                                    </div>
                                    <div class="mb-3">
                                        <label  class="col-form-label">Room</label>
                                        <input type="text" name="room" class="form-control" id="roomNo" required>
                                        <span id="nameError" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="block" class="col-form-label">Block</label>
                                        <input type="text" name="block" class="form-control required block"
                                            id="block" required>
                                        <!-- <small id="idError">Fill the input field</small> -->
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
                <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
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
                </div>
            </div>
        </div>
    </div>







   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/JS/students.js"></script>
    <script src="../../public/JS/search.js"></script>
</body>

</html>