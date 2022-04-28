$(function() {
    $("#formEmployer").steps({
        headerTag: "h3",
        bodyTag: "section",
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
        cssClass: "wizard wizard-style-3",
        labels: {
            current: "current step:",
            finish: '<i class="fa fa-paper-plane mg-r-10"></i>Simpan',
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
            });

            $('[name="company_name"]').focus();

            $("input, select").bind("keyup change input", function() {
                $(this).next(".text-danger").empty();
            });

            // data edit
            if ($('[name="route"]').val() === "admin.employer.edit") {
                $.ajax({
                    url: "",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $("#label-password").text("Password Baru");

                        $('[name="id"]').val(data.id);
                        $('[name="company_name"]').val(data.company_name);
                        $('[name="since"]').val(data.since);
                        $('[name="tin"]').val(data.tin);
                        $('[name="telp"]').val(data.telp);
                        $('[name="number_of_employee"]').val(
                            data.number_of_employee
                        );
                        $('[name="business_scale"]').val(data.business_scale);
                        $('[name="slug"]').val(data.slug);
                        $('[name="business_field"]')
                            .val(data.category_id)
                            .change();
                        $('[name="description"]').val(data.description);

                        $('[name="website"]').val(data.website);
                        $('[name="old_logo"]').val(data.logo);
                        if (data.file_exists) {
                            if (data.logo && data.logo != "") {
                                $("#img-preview").html(
                                    '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="/storage/logo/' +
                                    data.logo +
                                    '"></img>'
                                );
                            } else {
                                $("#img-preview").html("Logo tidak ditemukan");
                            }
                        } else {
                            $("#img-preview").html("Logo tidak ditemukan");
                        }

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

                        $('[name="user_id"]').val(data.user.id);
                        $('[name="email"]').val(data.user.email);
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
                        url: route("admin.employer.store", 0),
                        type: "POST",
                        data: new FormData($("#formEmployer")[0]),
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            validate = data;
                            console.log(data);
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
                            if (key == "slug") {
                                $("#slug-error").text(value);
                            }
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                } else if (currentIndex === 1) {
                    var validate;
                    $.ajax({
                        url: route("admin.employer.store", 1),
                        type: "POST",
                        data: $("#formEmployer").serialize(),
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            validate = data;
                            // console.log(data);
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
                            $('[name="' + key + '"]')
                                .next()
                                .text(value);
                        });
                    }
                }
                // Always allow step back to the previous step even if the current step is not valid.
            } else {
                return true;
            }
        },
        saveState: true,
        onFinishing: function(event, currentIndex) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            if (currentIndex === 2) {
                var validatefinish;
                $.ajax({
                    url: route("admin.employer.store", 2),
                    type: "POST",
                    data: new FormData($("#formEmployer")[0]),
                    contentType: false,
                    processData: false,
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
                window.location.href = route("admin.employer");
            });
        },
    });
    // preview img
    $('[name="logo"]').change(function() {
        readURL(this);
        // $("#img-preview").prev().remove();
    });
});

function select_category() {
    $('[name="business_field').empty();
    $('[name="business_field').append(
        '<option value="">Pilih kategori bidang usaha</option>'
    );
    $.ajax({
        type: "GET",
        url: route("category.select", "Business Field"),
        dataType: "JSON",
        success: function(response) {
            $.each(response, function(index, value) {
                $('[name="business_field').append(
                    $("<option>", {
                        value: value.id,
                        text: value.name,
                    })
                );
            });
        },
    });
}