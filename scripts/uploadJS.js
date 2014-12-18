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
            append($('<div id="uploadButton" class="upload">Browse...</div>').click(function () {
                $(this).next().trigger('click');
            }), $('<input/>', {
                name: 'fileToUpload[]',
                type: 'file',
                class: 'file',
                id: 'fileToUpload' + fieldsCount
            }).change(function () {
                var out = $(this).val().replace(/^.*[\\\/]/, '');
                if (out.length > 15) {
                    out = out.substring(0, 15) + '...';
                }
                $(this).prev().html(out);
            }),
            $('<input/>', {
                type: 'text',
                id: 'tags',
                class: 'tags uplDisplaced',
                name: 'tags[]',
                placeholder: 'Image tags'
            }), $('<br/><br/>')));

        $('#removeField').css('display', 'inline');

        $('#upload').val('Upload Files');

    });

    $("#fileToUpload1").change(function () {
        var out = $(this).val().replace(/^.*[\\\/]/, '');
        if (out.length > 15) {
            out = out.substring(0, 15) + '...';
        }
        $("#uploadButton1").html(out);
    });

    $('#uploadButton1').click(function () {
        $('#fileToUpload1').trigger('click');
    });

    $("#profileUpload").change(function () {
        var out = $(this).val().replace(/^.*[\\\/]/, '');
        if (out.length > 10) {
            out = out.substring(0, 10) + '...';
        }
        $("#profilePic").html(out);
    });

});

function profilePic() {
    $('#profileUpload').trigger('click');
}