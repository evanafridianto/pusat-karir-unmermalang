$(function() {
    $('[name="image"]').change(function() {
        readURL(this);
    });

    $("input, select, textarea").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });
});

function confirmation() {
    var btnSave = $("#btnSave");
    btnSave.html(
        'Submit<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
    );
    var formData = new FormData($("#paymentConfirmation")[0]);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("store.membership"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $.confirm({
                    title: "Sukses!",
                    content: "Status membership segera diproses!",
                    type: "green",
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            btnClass: "btn-green",
                            action: function() {
                                // window.location.replace(route("vacancy"));
                                history.back();
                            },
                        },
                    },
                });
            } else {
                $.each(data.error, function(key, value) {
                    $('[name="' + key + '"]')
                        .next()
                        .text(value);
                });
            }
            btnSave.html(
                'Submit<span class="fa fa-angle-right fa-sm ml-1"></span>'
            );
            btnSave.attr("disabled", false);
        },
        error: function(response) {
            btnSave.html('Submit<i class="fa fa-angle-right fa-sm ml-1"></i>');
            btnSave.attr("disabled", false);
            console.log(response);
            $.confirm({
                title: "Gagal!",
                content: "Terjadi kesalahan!",
                type: "red",
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: "Coba lagi",
                        btnClass: "btn-green",
                        action: function() {
                            window.location.reload();
                        },
                    },
                },
            });
        },
    });
}

// img preview