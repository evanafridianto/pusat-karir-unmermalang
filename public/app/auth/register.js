$(function() {
    $("input, select, textarea").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });

    $('[name="term"]').click(function() {
        if (this.checked) {
            $("#term-error").empty();
        }
    });

    // prov.
    province();
    // prov. by id
    $('[name="province"]').change(function() {
        var id = $(this).val();
        cityByProv(id);
    });

    // Datepicker
    $(".fc-datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "1980:" + new Date().getFullYear(),
    });
});

function register(step) {
    var role = $('[name="role"]').val();

    var btnNext0 = $(".btn-next0");
    var btnNext1 = $(".btn-next1");
    var btnNext2 = $(".btn-next2");
    var btnRegister = $(".btn-register");
    if (step == 0) {
        btnNext0.html(
            'Berikutnya<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnNext0.attr("disabled", true);
    } else if (step == 1) {
        btnNext1.html(
            'Berikutnya<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnNext1.attr("disabled", true);
    } else if (step == 2) {
        if (role == "employer") {
            btnRegister.html(
                'Daftar<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
            );
            btnRegister.attr("disabled", true);
        } else {
            btnNext2.html(
                'Daftar<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
            );
            btnNext2.attr("disabled", true);
        }
    } else if (step == 3) {
        btnRegister.html(
            'Daftar<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnRegister.attr("disabled", true);
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: route("register.store", step),
        data: $("#formRegister").serialize(),
        dataType: "JSON",
        success: function(data) {
            if (role == "employer") {
                if (step == 0) {
                    if (data.next) {
                        btnNext0.html(
                            'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                        );
                        $(".btnStep0").click();
                    } else {
                        $.each(data.error, function(key, value) {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                    btnNext0.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    btnNext0.attr("disabled", false);
                } else if (step == 1) {
                    if (data.next) {
                        btnNext1.html(
                            'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                        );
                        $(".btnStep1").click();
                    } else {
                        $.each(data.error, function(key, value) {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                    btnNext1.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    btnNext1.attr("disabled", false);
                } else if (step == 2) {
                    if (data.status) {
                        $("#formRegister")[0].reset();
                        $.confirm({
                            title: "Sukses!",
                            content: "Berhasil daftar, login & verifikasi email anda!",
                            type: "green",
                            typeAnimated: true,
                            buttons: {
                                OK: {
                                    btnClass: "btn-green",
                                    action: function() {
                                        window.location.replace(route("login"));
                                    },
                                },
                            },
                        });
                    } else {
                        $.each(data.error, function(key, value) {
                            if (key == "term") {
                                $("#term-error").text(value);
                            } else {
                                $('[name="' + key + '"]')
                                    .next()
                                    .text(value);
                            }
                        });
                    }
                    btnRegister.html(
                        'Daftar<i class="fa fa-angle-right fa-sm ml-1"></i>'
                    );
                    btnRegister.attr("disabled", false);
                }
            } else if (role == "seeker") {
                if (step == 0) {
                    if (data.next) {
                        btnNext0.html(
                            'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                        );
                        $(".btnStep0").click();
                    } else {
                        $.each(data.error, function(key, value) {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                    btnNext0.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    btnNext0.attr("disabled", false);
                } else if (step == 1) {
                    if (data.next) {
                        btnNext1.html(
                            'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                        );
                        $(".btnStep1").click();
                    } else {
                        $.each(data.error, function(key, value) {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                    btnNext1.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    btnNext1.attr("disabled", false);
                } else if (step == 2) {
                    if (data.next) {
                        btnNext2.html(
                            'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                        );
                        $(".btnStep2").click();
                    } else {
                        $.each(data.error, function(key, value) {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                    btnNext2.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    btnNext2.attr("disabled", false);
                } else if (step == 3) {
                    if (data.status) {
                        $("#formRegister")[0].reset();
                        $.confirm({
                            title: "Sukses!",
                            content: "Berhasil daftar, login & verifikasi email anda!",
                            type: "green",
                            typeAnimated: true,
                            buttons: {
                                OK: {
                                    btnClass: "btn-green",
                                    action: function() {
                                        window.location.replace(route("login"));
                                    },
                                },
                            },
                        });
                    } else {
                        $.each(data.error, function(key, value) {
                            if (key == "term") {
                                $("#term-error").text(value);
                            } else {
                                $('[name="' + key + '"]')
                                    .next()
                                    .text(value);
                            }
                        });
                    }
                    btnRegister.html(
                        'Daftar<i class="fa fa-angle-right fa-sm ml-1"></i>'
                    );
                    btnRegister.attr("disabled", false);
                }
            }
        },
        error: function(response) {
            if (step == 0) {
                btnNext0.html(
                    'Berikutnya<i class="fa fa-angle-right fa-sm ml-1"></i>'
                );
                btnNext0.attr("disabled", false);
            } else if (step == 1) {
                btnNext1.html(
                    'Berikutnya<i class="fa fa-angle-right fa-sm ml-1"></i>'
                );
                btnNext1.attr("disabled", false);
            } else if (step == 2) {
                if (role == "employer") {
                    btnRegister.html(
                        'Daftarr<i class="fa fa-angle-right fa-sm ml-1"></i>'
                    );
                    btnRegister.attr("disabled", false);
                } else {
                    btnNext2.html(
                        'Berikutnya<i class="fa fa-angle-right fa-sm ml-1"></i>'
                    );
                    btnNext2.attr("disabled", false);
                }
            } else if (step == 3) {
                btnRegister.html(
                    'Daftarr<i class="fa fa-angle-right fa-sm ml-1"></i>'
                );
                btnRegister.attr("disabled", false);
            }
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
                    Tutup: {
                        btnClass: "btn-green",
                        action: function() {},
                    },
                },
            });
        },
    });
}