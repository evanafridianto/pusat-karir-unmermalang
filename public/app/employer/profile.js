// destroy
function destroy(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.confirm({
        title: "Hapus ?",
        content: "Anda yakin ingin hapus data ini?",
        buttons: {
            Hapus: {
                btnClass: "btn-red",
                action: function() {
                    return $.ajax({
                        url: route("employer.vacancy.destroy", id),
                        type: "DELETE",
                        dataType: "JSON",
                        success: function(data) {
                            $.confirm({
                                title: "Sukses!",
                                content: "Data berhasil dihapus!",
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