(function ($) {
    // Get the path to action from CakePHP
                             urlToAutocompleteAction
    var autoCompleteSource = urlToAutocompleteAction;
    $('#autocomplete').autocomplete({
        source: autoCompleteSource,        
        minLength: 1
    });
})(jQuery);

