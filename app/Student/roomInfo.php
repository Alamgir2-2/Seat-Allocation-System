<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h2 class="mt-4 text-center">Room Search</h2>
    <div class="container mt-5 card">
        <div class="card-body">
            <form id="searchForm">
                <label for="roomNumber">Enter Room Number</label>
                <div class="form-group d-flex">
                    <input type="text" class="form-control ml-2 w-25" id="roomNumber" name="roomNumber" required>
                    <button type="button" class="btn btn-primary ml-2" onclick="searchByRoom()">Search</button>
                </div>
            </form>

            <div id="resultContainer" class="mt-4"></div>
        </div>
    </div>

    <script>
        function searchByRoom() {
            var roomNumber = $("#roomNumber").val();

            $.ajax({
                url: "./roomData.php",
                method: "GET",
                data: { room_number: roomNumber },
                success: function (response) {
                    var data = $.parseJSON(response);

                    if (data.length > 0) {
                        var resultText = '<h4>Number of Students in Room ' + roomNumber + ': ' + data.length + '</h4>';
                        resultText += '<table class="table table-striped border border-3 mt-3">' +
                            '<thead>' +
                            '<tr>' +
                            '<th>Student Name</th>' +
                            '<th>Department</th>' +
                            '<th>Session</th>' +
                            '<th>Hall Name</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';

                        // Populate the table rows with data
                        $.each(data, function (index, row) {
                            resultText += '<tr>' +
                                '<td>' + row.student_name + '</td>' +
                                '<td>' + row.dept_name + '</td>' +
                                '<td>' + row.session + '</td>' +
                                '<td>' + row.hall_name + '</td>' +
                                '</tr>';
                        });

                        resultText += '</tbody></table>';

                        // Update the result container with the table
                        $("#resultContainer").html(resultText);
                    } else {
                        $("#resultContainer").html("No students found in Room " + roomNumber);
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