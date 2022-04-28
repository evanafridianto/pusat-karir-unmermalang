var uploadedDocumentMap = {};
Dropzone.options.documentDropzone = {
    url: $('[name="route_doc"]').val(),
    // url: route("documents.store"),
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf",
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function(file, response) {
        $("#SeekerApplication").append(
            '<input type="hidden" name="documents[]" value="' +
            response.name +
            '">'
        );
        uploadedDocumentMap[file.name] = response.name;
    },
    removedfile: function(file) {
        file.previewElement.remove();
        var name = "";
        if (typeof file.file_name !== "undefined") {
            name = file.file_name;
        } else {
            name = uploadedDocumentMap[file.name];
        }
        $("#SeekerApplication")
            .find('input[name="documents[]"][value="' + name + '"]')
            .remove();
        destroyDoc(name);
    },
};
// });

function destroyDoc(name) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("documents.destroy", name),
        type: "DELETE",
        dataType: "JSON",
        success: function(response) {},
        error: function(response) {
            console.log(response);
        },
    });
}

function store() {
    var btnSave = $("#btnSave");
    btnSave.html(
        'Submit<span class="spinner-border text-light spinner-border-sm ml-1"></span>'
    );
    let formData = new FormData($("#SeekerApplication")[0]);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: route("application.store"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                $("#SeekerApplication")[0].reset();
                $.confirm({
                    title: "Sukses!",
                    content: "Lamaran berhasil dikirim!",
                    type: "green",
                    typeAnimated: true,
                    buttons: {
                        OK: {
                            btnClass: "btn-green",
                            action: function() {
                                window.location.replace(route("vacancy"));
                            },
                        },
                    },
                });
            } else {
                $.each(data.error, function(key, value) {
                    if (key == "documents") {
                        $("#documents-error").text(value);
                    } else {
                        $('[name="' + key + '"]')
                            .next()
                            .text(value);
                    }
                });
            }
            btnSave.html(
                'Submit<span class="fa fa-angle-right fa-sm ml-1"></span>'
            );
            btnSave.attr("disabled", false);
        },
        error: function(response) {
            btnSave.html('Submit<i class="fa fa-angle-right fa-sm ml-1"></i>');
            btnSave.attr("disabled", false);
            console.log(response);
            $.confirm({
                title: "Gagal!",
                content: "Terjadi kesalahan!",
                type: "red",
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: "Coba lagi",
                        btnClass: "btn-green",
                        action: function() {
                            window.location.reload();
                        },
                    },
                },
            });
        },
    });
}