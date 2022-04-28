function logout() {
    $.confirm({
        title: "Log Out?",
        content: "Anda yakin ingin keluar?",
        buttons: {
            keluar: {
                btnClass: "btn-red",
                action: function() {
                    return $.ajax({
                        type: "POST",
                        url: route("logout"),
                        data: $("#logout").serialize(),
                        success: function(data) {
                            window.location.replace(route("login"));
                        },
                        error: function(response) {
                            $.confirm({
                                title: "Gagal!",
                                content: "Terjadi kesalahan!",
                                type: "red",
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: "Coba lagi",
                                        btnClass: "btn-red",
                                        action: function() {
                                            location.reload();
                                        },
                                    },
                                },
                            });
                        },
                    });
                },
            },
            batal: function() {},
        },
    });
}

function edit(slug) {
    window.location.replace(route("employer.vacancy.edit", slug));
}

// img preview
function readURL(input) {
    for (var i = 0; i < input.files.length; i++) {
        if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#logo").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}