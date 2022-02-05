$(document).ready(function () {
    console.log("App running ==>");

    $('.loader').hide();

    $("#create_short_url").validate({
        url: {
            required: true,
            minlength: 3,
        }
    });

    $('.create-short-url').on('click', function (e) {
        e.preventDefault();

        if (!$('#create_short_url').valid()) {
            return false;
        }

        $('.create-short-url').prop('disabled', true);

        $.ajax({
            url: site_url + '/short_url/create',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: new FormData($('.create_short_url')[0]),
            processData: false,
            contentType: false,
            // cache: false,
            async: true,
            success: function (Responsedata) {
                console.log("success");
                if (Responsedata.status == 200) {

                    $("#short_url").append("Short url : " + `<a href='${Responsedata.data}' target="_blank">${Responsedata.data}</a>`);
                    $("#url").val("");
                }
                else {
                    if (Responsedata.message) alert(Responsedata.message);
                    else alert("Oops! Please try again");

                    $('.create-short-url').prop('disabled', false);
                }
            },
            error: function (error) {

                if (error.responseJSON && error.responseJSON.errors) {
                    alert(getValidationError(error.responseJSON.errors));
                }
                else {
                    alert("Server issue");
                }
                $('.create-short-url').prop('disabled', false);
            }
        });
    })

    $('.login').on('click', function (e) {
        e.preventDefault();

        $('.loader').show();

        $('.login').prop('disabled', true);

        $.ajax({
            url: site_url + '/login',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: new FormData($('.admin_login')[0]),
            processData: false,
            contentType: false,
            // cache: false,
            async: true,
            success: function (Responsedata) {
                $('.loader').hide();
                console.log("success");
                if (Responsedata.status == 200) {
                    console.log("success");
                    window.location.replace(site_url + '/short_url/create');
                }
                else {
                    $('.login').prop('disabled', false);

                    $('.loader').hide();

                    alert(Responsedata.message);
                    // alert("Oops! Please try again");
                }
            },
            error: function (error) {

                $('.login').prop('disabled', false);
                $('.loader').hide();

                if (error.responseJSON && error.responseJSON.errors) {
                    alert(getValidationError(error.responseJSON.errors));
                }
                else {
                    alert("Server issue");
                }
            }
        });
    })

    $('.resgiter').on('click', function (e) {
        e.preventDefault();

        $('.loader').show();

        $('.resgiter').prop('disabled', true);

        $.ajax({
            url: site_url + '/register',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: new FormData($('.user-register')[0]),
            processData: false,
            contentType: false,
            // cache: false,
            async: true,
            success: function (Responsedata) {
                $('.loader').hide();
                console.log("success");
                if (Responsedata.status == 200) {
                    console.log("success");
                    window.location.replace(site_url + '/short_url/create');
                }
                else {
                    $('.resgiter').prop('disabled', false);

                    $('.loader').hide();

                    alert(Responsedata.message);
                    // alert("Oops! Please try again");
                }
            },
            error: function (error) {

                $('.resgiter').prop('disabled', false);
                $('.loader').hide();

                if (error.responseJSON && error.responseJSON.errors) {
                    alert(getValidationError(error.responseJSON.errors));
                }
                else {
                    alert("Server issue");
                }
            }
        });
    })
});




function getValidationError(error) {
    let errorMessage = "";
    let count = 0;
    for (let key in error) {
        let keyVal = error[key];

        errorMessage = errorMessage + `\n ${++count}. ` + keyVal;
    }

    return errorMessage;
}