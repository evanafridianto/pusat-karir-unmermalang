// destroy
function destroy(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.confirm({
        title: "Hapus ?",
        content: "Anda yakin membatalkan lamaran?",
        buttons: {
            ya: {
                btnClass: "btn-red",
                action: function() {
                    return $.ajax({
                        url: route("application.destory", id),
                        type: "DELETE",
                        dataType: "JSON",
                        success: function(data) {
                            $.confirm({
                                title: "Sukses!",
                                content: "Lamaran berhasil dibatalkan!",
                                type: "green",
                                typeAnimated: true,
                                buttons: {
                                    OK: {
                                        btnClass: "btn-green",
                                        action: function() {
                                            window.location.reload();
                                        },
                                    },
                                },
                            });
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
                                        btnClass: "btn-green",
                                        action: function() {
                                            window.location.reload();
                                        },
                                    },
                                    Tutup: {
                                        btnClass: "btn-green",
                                        action: function() {},
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