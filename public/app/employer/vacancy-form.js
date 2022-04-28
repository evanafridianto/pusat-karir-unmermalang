$(function() {
    province(); //data province
    $('[name="province"]').change(function(e) {
        var id = $(this).val();
        cityByProv(id);

        // console.log(id);
    });

    $('[name="job_title"]').focus();

    // datepicker
    $(".datepicker").datetimepicker({
        allowInputToggle: true,
        showClose: true,
        showClear: true,
        showTodayButton: true,
        format: "YYYY-MM-DD HH:mm:ss",
        icons: {
            time: "fa-solid fa-clock",
            date: "fa-solid fa-trash",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-chevron-up",
            clear: "fa fa-trash",
            close: "fa fa-close",
        },
    });

    // ck editor
    var options = {
        height: 250,
        removePlugins: ["image", "uploadimage"],
    };
    var editor = CKEDITOR.replace("editor", options);
    // remove text-danger
    editor.on("change", function() {
        var val = editor.getData();

        if (val != "") {
            $("#description-error").empty();
        }
        $('[name="description"]').val(val);
    });

    $('[name="expiry_date"]').click(function(e) {
        $("#expiry_date-error").empty();
    });

    $('[name="category[]"]').change(function(e) {
        $("#category-error").empty();
    });

    $("input, select").bind("keyup change input", function() {
        $(this).next(".text-danger").empty();
    });

    $('[name="category[]"]').select2({
        tags: true,
        tokenSeparators: [",", " "],
        width: "100%",
        maximumSelectionLength: 3,
    });

    // same address vacancy with company address
    $('[name="same_address"]').change(function() {
        if (this.checked) {
            $(".text-danger").empty();
            var employer_id = $('[name="company"]').val();
            employer_address(employer_id);
        } else {
            $(
                '[name="province"], [name="city"], [name="street"],[name="zip_code"]'
            ).val("");
        }
    });

    if ($('[name="route"]').val() == "employer.vacancy.edit") {
        $.ajax({
            url: "",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                var category = [];
                for (var i = 0; i < data.category_ids.length; i++) {
                    let categories_id = data.category_ids[i];
                    category.push(categories_id);
                }
                $('[name="id"]').val(data.id);
                $('[name="company"]').val(data.employer_id);
                $('[name="job_title"]').val(data.job_title);
                $('[name="slug"]').val(data.slug);
                $('[name="description"]').val(data.description);
                $('[name="job_type"]').val(data.job_type);
                $('[name="expiry_date"]').val(data.expiry_date);
                $('[name="category[]').val(category).trigger("change");
                var province_id = data.address.province_id;
                var city_id = data.address.city_id;
                var street = data.address.street;
                var zip_code = data.address.zip_code;
                $('[name="address_id"]').val(data.address.id);
                $('[name="street"]').val(street);
                $('[name="zip_code"]').val(zip_code);
                $('[name="city"]').val(city_id).trigger("change");
                $('[name="province"]').val(province_id).trigger("change");
                cityByProv(province_id, city_id);
                CKEDITOR.instances["editor"].setData(data.description);
            },
            error: function(response) {
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
                        // Tutup: {
                        //     btnClass: "btn-green",
                        //     action: function() {},
                        // },
                    },
                });
            },
        });
    }
});

function store(step) {
    var btnNext0 = $(".btn-next0");
    var btnNext1 = $(".btn-next1");
    if (step == 0) {
        btnNext0.html(
            'Berikutnya<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnNext0.attr("disabled", true);
    } else if (step == 1) {
        btnNext1.html(
            'Simpan<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
        );
        btnNext1.attr("disabled", true);
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: route("employer.vacancy.store", step),
        data: new FormData($("#vacancyForm")[0]),
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
                        if (key == "description") {
                            $("#description-error").text(value);
                        } else if (key == "category") {
                            $("#category-error").text(value);
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
                if (data.status) {
                    $("#vacancyForm")[0].reset();
                    $.confirm({
                        title: "Sukses!",
                        content: "Lowongan berhasil dipublish!",
                        type: "green",
                        typeAnimated: true,
                        buttons: {
                            OK: {
                                btnClass: "btn-green",
                                action: function() {
                                    // history.back();
                                    window.location.replace(
                                        $(".back").attr("href")
                                    );
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
                btnNext1.html(
                    'Simpan<span class="fa fa-angle-right fa-sm ml-1"></span>'
                );
                btnNext1.attr("disabled", false);
            }
        },
        error: function(response) {
            if (step == 0) {
                btnNext0.html(
                    'Berikutnyar<i class="fa fa-angle-right fa-sm ml-1"></i>'
                );
                btnNext0.attr("disabled", false);
            } else if (step == 1) {
                btnNext1.html(
                    'Berikutnyar<i class="fa fa-angle-right fa-sm ml-1"></i>'
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
                    // Tutup: {
                    //     btnClass: "btn-green",
                    //     action: function() {},
                    // },
                },
            });
        },
    });
}

function employer_address(id) {
    $.ajax({
        type: "GET",
        url: route("employer.employer.get", id),
        dataType: "JSON",
        success: function(data) {
            var province_id = data.address.province_id;
            var city_id = data.address.city_id;
            var street = data.address.street;
            var zip_code = data.address.zip_code;

            $('[name="street"]').val(street);
            $('[name="zip_code"]').val(zip_code);
            $('[name="province"]').val(province_id).trigger("change");
            $('[name="city"]').val(city_id);

            cityByProv(province_id, city_id);
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