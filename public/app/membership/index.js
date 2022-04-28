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
                data: "user.email",
                name: "user.email",
                className: "align-middle",
            },
            {
                data: "user.userable_type",
                name: "user.userable_type",
                className: "align-middle",
            },
            {
                data: "total_pay",
                name: "total_pay",
                className: "align-middle",
            },
            {
                data: "image",
                name: "image",
                className: "align-middle",
            },
            {
                data: "expiry_date",
                name: "expiry_date",
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
                url: route("admin.membership.destroy", id),
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

function status(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.membership.status", id),
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                reload_table();
            }
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

// function detail(id) {
//     $("#detailModal").modal("show");

//     $.ajax({
//         type: "GET",
//         url: route("admin.membership.get", id),
//         dataType: "JSON",
//         success: function(data) {
//             console.log(data);
// $("#logo")
//     .find("img")
//     .attr("src", "/storage/membership/" + data.logo);

// $("#company_name").text(data.company_name);
// $("#since").text(data.since);
// $("#tin").text(data.tin);
// $("#business_scale").text(data.business_scale);
// $("#number_of_employee").text(data.number_of_employee);
// $("#category").text(data.categoryb);

// $("#telp").text(data.telp);
// $("#website").text(data.website);
// $("#description").text(data.description);

// $("#province").text(data.province);
// $("#city").text(data.city);
// $("#street").text(data.address.street);
// $("#zip_code").text(data.address.zip_code);
// $("#status").text(data.status);
//         },
//     });
// }