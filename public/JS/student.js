$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var student_id = $("#studentId").val();
        var name = $("#name").val();
        var session = $("#session").val();
        var dept_id = $("#deptId").val();


        // Check if the input field is empty
        if (student_id.trim() === "") {
            $("#nameError").text("Fill the input field").show();
        } else {
            $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/studentProcess.php",
                data: {
                    insert_data: true,
                    student_id: student_id,
                    name: name,
                    session: session,
                    dept_id: dept_id
                },
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("Student with Same Id already exist !!.");
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
            var student_id = $(this).closest('tr').find('.student_id').text();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/studentProcess.php",
                data: {
                    delete: true,
                    student_id: student_id,

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
        url: "../../app/Admin/studentData.php",

        success: function (response) {
            console.log(response);
            $('#tableBody').empty();

            $.each(response, function (key, value) {
                console.log(response);
                $('#tableBody').append(
                    '<tr>' +
                    '<td class="student_id">' + value['student_id'] + '</td>\
                    <td>'+ value['name'] + '</td>\
                    <td>'+ value['session'] + '</td>\
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