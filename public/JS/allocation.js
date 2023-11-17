$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var student_id = $("#studentId").val();
        var room_number = $("#roomNumber").val();
        var hall_id = $("#hallId").val();
        var start_date = $("#startDate").val();
        var end_date = $("#endDate").val();


        // Check if the input field is empty
        if (student_id.trim() === "") {
            $("#nameError").text("Fill the input field").show();
        } else {
            $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/allocationProcess.php",
                data: {
                    insert_data: true,
                    student_id: student_id,
                    room_number: room_number,
                    hall_id: hall_id,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("Student with Same Id already exist !!.");
                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide'); 
                    }
                    else if (response === "success") {
                        // console.log(response);


                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide');

                        loadData();
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
            var allocation_id = $(this).closest('tr').find('.allocation_id').text();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/allocationProcess.php",
                data: {
                    delete: true,
                    allocation_id: allocation_id,

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
        url: "../../app/Admin/allocationData.php",

        success: function (response) {
            // console.log(response);
            $('#tableBody').empty();

            var serialNumber = response.length;

            $.each(response, function (key, value) {
                // console.log(response);
                $('#tableBody').prepend(
                    '<tr>' +
                    '<td class="allocation_id d-none">' + value['allocation_id'] + '</td>\
                    <td class = "fw-bold">' + serialNumber + '</td>\
                    <td>'+ value['student_id'] + '</td>\
                    <td>'+ value['room_number'] + '</td>\
                    <td>'+ value['hall_id'] + '</td>\
                    <td>'+ value['start_date'] + '</td>\
                    <td>'+ value['end_date'] + '</td>\
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