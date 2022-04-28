$(function() {
    var table = $("#datatable").DataTable({
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
        ajax: route("applicant.of.city"),
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "name",
                name: "name",
                className: "align-middle",
            },
            {
                data: "total",
                name: "total",
                className: "align-middle text-center",
            },
        ],
    });
    $("#datatableemployer").DataTable({
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
        ajax: route("employer.of.city"),
        columns: [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "name",
                name: "name",
                className: "align-middle",
            },
            {
                data: "total",
                name: "total",
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
        url: route("applicant.of.major"),
        data: "data",
        dataType: "JSON",
        success: function(data) {
            var total = [];
            var label = [];
            for (let i = 0; i < data.length; i++) {
                label.push(data[i].name);
                total.push(data[i].total_applicant);
            }

            var datapie = {
                labels: label,
                datasets: [{
                    data: total,
                    backgroundColor: [
                        "#29B0D0",
                        "#4C6579",
                        "#F57E2E",
                        "#C8E0E4",
                        "#A6A7AC",
                    ],
                }, ],
            };

            var optionpie = {
                responsive: true,
                legend: {
                    display: false,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
            };

            // For a doughnut chart
            var ctx6 = document.getElementById("chartPie");
            var myPieChart6 = new Chart(ctx6, {
                type: "doughnut",
                data: datapie,
                options: optionpie,
            });
        },
    });
});