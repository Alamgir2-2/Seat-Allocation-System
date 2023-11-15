$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var room_num = $("#roomNumber").val();
        var num_table = $("#numofTable").val();
        var bed = $("#numofBed").val();
        var floor = $("#floorNum").val();


        // Check if the input field is empty
        if (room_num.trim() === "") {
            $("#nameError").text("Fill the input field").show();
        } else {
            $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/roomProcess.php",
                data: {
                    insert_data: true,
                    room_num: room_num,
                    num_table: num_table,
                    bed: bed,
                    floor: floor
                },
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("Room with Same Number already exist !!.");
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
            var room_num = $(this).closest('tr').find('.room_num').text();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/roomProcess.php",
                data: {
                    delete: true,
                    room_num: room_num,

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
        url: "../../app/Admin/roomData.php",

        success: function (response) {
            console.log(response);
            $('#tableBody').empty();

            $.each(response, function (key, value) {
                console.log(response);
                $('#tableBody').append(
                    '<tr>' +
                    '<td class="room_num">' + value['room_num'] + '</td>\
                    <td>'+ value['num_table'] + '</td>\
                    <td>'+ value['bed'] + '</td>\
                    <td>'+ value['floor'] + '</td>\
                    <td>\
                    <button id="delete" class="btn btn-danger btn-sm delete_btn"><i class="fa fa-trash"></i></button>\
                    <td>\
                    </td>\
                    </td>\
                    </tr>'
                );
            });

        }
    });
}
{/* <button class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></button>\ */}