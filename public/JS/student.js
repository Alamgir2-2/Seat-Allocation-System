$(document).ready(function () {
    loadData();


    // Insert Data
    $('#submitBtn').click(function () {
        var stu_id = $("#stuendtId").val();
        var stu_name = $("#stuendtName").val();
        var dept = $("#deptName").val();
        var session = $("#session").val();
        var hall = $("#hallName").val();
        var room = $("#roomNo").val();
        var block = $("#block").val();


        // Check if the input field is empty
        if (stu_id.trim() === "") {
            $("#nameError").text("Fill the input field").show();
        } else {
            $("#nameError").hide();

            $.ajax({
                type: "POST",
                url: "../../app/Admin/studentProcess.php",
                data: {
                    insert_data: true,
                    stu_id: stu_id,
                    stu_name: stu_name,
                    dept: dept,
                    session: session,
                    hall: hall,
                    room: room,
                    block: block
                }, 
                success: function (response) {
                    // alert(response);

                    if (response === "duplicate") {
                        toastr.error("File with Same Name or ID already exist !!.");
                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide');
                        // location.reload();
                    }
                    else if (response === "success"){
                        // console.log(response);
                        

                        $("#myForm")[0].reset();
                        $('#exampleModal').modal('hide');
                        
                        loadData();
                        // location.reload();
                        toastr.success("Data inserted successfully");
                    }
                    else{
                        toastr.error("Error inserting data.");
                    }
                },
                error: function () {
                    toastr.error("Error inserting data.");
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
            // console.log(response);
            $('#tableBody').empty();

            $.each(response, function (key, value) {
                // console.log(value['stu_name']);
                $('#tableBody').prepend(
                    '<tr>' +
                    '<td>' + value['stu_id'] + '</td>\
                    <td>'+ value['stu_name'] + '</td>\
                    <td>'+ value['dept'] + '</td>\
                    <td>'+ value['session'] + '</td>\
                    <td>'+ value['hall'] + '</td>\
                    <td>'+ value['room'] + '</td>\
                    <td>'+ value['block'] + '</td>\
                    <td>\
                    <button id="delete" class="btn btn-danger btn-sm delete_btn"><i class="fa fa-trash"></i></button>\
                    <button class="btn btn-primary btn-sm edit_btn"><i class="fa fa-edit"></i></button>\
                    <td>\
                    </td>\
                    </td>\
                    </tr>'
                );
            });
            
        }
    });
}