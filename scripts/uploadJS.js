//Add upload fields
var fieldsCount = 1;

$(document).ready(function () {
    $('#removeField').click(function () {
        $('#filediv' + fieldsCount).remove();
        fieldsCount--;
        if (fieldsCount == 1) {
            $('#removeField').css('display', 'none');
            $('#upload').val('Upload File');
        }
    });

    $('#addMore').click(function () {
        fieldsCount++;
        $(this).before($('<div/>', {id: 'filediv' + fieldsCount}).fadeIn('slow').
            append($('<div id="uploadButton" class="upload">Browse...</div>'), $('<input/>', {
                name: 'fileToUpload[]',
                type: 'file',
                id: 'fileToUpload'
            }),
            $('<input/>', {
                type: 'text',
                id: 'tags',
                class: 'tags',
                name: 'tags[]',
                placeholder: 'Image tags'
            }), $('<br/><br/>')));

        $('#removeField').css('display', 'inline');

        $('#upload').val('Upload Files');

    });

    $('body').on('click', '#uploadButton', function () {
        $('#fileToUpload').trigger("click");
    });

});