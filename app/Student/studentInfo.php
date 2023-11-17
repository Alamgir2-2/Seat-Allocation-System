<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Informatin</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h2 class="mt-4 text-center">Student Information</h2>
    <div class="container mt-5 card">
        <div class="card-body">
            <div>
                <form id="searchForm">
                    <label for="studentId">Enter Student ID</label>
                    <div class="form-group d-flex">
                        <input type="text" class="form-control w-25" id="studentId" name="studentId" required>
                        <button type="button" class="btn btn-primary " onclick="searchStudent()">Search</button>
                    </div>
                   
                </form>
            </div>

            <div id="resultContainer" class="mt-4"></div>
        </div>
    </div>

    <script>
        function searchStudent() {
            var studentId = $("#studentId").val();


            $.ajax({
                url: "./studentData.php", 
                method: "GET",
                data: { student_id: studentId },
                success: function (response) {
                    var data = $.parseJSON(response);

                    if (data.length > 0) {
                        var table = '<table class="table table-striped border border-2">' +
                            '<thead>' +
                            '<tr>' +
                            '<th>Student Name</th>' +
                            '<th>Department</th>' +
                            '<th>Session</th>' +
                            '<th>Hall Name</th>' +
                            '<th>Room Number</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';

                        $.each(data, function (index, row) {
                            table += '<tr>' +
                                '<td>' + row.student_name + '</td>' +
                                '<td>' + row.dept_name + '</td>' +
                                '<td>' + row.session + '</td>' +
                                '<td>' + row.hall_name + '</td>' +
                                '<td>' + row.room_number + '</td>' +
                                '</tr>';
                        });

                        table += '</tbody></table>';

                        $("#resultContainer").html(table);
                    } else {
                        $("#resultContainer").html("No results found for student id: " + studentId);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: " + status + " - " + error);
                }
            });
        }
    </script>

</body>

</html>