$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#car-year-id').on('change', function () {
        var carYearId = $(this).val();
        if (carYearId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'car_year_id=' + carYearId,
                success: function (carsColorsDispo) {
                    $select = $('#car-color-dispo-id');
                    $select.find('option').remove();
                    $.each(carsColorsDispo, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.color_name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#car-color-dispo-id').html('<option value="">Select car year first</option>');
        }
    }).change();
});


