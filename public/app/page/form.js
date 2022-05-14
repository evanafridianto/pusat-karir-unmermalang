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

    if ($('[name="route"]').val() === "admin.page.edit") {
        $.ajax({
            url: "",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(data.id);
                $('[name="name"]').val(data.name);
                $('[name="title"]').val(data.title);
                $('[name="slug"]').val(data.slug);
                $('[name="content"]').val(data.content);
                CKEDITOR.instances["editor"].setData(data.content);

                $('[name="old_image"]').val(data.image);
                if (data.image && data.image != "") {
                    if (data.file_exists) {
                        $("#img-preview").html(
                            '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="/storage/page/' +
                            data.image +
                            '"></img>'
                        );
                    } else if (data.image.includes("https://")) {
                        $("#img-preview").html(
                            '<img class="img-thumbnail wd-150 ht-80 edit-thumbnail" src="' +
                            data.image +
                            '"></img>'
                        );
                    } else {
                        $("#img-preview").html("Gambar tidak ditemukan");
                    }
                } else {
                    $("#img-preview").html("Gambar tidak ditemukan");
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

    $('[name="image"]').change(function() {
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
        url: route("admin.page.store"),
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
                    window.location.href = route("admin.page");
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