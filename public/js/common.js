function addUser(){
    var addUrl = window.location.origin + "/add-user/";

    $("#userModal").modal('show');
    $("#form-modal").attr('action',addUrl);
    $("#btn-update").hide();
    $("#btn-add").show();
}

function getUser(user_ID){
    var getUrl = window.location.origin + "/get-user/"+user_ID;
    var editUrl = window.location.origin + "/edit-user/"+user_ID;

    $.ajax({
        url: getUrl,
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            $("#userModal").modal('show');
            $("#btn-add").hide();
            $("#btn-update").show();
            $("#form-modal").attr('action',editUrl);
            $("#modal-title").html("Edit User");
            $("#user_id").val(response.user_detail[0].user_ID);
            $("#firstname").val(response.user_detail[0].first_name);
            $("#lastname").val(response.user_detail[0].last_name);
            $("#gender").val(response.user_detail[0].gender);
            $("#birthday").val(response.user_detail[0].birthday);
            $("#salary").val(response.user_detail[0].monthly_salary);
       
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // For debugging
            console.log(errorThrown);
        }
    });
}

function deleteUser(user_ID){
    var deleteUrl = window.location.origin + "/delete-user/" + user_ID;

    $("#deleteModal").modal('show');
    $("#delete_user_id").val(user_ID);
    $("#delete-modal").attr('action',deleteUrl);
}