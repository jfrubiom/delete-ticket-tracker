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

function setupDataTable(tableId)
{
    // var sourceData = [
    //     ["name"= "type",     "value"= $('#ticket-type-selector').val()],
    //     ["name"= "dept",     "value"= $('#department-selector').val()],
    //     ["name"= "category", "value"= $('#category-selector').val()],
    // ];

    // sourceData = {
    //     type: 2,
    //     dept: 4,
    //     category: 1,
    // };

    // console.log(sourceData);

    $('#ticket-list-widget table').dataTable({ 
        "sDom": 'trip',
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": '/ajax/tickets/data-table',
        "fnServerParams": function ( aoData ) {
            aoData.push( {"name": "type",     "value": $('#ticket-type-selector').val()} );
            aoData.push( {"name": "dept",     "value": $('#department-selector').val()} );
            aoData.push( {"name": "category", "value": $('#category-selector').val()} );
        },
        // "fnServerParams": function ( aoData ) {
        //     /* Add some extra data to the sender */
        //     aoData.push( { "type": "2", "dept":"1" } );
        //     // $.getJSON( sSource, aoData, function (json) { 
        //     //      Do whatever additional processing you want on the callback, then tell DataTables 
        //     //     console.log(json);
        //     //     fnCallback(json);
        //     // } );
        // },
        // "fnServerParams": function(aoData) {
        //     aoData.push({'foo':'bar'});
        //     // data.push({sourceData});
        // },
    });


// function redrawDataTable() {
//     var str = '';
//     var boxes = new Array();

//     //loop through all checkboxes
//     $(':checkbox').each(function() {
//         if ($(this).is(':checked')) {
//             boxes.push($(this).attr('name') + '=' + $(this).val());
//         }
//     });

//     str = '/test.php?' + boxes.join('&');
//     // TODO: set my_table.sAjaxSource to str
//     my_table.fnDraw();
// }





    // "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
    //   oSettings.jqXHR = $.ajax( {
    //     "dataType": 'json',
    //     "type": "POST",
    //     "url": sSource,
    //     "data": aoData,
    //     "success": fnCallback
    //   } );



}

// function loadTicketList()
// {
//     sourceData = {
//         type: $('#ticket-type-selector').val(),
//         dept: $('#department-selector').val(),
//         category: $('#category-selector').val(),
//         // order: 
//     }

//     $.ajax({
//         url: '/ajax/tickets/find',
//         data: sourceData,
//     }).done(function(data) {
//         text = '';
//         data.forEach(function(line) {
//             text += '<tr>' 
//                 + '<td>' + line.id + '</td>'
//                 + '<td>' + line.summary + '</td>'
//                 + '<td>' + line.assignee + '</td>'
//                 + '<td>' + line.creator + '</td>'
//                 + '<td>' + line.priority + '</td>'
//                 + '<td>' + line.due + '</td>'
//                 + '<td>' + line.updated + '</td>'
//                 + '</tr>'
//         });
//         $('#ticket-list-widget tbody').html(text);
//     });
// }

function loadTicketDetails()
{

}


function setupForReloadTablesWhenChanged(target)
{
    $(target).change(function() {
        loadTicketCount();
        // loadTicketList();
    });
}