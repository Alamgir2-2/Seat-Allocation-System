<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h1 class="text-center">Room Information</h1>

    <div class="container card">
        <div class="card-body">
            <div>
                <form id="searchForm">
                    <label class="" for="roomNumber">Enter Room Number</label>
                    <div class="d-flex">
                        <input class="form-control w-25" type="text" id="roomNumber" name="roomNumber" required>
                        <button class="btn border" type="button" onclick="searchRoom()"> Search</button>
                    </div>
                </form>
            </div>

            <div id="roomInfo">
                <!-- Display room information here -->
            </div>
        </div>
    </div>

    <script>
        function searchRoom() {
            var roomNumber = $('#roomNumber').val();

            // Make an AJAX request to the backend PHP script
            $.ajax({
                type: 'GET',
                url: './roomData.php',
                data: {
                    roomNumber: roomNumber
                },
                dataType: 'json',
                success: function (data) {
                    // Update the frontend with the retrieved room information
                    if (data.error) {
                        $('#roomInfo').html('<p class="alert alert-danger mt-4">' + data.error + '</p>');
                    } else {
                        // Display the count and information of students in the room
                        var infoHTML = '<p class="mt-3">Number of students in Room ' + roomNumber + '- ' + data.count + '</p>';

                        if (data.students.length > 0) {
                            infoHTML += '<table class="table table-striped border">' +
                                '<thead>' +
                                '<tr><th scope="col">Student Name</th>'+
                                '<th scope="col">Department</th>'+
                                '<th scope="col">Session</th>'+
                                '<th scope="col">Hall</th>'+
                                '</tr>' +
                                '</thead>' +
                                '<tbody>';

                            for (var i = 0; i < data.students.length; i++) {
                                infoHTML += '<tr>' +
                                    '<td>' + data.students[i].stu_name + '</td>' +
                                    '<td>' + data.students[i].dept + '</td>' +
                                    '<td>' + data.students[i].session + '</td>' +
                                    '<td>' + data.students[i].hall + '</td>' +
                                    '</tr>';
                            }

                            infoHTML += '</tbody></table>';
                        }

                        $('#roomInfo').html(infoHTML);
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
