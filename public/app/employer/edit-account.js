$(function() {
    $("input, select").bind("keyup change input", function() {
        $(this).next(".text-danger").empty();
    });
});

function store() {
    var btnSave = $("#btnSave");
    btnSave.html(
        'Simpan<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
    );
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        // url: route("employer.account.store"),
        url: route("employer.profile.store", "account"),
        data: $("#EmployerEditAccount").serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $("#EmployerEditAccount")[0].reset();
                $.confirm({
                    title: "Sukses!",
                    content: "Akun berhasil diupdate, login kembali!",
                    type: "green",
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            btnClass: "btn-green",
                            action: function() {
                                // window.location.replace(document.referrer);
                                // window.location.replace(route("logout"));
                                return $.ajax({
                                    type: "POST",
                                    url: route("logout"),
                                    data: $("#logout").serialize(),
                                    success: function(data) {
                                        window.location.replace(route("login"));
                                    },
                                    error: function(response) {
                                        $.confirm({
                                            title: "Gagal!",
                                            content: "Terjadi kesalahan!",
                                            type: "red",
                                            typeAnimated: true,
                                            buttons: {
                                                tryAgain: {
                                                    text: "Coba lagi",
                                                    btnClass: "btn-red",
                                                    action: function() {},
                                                },
                                            },
                                        });
                                    },
                                });
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
                'Simpan<span class="fa fa-angle-right fa-sm ml-1"></span>'
            );
            btnSave.attr("disabled", false);
        },
        error: function(response) {
            btnSave.html('Simpan<i class="fa fa-angle-right fa-sm ml-1"></i>');
            btnSave.attr("disabled", false);
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
                    // Tutup: {
                    //     btnClass: "btn-green",
                    //     action: function() {},
                    // },
                },
            });
        },
    });
}