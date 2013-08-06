/**
 * Project-specific javascript
 */

function loadAjaxForSelectBox(url, selectBox) 
{
    $.ajax({
        url: url,
    }).done(function(data) {
        var selectableItems = '';
        data.forEach(function(entry) {
            var extra = '';
            if(typeof entry.extra != 'undefined') {
                extra = entry.extra;
            }

            var newItem = '<option value=' + entry.id + extra + '>' + entry.label + '</option>' ;
            selectableItems += newItem;
        });
        $(selectBox).html(selectableItems);
    });
}

function setupAutocompleteWithId(sourceUrl, element)
{
    $( element ).autocomplete({
        minLength: 1,
        delay: 0,
        source: sourceUrl,
        select: function(event, ui) {
            var selectedObj = ui.item;
            $( element ).val(selectedObj.label);
            $( element+"_id" ).val(selectedObj.id);
            return false;
        }
    });    
}

