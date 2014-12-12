//Add upload fields
$(document).ready(function () {
    $('#addMore').click(function () {
        $(this).before($('<div/>', {id: 'filediv'}).fadeIn('slow').
            append($('<input/>', {name: 'fileToUpload[]', type: 'file', id: 'fileToUpload'}), $('<br/><br/>')));
    });
});