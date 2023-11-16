<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h1 class="text-center">Student Information</h1>

    <div class="container card">
        <div class="card-body">
            <div>
                <form id="searchForm">
                    <label class="" for="studentId">Enter Student ID</label>
                    <div class="d-flex">
                        <input class="form-control w-25" type="text" id="studentId" name="studentId" required>
                        <button class="btn border" type="button" onclick="searchStudent()"> Search</button>
                    </div>
                    <span id="error-message" class="text-danger"></span>
                </form>
            </div>

            <div id="studentInfo">
                <!-- Display student information here -->
            </div>
        </div>
    </div>

    <script>
        function searchStudent() {
            var stu_id = $('#studentId').val();

            if (stu_id.trim() === '') {
                $('#error-message').text('Please enter a student ID');
                return;
            }
            $('#error-message').text('');

            // Make an AJAX request to the backend PHP script
            $.ajax({
                type: 'GET',
                url: './studentData.php',
                data: {
                    stu_id: stu_id
                },
                dataType: 'json',
                success: function (data) {
                    // Update the frontend with the retrieved student information
                    if (data.error) {
                        $('#studentInfo').html('<p>' + data.error + '</p>');
                    } else {
                        var infoHTML = '<table class="table table-striped border border-3 mt-4 text-center">' +
                            '<tbody>' +
                            '<tr><th scope="row">Name</th><td>' + data.stu_name + '</td></tr>' +
                            '<tr><th scope="row">Department</th><td>' + data.dept + '</td></tr>' +
                            '<tr><th scope="row">Hall</th><td>' + data.hall + '</td></tr>' +
                            '<tr><th scope="row">Room</th><td>' + data.room + '</td></tr>' +
                            '<tr><th scope="row">Session</th><td>' + data.session + '</td></tr>' +
                            '<tr><th scope="row">Block</th><td>' + data.block + '</td></tr>' +
                            '</tbody>' +
                            '</table>';

                        $('#studentInfo').html(infoHTML);
                    }
                },
                error: function (error) {
                    console.error('Error:', error.responseText);
                    // Handle errors
                }
            });
        }
    </script>
</body>

</html>