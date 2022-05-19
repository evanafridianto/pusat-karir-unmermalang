$(function() {
    var options = {
        filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
        filebrowserImageUploadUrl: "/laravel-filemanager/upload?type=Images&_token=",
        filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
        filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
        height: 300,
    };

    // ck editor
    var editor = CKEDITOR.replace("editor", options);

    // remove text-danger
    editor.on("change", function() {
        var val = editor.getData();
        if (val != "") {
            $(".content").empty();
        }
        $('[name="content"]').val(val);
    });

    $("input, select").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });
    select_category();
    // data edit
    if ($('[name="route"]').val() === "admin.article.edit") {
        $.ajax({
            url: "",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                var val = [];
                for (var i = 0; i < data.tags.length; i++) {
                    val.push(data.tags[i].name);
                }
                $('[name="id"]').val(data.id);
                $('[name="user_id"]').val(data.user_id);
                $('[name="title"]').val(data.title);
                $('[name="slug"]').val(data.slug);
                $('[name="content"]').val(data.content);
                $('[name="category"]').val(data.category_id);
                CKEDITOR.instances["editor"].setData(data.content);
                $('[name="tag"]').val(val.join(", ")).tagsinput();

                $('[name="old_thumbnail"]').val(data.thumbnail);
                if (data.thumbnail && data.thumbnail != "") {
                    if (data.file_exists) {
                        $("#img-preview").html(
                            '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="/storage/article/' +
                            data.thumbnail +
                            '"></img>'
                        );
                    } else if (data.thumbnail.includes("https://")) {
                        $("#img-preview").html(
                            '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="' +
                            data.thumbnail +
                            '"></img>'
                        );
                    } else {
                        $("#img-preview").html("Thumbnail tidak ditemukan");
                    }
                } else {
                    $("#img-preview").html("Thumbnail tidak ditemukan");
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

    $('[name="thumbnail"]').change(function() {
        readURL(this);
        // $("#thumbnail-preview").prev().remove();
    });
});

// data store
function store() {
    loader(1);

    let formData = new FormData($("#form")[0]);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("admin.article.store"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            console.log(data);

            if (data.status) {
                swal({
                    title: "Sukses!",
                    text: "Data berhasil disimpan!",
                    type: "success",
                    showConfirmButton: false,
                    timer: 1000,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                }).then(function() {
                    window.location.href = route("admin.article");
                });
            } else {
                $.each(data.error, function(key, value) {
                    var messageLength = CKEDITOR.instances["editor"]
                        .getData()
                        .replace(/<[^>]*>/gi, "").length;
                    if (key == "content") {
                        if (!messageLength) {
                            $(".content").text(value);
                        }
                    } else {
                        $('[name="' + key + '"]')
                            .next()
                            .text(value);
                    }
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

// select category
function select_category() {
    $('[name="category"]').empty();
    $('[name="category"]').append('<option value="">Pilih kategori</option>');
    $.ajax({
        type: "GET",
        url: route("category.select", "NewsEvent"),
        dataType: "JSON",
        success: function(response) {
            $.each(response, function(index, value) {
                $('[name="category"]').append(
                    $("<option>", {
                        value: value.id,
                        text: value.name + " (" + value.type + ")",
                    })
                );
            });
        },
    });
}