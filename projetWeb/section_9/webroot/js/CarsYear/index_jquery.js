
// Update the carsYear data list
function getCarsYear() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var carYearTable = $('#carYearData');
                    carYearTable.empty();
                    $.each(data.carsYear, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalCarYearAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'carYearAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        carYearTable.append('<tr><td>' + value.id + '</td><td>' + value.annee  + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function carYearAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var carYearData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalCarYearAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        carYearData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        carYearData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(carYearData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">CarYear data has been ' + statusArr[type] + ' successfully.</p>');
                getCarsYear();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the carYear's data in the edit form
function editCarYear(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
 //       data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.carYear.id);
            $('#annee').val(data.carYear.annee);

        }
    });
}
4
// Actions on modal show and hidden events
$(function () {
    $('#modalCarYearAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var carYearFunc = "carYearAction('add');";
        $('.modal-title').html('Add new car yea');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowID');
            carYearFunc = "carYearAction('edit',"+ rowId +");";
            $('.modal-title').html('Edit year');
            editCarYear(rowId);
        }
        $('#carYearSubmit').attr("onclick", carYearFunc);
    });

    $('#modalCarYearAddEdit').on('hidden.bs.modal', function () {
        $('#carYearSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



