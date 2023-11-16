<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Information</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h1 class="text-center">Hall Information</h1>

    <div class="container card">
        <div class="card-body">
            <div id="hallInfo">
                <!-- Display hall information here -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Make an AJAX request to the backend PHP script
            $.ajax({
                type: 'GET',
                url: './hallInfoData.php',
                dataType: 'json',
                success: function (data) {
                    // Update the frontend with the retrieved hall information
                    if (data.error) {
                        $('#hallInfo').html('<p class="alert alert-danger">' + data.error + '</p>');
                    } else {
                        // Display hall information in a table with Bootstrap styling
                        var infoHTML = '<table class="table table-striped border text-center">' +
                            '<thead>' +
                            '<tr><th scope="col">Hall Name</th>'+
                            '<th scope="col">Total Seats</th>'+
                            '<th scope="col">Available Seats</th>'+
                            '<th scope="col">Number of Students</th>'+
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';

                        for (var i = 0; i < data.length; i++) {
                            infoHTML += '<tr>' +
                                '<td>' + data[i].hall_name + '</td>' +
                                '<td>' + data[i].total_seat + '</td>' +
                                '<td>' + data[i].avil_seat + '</td>' +
                                '<td>' + data[i].num_stu + '</td>' +
                                '</tr>';
                        }

                        infoHTML += '</tbody></table>';

                        $('#hallInfo').html(infoHTML);
                    }
                },
                error: function (error) {
                    console.error('Error:', error.responseText);
                    // Handle errors
                }
            });
        });
    </script>
</body>

</html>
