function province() {
    $("input, select, textarea").bind("keyup change", function() {
        $(this).next(".text-danger").empty();
    });
    $.ajax({
        type: "GET",
        url: route("province.show"),
        dataType: "JSON",
        success: function(data) {
            $.each(data, function(key, province) {
                $('[name="province"]').append(
                    $("<option>", {
                        value: province.id,
                        text: province.name,
                    })
                );
            });
        },
        error: function(response) {},
    });
}

function cityByProv(provinceId, cityId) {
    $.ajax({
        type: "GET",
        url: route("city.by.prov", provinceId),
        dataType: "JSON",
        success: function(response) {
            $('[name="city"]').empty();
            $('[name="city"]').append(
                '<option value="">Pilih kota/kabupaten</option>'
            );
            $.each(response, function(index, city) {
                if (cityId != "" && city.id == cityId) {
                    $('[name="city"]')
                        .append(
                            '<option value="' +
                            city.id +
                            '" selected>' +
                            city.name +
                            "</option>"
                        )
                        .trigger("change");
                } else {
                    $('[name="city"]').append(
                        $("<option>", {
                            value: city.id,
                            text: city.name,
                        })
                    );
                }
            });
        },
        error: function(res) {},
    });
}