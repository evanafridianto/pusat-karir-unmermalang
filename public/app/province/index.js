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

    $("#provinceModal").on("shown.bs.modal", function() {
        $('[name="name"]').focus();
    });
});

// table reload
function reload_table() {
    table.ajax.reload(null, false);
}

// add province
function add() {
    $("#provinceModal").modal("show");
    $("#title").text("Tambah Provinsi");
    $("#provinceForm")[0].reset();
    $(".text-danger").empty();
    $('[name="id"]').val("");
}

// edit province
function edit(id) {
    $("#provinceModal").modal("show");
    $("#title").text("Edit Provinsi");
    $(".text-danger").empty();

    $.ajax({
        url: route("admin.province.edit", id),
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.name);
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

//store province
function store() {
    loader(2);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.province.store"),
        type: "POST",
        data: $("#provinceForm").serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                swal({
                    title: "Sukses!",
                    text: "Data berhasil disimpan!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1000,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                });
                $("#provinceModal").modal("hide");
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
                text: "Terjadi Kesalahan!",
                showConfirmButton: false,
                timer: 1000,
            });
        },
    });
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
                url: route("admin.province.destroy", id),
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