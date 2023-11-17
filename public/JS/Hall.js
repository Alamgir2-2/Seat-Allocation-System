$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var hall_id = $("#hallId").val();
        var hall_name = $("#hallName").val();
        var total_seat = $("#totalSeat").val();
        var available_seat = $("#availableSeat").val();
        var total_student = $("#totalStudent").val();
        var block_id = $("#blockId").val();


        // Check if the input field is empty
        if (hall_id.trim() === "") {
            $("#nameError").text("Fill the input field").show();
        } else {
            $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/hallProcess.php",
                data: {
                    insert_data: true,
                    hall_id: hall_id,
                    hall_name: hall_name,
                    total_seat: total_seat,
                    available_seat: available_seat,
                    total_student: total_student,
                    block_id: block_id
                },
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("Hall with Same Name or Id already exist !!.");
                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide'); 
                        // location.reload();
                    }
                    else if (response === "success") {
                        console.log(response);


                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide');

                        loadData();
                        // location.reload();
                        toastr.success("Data inserted successfully");
                    }
                    else {
                        toastr.error("Error inserting data.");
                    }
                },
                error: function () {
                    toastr.error("Error inserting data2.");
                }
            });
        }

    });

    // Delete Data 
    $(document).on("click", ".delete_btn", function () {
        if (confirm("Are you sure you want to delete this data?")) {
            var hall_id = $(this).closest('tr').find('.hall_id').text();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/hallProcess.php",
                data: {
                    delete: true,
                    hall_id: hall_id,

                },
                success: function (response) {
                    toastr.success("Data Delete successfully");
                    // $('#tableBody').empty();
                    loadData();
                }
            });
        }
    });


});




// Load Data On Table
function loadData() {
    $.ajax({
        type: "GET",
        url: "../../app/Admin/hallData.php",

        success: function (response) {
            console.log(response);
            $('#tableBody').empty();

            var serialNumber = response.length;

            $.each(response, function (key, value) {
                console.log(response);
                $('#tableBody').prepend(
                    '<tr>' +
                    '<td class="hall_id d-none">' + value['hall_id'] + '</td>\
                    <td class = "fw-bold">' + serialNumber + '</td>\
                    <td>'+ value['hall_name'] + '</td>\
                    <td>'+ value['total_seat'] + '</td>\
                    <td>'+ value['available_seat'] + '</td>\
                    <td>'+ value['total_student'] + '</td>\
                    <td>'+ value['block_id'] + '</td>\
                    <td>\
                    <button id="delete" class="btn btn-danger btn-sm delete_btn"><i class="fa fa-trash"></i></button>\
                    <td>\
                    </td>\
                    </td>\
                    </tr>'
                );
                serialNumber--;
            });

        }
    });
}
{/* <button class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></button>\ */}