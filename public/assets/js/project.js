/**
 * Project-specific javascript
 */

function loadAjaxForSelectBox(url, selectBox, withAll) 
{
    $.ajax({
        url: url,
    }).done(function(data) {

        if (withAll) {
            var selectableItems = '<option value=0>All ' + withAll + '</option>';
        } else {
            var selectableItems = '';
        }

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

function loadTicketCount()
{
    sourceData = {
        dept: $('#department-selector').val(),
        category: $('#category-selector').val(),
    }

    $.ajax({
        url: '/ajax/tickets/counts',
        data: sourceData,
    }).done(function(data) {
        text = '<ul><li>Open: ' + data.open + '</li>' 
            + '<li>Past Due: ' + data.past + '</li>'
            + '<li>Unassigned: ' + data.todo + '</li>'
            + '<li>Mine: ' + data.mine + '</li>';
        $('#ticket-count-widget').html(text);
    });

}

function loadTicketList()
{
    sourceData = {
        type: $('#ticket-type-selector').val(),
        dept: $('#department-selector').val(),
        category: $('#category-selector').val(),
    }

    $.ajax({
        url: '/ajax/tickets/find',
        data: sourceData,
    }).done(function(data) {
        console.log(data);

        text = '<tr>' + $('#ticket-list-widget .head').html() + '</tr>';
        console.log(text);
        data.forEach(function(line) {
            text += '<tr>' 
                + '<td>' + line.id + '</td>'
                + '<td>' + line.summary + '</td>'
                + '<td>' + line.assignee + '</td>'
                + '<td>' + line.creator + '</td>'
                + '<td>' + line.priority + '</td>'
                + '<td>' + line.due + '</td>'
                + '<td>' + line.updated + '</td>'
                + '</tr>'
        });
        $('#ticket-list-widget').html(text);
    });
}

function loadTicketDetails()
{

}


function setupForReloadTablesWhenChanged(target)
{
    $(target).change(function() {
        loadTicketCount();
        loadTicketList();
    });
}