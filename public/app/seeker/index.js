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
            },
            {
                data: "name",
                name: "name",
                className: "align-middle",
            },

            {
                data: "gender",
                name: "gender",
                className: "align-middle",
            },
            {
                data: "last_educ",
                name: "last_educ",
                className: "align-middle",
            },
            {
                data: "major",
                name: "major",
                className: "align-middle",
            },
            {
                data: "institute_name",
                name: "institute_name",
                className: "align-middle",
            },
            {
                data: "city",
                name: "city",
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
});

$("#verificate").change(function(e) {
    console.log(e);
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
        cancelButtonText: "Batal",
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
                url: route("admin.seeker.destroy", id),
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
        url: route("admin.seeker.get", id),
        dataType: "JSON",
        success: function(data) {
            $("#logo")
                .find("img")
                .attr("src", "/storage/logo/" + data.logo);

            $("#first_name").text(data.first_name);
            $("#last_name").text(data.last_name);
            $("#date_of_birth").text(data.date_of_birth);
            $("#gender").text(data.gender);
            $("#marital_status").text(data.marital_status);
            $("#telp").text(data.telp);
            $("#website").text(data.website);
            $("#description").text(data.description);

            $("#last_education").text(data.seeker_education.last_education);
            $("#major").text(data.major);
            $("#institute_name").text(data.seeker_education.institute_name);
            $("#graduation_year").text(data.seeker_education.graduation_year);
            $("#gpa").text(data.seeker_education.gpa);

            $("#province").text(data.province);
            $("#city").text(data.city);
            $("#street").text(data.address.street);
            $("#zip_code").text(data.address.zip_code);
        },
    });
}