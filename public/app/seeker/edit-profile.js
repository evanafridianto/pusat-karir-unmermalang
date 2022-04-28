$(function() {
    $("input, select").bind("keyup change input", function() {
        $(this).next(".text-danger").empty();
    });

    // Datepicker
    $(".fc-datepicker").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    province(); //data province
    cityByProv($('[name="province"]').val(), $('[name="city_id"]').val());
    $('[name="province"]').change(function(e) {
        var id = $(this).val();
        cityByProv(id);
    });
    $("#destoryLogo").click(function(e) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: route("seeker.logo.destroy", $('[name="old_logo"]').val()),
            type: "DELETE",
            dataType: "JSON",
            success: function(response) {
                window.location.reload();
            },
            error: function(response) {},
        });
    });

    $('[name="logo"]').change(function() {
        readURL(this);
        // $("#thumbnail-preview").prev().remove();
    });
});

function store(step) {
    var btnNext0 = $(".btn-next0");
    var btnNext1 = $(".btn-next1");
    var btnNext2 = $(".btn-next2");
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
        btnNext2.html(
            'Simpan<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnNext2.attr("disabled", true);
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: route("seeker.profile.store", step),
        data: new FormData($("#SeekerEditProfile")[0]),
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (step == 0) {
                if (data.next) {
                    btnNext0.html(
                        'Berikutnya<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    $(".btnStep0").click();
                } else {
                    $.each(data.error, function(key, value) {
                        if (key == "logo") {
                            $("#logo-error").text(value);
                        } else {
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        }
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
                    btnNext2.html(
                        'Simpan<span class="fa fa-angle-right fa-sm ml-1"></span>'
                    );
                    // $(".btnStep2").click();
                    $("#SeekerEditProfile")[0].reset();
                    $.confirm({
                        title: "Sukses!",
                        content: "Profil berhasil diupdate!",
                        type: "green",
                        typeAnimated: true,
                        buttons: {
                            OK: {
                                btnClass: "btn-green",
                                action: function() {
                                    window.location.replace(
                                        $(".back").attr("href")
                                    );
                                    // history.back();
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
                btnNext2.html(
                    'Simpan<span class="fa fa-angle-right fa-sm ml-1"></span>'
                );
                btnNext2.attr("disabled", false);
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
                btnNext1.html(
                    'Simpan<i class="fa fa-angle-right fa-sm ml-1"></i>'
                );
                btnNext1.attr("disabled", false);
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