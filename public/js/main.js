$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var districtsId =          $('#_districts');
var districtsSelect =      $('#_districts select');
var districtsChosenClass = $('.chosen-select-district');

var citiesId =             $('#_cities');
var citiesSelect =         $('#_cities select');
var citiesChosenClass =    $('.chosen-select-city');

$('.chosen-select-region').chosen().change(function (evt, params) {

    var url = districtsChosenClass.data('url');

    $.ajax({
        type: "POST",
        url: url,
        data: { id: params.selected },
        success: function(districts) {

            districtsId.css('display', 'none');
            districtsSelect.find('option').remove();
            districtsSelect.append('<option></option>');
            districtsChosenClass.chosen("destroy");

            citiesId.css('display', 'none');
            citiesSelect.find('option').remove();
            citiesChosenClass.chosen("destroy");

            $.each(districts, function (key, value) {
                districtsSelect
                    .append($('<option></option>')
                        .attr('value', value.ter_id)
                        .text(value.ter_name));
            });

            districtsId.css('display', '');
            districtsChosenClass.chosen();

        }
    });
});

districtsChosenClass.chosen().change(function (evt, params) {

    var url = citiesChosenClass.data('url');

    $.ajax({
        type: "POST",
        url: url,
        data: { id: params.selected },
        success: function(cities) {

            if(cities.length > 0)
            {
                citiesId.css('display', 'none');
                citiesSelect.find('option').remove();
                citiesSelect.append('<option></option>');
                citiesChosenClass.chosen("destroy");

                $.each(cities, function(key, value) {
                    citiesSelect
                        .append($('<option></option>')
                            .attr('value',value.ter_id)
                            .text(value.ter_name));
                });

                citiesSelect.attr('name', 'territory');
                districtsSelect.attr('name', '');

                citiesId.css('display', '');
                citiesChosenClass.chosen();
            }
            else
            {
                citiesSelect.attr('name', '');
                districtsSelect.attr('name', 'territory');
            }
        }
    });
});