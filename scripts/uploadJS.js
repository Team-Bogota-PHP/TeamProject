//Add upload fields
var fieldsCount = 1;

$(document).ready(function () {
    $('#removeField').click(function () {
        $('#filediv:last-of-type').remove();
        fieldsCount--;
        if (fieldsCount == 1) {
            $('#removeField').css('display', 'none');
            $('#upload').val('Upload File');
        }
    });

    $('#addMore').click(function () {
        fieldsCount++;
        $(this).before($('<div/>', {id: 'filediv'}).fadeIn('slow').
            append($('<div id="uploadButton" class="upload">Browse...</div>').click(function() {
                $(this).next().trigger('click');
            }), $('<input/>', {
                name: 'fileToUpload[]',
                type: 'file',
                class: 'file',
                id: 'fileToUpload' + fieldsCount
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

    $('#uploadButton1').click(function() {
        $('#fileToUpload1').trigger('click');
    });

});

function profilePic() {
    $('#profileUpload').trigger('click');
}