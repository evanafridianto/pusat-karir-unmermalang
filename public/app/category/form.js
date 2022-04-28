// add category
function add_category() {
    $("#add_categoryModal").modal("show");
    $("#title-form-category").text("Tambah Kategori");
    $("#category_form")[0].reset();
    $(".text-danger").empty();
    $('[name="category_id"]').val("");
    $('[name="category_name"]').focus();

    $("#input-slug").attr("style", "display:none");
}

// edit
function edit_category(id) {
    $("#add_categoryModal").modal("show");
    $("#title-form-category").text("Edit Kategori");
    $(".text-danger").empty();

    $("#input-slug").removeAttr("style");
    $.ajax({
        url: route("admin.category.edit", id),
        // url: "category/edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('[name="category_id"]').val(data.id);
            $('[name="category_name"]').val(data.name);
            $('[name="category_slug"]').val(data.slug);
            $('[name="category_type"]').val(data.type);
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

// category store
function category_store() {
    loader(2);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.category.store"),
        type: "POST",
        data: $("#category_form").serialize(),
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
                $("#add_categoryModal").modal("hide");
                if ($("select").hasClass("category-select")) {
                    select_category();
                } else if ($("table").hasClass("category-table")) {
                    reload_table();
                }
            } else {
                $.each(data.error, function(key, value) {
                    $('[name="' + key + '"]')
                        .next()
                        .text(value);
                });
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

$(function() {
    $("#add_categoryModal").on("shown.bs.modal", function() {
        $('[name="category_name"]').focus();
    });
});