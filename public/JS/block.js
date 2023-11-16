$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var block = $("#block").val();
        var num_room = $("#numofRoom").val();
        var kitchen = $("#numofKitchen").val();
        var washroom = $("#numofWashroom").val();


        // Check if the input field is empty
        // if (room_num.trim() === "") {
        //     $("#nameError").text("Fill the input field").show();
        // } else {
            // $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/blockProcess.php",
                data: {
                    insert_data: true,
                    block: block,
                    num_room: num_room,
                    kitchen: kitchen,
                    washroom: washroom
                },
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("Block with Same Name already exist !!.");
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
        // }

    });

    // Delete Data 
    $(document).on("click", ".delete_btn", function () {
        if (confirm("Are you sure you want to delete this data?")) {
            var block_id = $(this).closest('tr').find('.block_id').text();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/blockProcess.php",
                data: {
                    delete: true,
                    block_id: block_id,

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
        url: "../../app/Admin/blockData.php",

        success: function (response) {
            console.log(response);
            $('#tableBody').empty();

            $.each(response, function (key, value) {
                console.log(response);
                $('#tableBody').append(
                    '<tr>' +
                    '<td class="block_id d-none">' + value['block_id'] + '</td>\
                    <td>'+ value['block'] + '</td>\
                    <td>'+ value['num_room'] + '</td>\
                    <td>'+ value['kitchen'] + '</td>\
                    <td>'+ value['washroom'] + '</td>\
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