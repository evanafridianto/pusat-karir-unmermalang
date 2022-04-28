$(function() {
    $("#formProfile").steps({
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
            cityByProv(
                $('[name="province"]').val(),
                $('[name="city_id"]').val()
            );
            province(); //data province
            $('[name="province"]').change(function(e) {
                var id = $(this).val();
                cityByProv(id);
            });

            $("input, select").bind("keyup change input", function() {
                $(this).next(".text-danger").empty();
            });

            $('[name="logo"]').change(function() {
                readURL2(this);
                // $("#thumbnail-preview").prev().remove();
            });

            $("#destoryLogo").click(function(e) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: route(
                        "admin.logo.destroy",
                        $('[name="old_logo"]').val()
                    ),
                    type: "DELETE",
                    dataType: "JSON",
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(response) {},
                });
            });

            $('[name="company_name"]').focus();
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
                        url: route("admin.profile.store", 0),
                        type: "POST",
                        data: new FormData($("#formProfile")[0]),
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
                            if (key == "logo") {
                                $("#logo-error").text(value);
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
                    url: route("admin.profile.store", 1),
                    type: "POST",
                    data: new FormData($("#formProfile")[0]),
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
                // window.location.href = route("admin.dashboard");
                location.reload();
            });
        },
    });
});