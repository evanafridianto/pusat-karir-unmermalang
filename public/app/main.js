// log out
function logout() {
    swal({
        title: "Konfirmasi!",
        text: "Anda yakin ingin keluar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Log Out",
        cancelButtonText: "Cancel",
        confirmButtonClass: "btn btn-danger mg-r-5",
        cancelButtonClass: "btn btn-light mg-r-5",
        buttonsStyling: false,
    }).then(function(isConfirm) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        if (isConfirm.value === true) {
            $.ajax({
                url: route("logout"),
                data: $("#logout").serialize(),
                type: "POST",
                success: function(data) {
                    window.location.href = route("login");
                },
                error: function(response) {
                    console.log(response);
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                },
            });
        }
    });
}

$(function() {
    $("input, select").bind("keyup change input", function() {
        $(this).next(".text-danger").empty();
    });
});

function account(username) {
    $("#accountModal").modal("show");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.account", username),
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="account_id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="email"]').val(data.email);
        },
        error: function(response) {
            swal({
                type: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
}

function account_store() {
    loader(3);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: route("admin.profile.store", "account"),
        data: $("#accountForm").serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $("#accountForm")[0].reset();

                swal({
                    title: "Sukses!",
                    text: "Akun berhasil diupdate, login kembali!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1000,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                }).then(function() {
                    return $.ajax({
                        type: "POST",
                        url: route("logout"),
                        data: $("#logout").serialize(),
                        success: function(data) {
                            window.location.replace(route("login"));
                        },
                        error: function(response) {
                            swal({
                                type: "error",
                                title: "Oops...",
                                text: "Terjadi Kesalahan!",
                                showConfirmButton: false,
                                timer: 1000,
                            });
                        },
                    });
                });
            } else {
                $.each(data.error, function(key, value) {
                    $('[name="' + key + '"]')
                        .next()
                        .text(value);
                });
            }
        },
        error: function(response) {
            swal({
                type: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
}
// img preview
function readURL(input) {
    for (var i = 0; i < input.files.length; i++) {
        if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img-preview").html(
                    '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="' +
                    e.target.result +
                    '"></img>'
                );
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}

// img preview
function readURL2(input) {
    for (var i = 0; i < input.files.length; i++) {
        if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#logo").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}

// spinner button
function loader(num) {
    if (num == 1) {
        $.ajax({
            beforeSend: function() {
                $("#btn-spinner").html(
                    '<i class="spinner-border spinner-border-sm mg-r-10" ></i>' +
                    $("#btn-spinner").text()
                );
                $("#btn-spinner").attr("disabled", true);
            },

            success: function(data) {
                $("#btn-spinner").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner").text()
                );
                $("#btn-spinner").attr("disabled", false);
            },
            error: function(response) {
                $("#btn-spinner").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner").text()
                );
                $("#btn-spinner").attr("disabled", false);
            },
        });
    } else if (num == 2) {
        $.ajax({
            beforeSend: function() {
                $("#btn-spinner2").html(
                    '<i class="spinner-border spinner-border-sm mg-r-10" ></i>' +
                    $("#btn-spinner2").text()
                );
                $("#btn-spinner2").attr("disabled", true);
            },

            success: function(data) {
                $("#btn-spinner2").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner2").text()
                );
                $("#btn-spinner2").attr("disabled", false);
            },
            error: function(response) {
                $("#btn-spinner2").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner2").text()
                );
                $("#btn-spinner2").attr("disabled", false);
            },
        });
    } else if (num == 3) {
        $.ajax({
            beforeSend: function() {
                $("#btn-spinner3").html(
                    '<i class="spinner-border spinner-border-sm mg-r-10" ></i>' +
                    $("#btn-spinner3").text()
                );
                $("#btn-spinner3").attr("disabled", true);
            },

            success: function(data) {
                $("#btn-spinner3").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner3").text()
                );
                $("#btn-spinner3").attr("disabled", false);
            },
            error: function(response) {
                $("#btn-spinner3").html(
                    '<i class="fa fa-paper-plane mg-r-10"></i>' +
                    $("#btn-spinner3").text()
                );
                $("#btn-spinner3").attr("disabled", false);
            },
        });
    }
}