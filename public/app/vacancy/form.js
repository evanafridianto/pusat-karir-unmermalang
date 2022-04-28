$(function() {
    $("#formVacancy").steps({
        headerTag: "h3",
        bodyTag: "section",
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
        cssClass: "wizard wizard-style-3",
        labels: {
            current: "current step:",
            finish: '<i class="fa fa-paper-plane mg-r-10"></i>Publikasikan',
            next: 'Berikutnya<i class="fa fa-angle-right mg-l-10"></i>',
            previous: '<i class="fa fa-angle-left mg-r-10"></i>Kembali',
            loading: "Loading ...",
        },
        onInit: function(event, currentIndex) {
            select_category(); //select category
            province(); //data province
            $('[name="province"]').change(function(e) {
                var id = $(this).val();
                cityByProv(id);

                // console.log(id);
            });

            $(".category-select").select2({
                tags: true,
                tokenSeparators: [",", " "],
                width: "100%",
                maximumSelectionLength: 3,
            });

            // datepicker
            $(".datepicker").datetimepicker({
                allowInputToggle: true,
                showClose: true,
                showClear: true,
                showTodayButton: true,
                format: "YYYY-MM-DD HH:mm:ss",
                icons: {
                    date: "fa fa-calendar-o",
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
                    $(".description").empty();
                }
                $('[name="description"]').val(val);
            });

            $("input, select").bind("keyup change input", function() {
                $(this).next(".text-danger").empty();
            });

            $('[name="expiry_date"]').click(function(e) {
                $(".expiry-date-error").empty();
            });

            $('[name="category_ids[]"]').change(function(e) {
                $(".category-error").empty();
            });

            $('[name="company"]').focus();

            // same address vacancy with company address
            $('[name="same_address"]').change(function() {
                $("a[href$='previous']").click(function() {
                    $('[name="same_address"]').prop("checked", false);
                });
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

            // data edit
            if ($('[name="route"]').val() === "admin.vacancy.edit") {
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

                        $('[name="category_ids[]')
                            .val(category)
                            .trigger("change");

                        var province_id = data.address.province_id;
                        var city_id = data.address.city_id;
                        var street = data.address.street;
                        var zip_code = data.address.zip_code;

                        $('[name="address_id"]').val(data.address.id);
                        $('[name="street"]').val(street);
                        $('[name="zip_code"]').val(zip_code);
                        $('[name="city"]').val(city_id).trigger("change");
                        $('[name="province"]')
                            .val(province_id)
                            .trigger("change");

                        cityByProv(province_id, city_id);

                        CKEDITOR.instances["editor"].setData(data.description);
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
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            if (currentIndex < newIndex) {
                // Step 1 form validation
                if (currentIndex === 0) {
                    var validate;
                    $.ajax({
                        url: route("admin.vacancy.store", 0),
                        type: "POST",
                        data: new FormData($("#formVacancy")[0]),
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            validate = data;
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
                    if (validate.next) {
                        return true;
                    } else {
                        $.each(validate.error, function(key, value) {
                            var messageLength = CKEDITOR.instances["editor"]
                                .getData()
                                .replace(/<[^>]*>/gi, "").length;
                            if (key == "description") {
                                if (!messageLength) {
                                    $(".description").text(value);
                                }
                            } else if (key == "category_ids") {
                                $(".category-error").text(value);
                            } else {
                                $('[name="' + key + '"]')
                                    .next()
                                    .text(value);
                            }
                        });
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
        onFinishing: function(event, currentIndex) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            if (currentIndex === 1) {
                var validatefinish;
                $.ajax({
                    type: "POST",
                    url: route("admin.vacancy.store", 1),
                    data: $("#formVacancy").serialize(),
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        validatefinish = data;
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
                if (validatefinish.status) {
                    return true;
                } else if (validatefinish.error) {
                    $.each(validatefinish.error, function(key, value) {
                        $('[name="' + key + '"]')
                            .next()
                            .text(value);
                    });
                } else {
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                }
            }
        },
        onFinished: function(event, currentIndex) {
            swal({
                title: "Sukses!",
                text: "Data berhasil disimpan!",
                type: "success",
                showConfirmButton: false,
                timer: 1000,
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
            }).then(function() {
                window.location.href = route("admin.vacancy");
            });
        },
    });
});

function select_category() {
    $('[name="category_ids[]').empty();
    $('[name="category_ids[]').append(
        '<option value="">Pilih kategori</option>'
    );
    $.ajax({
        type: "GET",
        url: route("category.select", "Major"),
        dataType: "JSON",
        success: function(response) {
            $.each(response, function(index, value) {
                $('[name="category_ids[]').append(
                    $("<option>", {
                        value: value.id,
                        text: value.name,
                    })
                );
            });
        },
    });
}

function employer_address(id) {
    $.ajax({
        type: "GET",
        url: route("admin.employer.get", id),
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