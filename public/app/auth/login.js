$(function() {
    $("input, select").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });
});

function login() {
    $("#btn-Login").html(
        'Masuk&nbsp;<span class="spinner-border text-light spinner-border-sm"></span>'
    ); //change button
    $("#btn-Login").attr("disabled", true); //set button disable
    // $.ajaxSetup({
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //     },
    // });
    // $.ajax({
    //     type: "POST",
    //     url: route("login"),
    //     data: $("#formLogin").serialize(),
    //     dataType: "JSON",
    //     success: function(data) {
    //         console.log(data);
    //         if (data.status) {
    //             // window.location.href = data.redirect;
    //             if (data.role == "admin") {
    //                 window.location.href = route("admin.dashboard");
    //             } else window.location.replace(route("home"));
    //         }
    //     },
    //     error: function(response) {
    //         if (response.status == 422) {
    //             let data = response.responseJSON;
    //             if (data.errors) {
    //                 for (let inputName in data.errors) {
    //                     $('[name="' + inputName + '"]')
    //                         .next()
    //                         .text(data.errors[inputName].join(", "));
    //                 }
    //             }
    //         }
    //     },
    // });
}