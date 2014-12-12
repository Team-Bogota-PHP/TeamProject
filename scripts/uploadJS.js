//Add upload fields
$(document).ready(function () {
    $('#addMore').click(function () {
        $(this).before($('<div/>', {id: 'filediv'}).fadeIn('slow').
            append($('<input/>', {name: 'fileToUpload[]', type: 'file', id: 'fileToUpload'}),
            $('<input/>', {
                type: 'text',
                id: 'tags',
                class: 'tags',
                name: 'tags[]',
                placeholder: 'Image tags'
            }), $('<br/><br/>')));

        $('#upload').val('Upload Files');
    });
});