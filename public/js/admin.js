$(document).ready(function () {
    console.log('admin running');

    $('.create-admin').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: site_url + '/user/create',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: new FormData($('.add_admin')[0]),
            processData: false,
            contentType: false,
            // cache: false,
            async: true,
            success: function (Responsedata) {
                console.log("success");
                if (Responsedata.status == 200) {
                    $('#successAlertModal').modal({ backdrop: 'static', keyboard: false });

                } else {
                    $('#failAlertModal').modal({ backdrop: 'static', keyboard: false });
                }
            },
            error: function (error) {
                $("#status_message").text(JSON.stringify(error.errors));
                $('#FieldRequiredAlertModal').modal('show');
                console.log('Error...');
            }
        });
    });


    $('.go_to_dashboard').click(function (e) {
        window.location.reload();
    });
});