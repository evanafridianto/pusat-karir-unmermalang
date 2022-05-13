// datatable
var table;
$(function() {
    table = $("#datatable").DataTable({
        order: [],
        processing: true,
        serverSide: true,
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        language: {
            searchPlaceholder: "Search...",
            sSearch: "",
            // lengthMenu: "_MENU_ items/page",
        },
        ajax: "",
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "seeker.first_name",
                name: "seeker.first_name",
                className: "align-middle",
            },
            {
                data: "seeker.last_name",
                name: "seeker.last_name",
                className: "align-middle",
            },
            {
                data: "vacancy.job_title",
                name: "vacancy.job_title",
                className: "align-middle",
            },
            {
                data: "company_name",
                name: "company_name",
                className: "align-middle",
            },
            {
                data: "message",
                name: "message",
                className: "align-middle",
            },
            {
                data: "created_at",
                name: "created_at",
                className: "align-middle",
            },
            {
                data: "status",
                name: "status",
                className: "align-middle",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
                className: "align-middle text-center",
            },
        ],
    });

    // Select2
    $(".dataTables_length select").select2({
        minimumResultsForSearch: Infinity,
    });

    $("input, select").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });
});

// table reload
function reload_table() {
    table.ajax.reload(null, false);
}

// destroy
function destroy(id) {
    swal({
        title: "Konfirmasi!",
        text: "Anda yakin ingin hapus data ini?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
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
                url: route("admin.applicant.destroy", id),
                type: "DELETE",
                dataType: "JSON",
                success: function(data) {
                    swal({
                        title: "Sukses!",
                        text: "Data berhasil dihapus!",
                        type: "success",
                        showConfirmButton: false,
                        timer: 1000,
                        confirmButtonClass: "btn btn-success",
                        cancelButtonClass: "btn btn-danger",
                    });
                    reload_table();
                },
                error: function(response) {
                    console.log(response);
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Server error!",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                },
            });
        }
    });
}

function detail(id) {
    $("#detailModal").modal("show");

    $.ajax({
        type: "GET",
        url: route("admin.applicant.get", id),
        dataType: "JSON",
        success: function(data) {
            // console.log(data);
            $("#logo")
                .find("img")
                .attr("src", "/storage/logo/" + data.seeker.logo);

            $("#first_name").text(data.seeker.first_name);
            $("#last_name").text(data.seeker.last_name);
            $("#date_of_birth").text(data.seeker.date_of_birth);
            $("#gender").text(data.seeker.gender);
            $("#marital_status").text(data.seeker.marital_status);
            $("#telp").text(data.seeker.telp);
            $("#website").text(data.seeker.website);
            $("#description").text(data.seeker.description);

            $("#last_education").text(
                data.seeker.seeker_education.last_education
            );
            $("#major").text(data.seeker.seeker_education.category.name);
            $("#institute_name").text(
                data.seeker.seeker_education.institute_name
            );
            $("#graduation_year").text(
                data.seeker.seeker_education.graduation_year
            );
            $("#gpa").text(data.seeker.seeker_education.gpa);

            $("#province").text(data.seeker.province);
            $("#city").text(data.seeker.city);
            $("#street").text(data.seeker.address.street);
            $("#zip_code").text(data.seeker.address.zip_code);

            $("#job_title").empty();
            $("#job_title").append(
                '<a href="' +
                route("vacancy.description", data.vacancy.slug) +
                '" target="_blank" >' +
                data.vacancy.job_title +
                "</a>"
            );
            $("#documents").empty();
            $.each(data.documents, function(index, value) {
                $("#documents").append(
                    '<a href="/storage/' +
                    value.id +
                    "/" +
                    value.file_name +
                    '" target="_blank" >' +
                    value.file_name +
                    "</a><br>"
                );
            });

            $("#message").text(data.message);
            $("#status").text(data.status);
        },
    });
}

function status(id, status) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.applicant.status", [id, status]),
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
            if (data.status) {
                reload_table();
            }
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
                        btnClass: "btn-red",
                        action: function() {},
                    },
                },
            });
        },
    });
}

function message(id) {
    $('[name="applicant_id"]').val(id);
    $("#acceptedModal").modal("show");
    $(".text-danger").empty();
}

function accepted() {
    loader(1);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.applicant.status", [
            $('[name="applicant_id"]').val(),
            "Accepted",
        ]),
        data: $("#accepted").serialize(),
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $("#acceptedModal").modal("hide");
                $("#accepted")[0].reset();
                reload_table();
            } else {
                $.each(data.error, function(key, value) {
                    $('[name="' + key + '"]')
                        .next()
                        .text(value);
                });
            }
        },
        error: function(response) {
            console.log(response);
            swal({
                type: "error",
                title: "Oops...",
                text: "Server error!",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
}