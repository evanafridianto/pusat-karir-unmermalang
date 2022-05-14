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
                data: "job_title",
                name: "job_title",
                className: "align-middle",
            },
            {
                data: "company_name",
                name: "company_name",
                className: "align-middle",
            },
            {
                data: "job_type",
                name: "job_type",
                className: "align-middle",
            },
            {
                data: "category_names",
                name: "category_names",
                className: "align-middle",
            },
            {
                data: "city",
                name: "city",
                className: "align-middle",
            },
            {
                data: "expiry_date",
                name: "expiry_date",
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

    $.ajax({
        type: "GET",
        url: "",
        success: function(response) {
            console.log(response);
        },
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
                url: route("admin.vacancy.destroy", id),
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