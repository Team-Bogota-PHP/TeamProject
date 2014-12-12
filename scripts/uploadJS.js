// Declaring and defining global increment variable.
var numOfPictures = 0;

//  Add upload fields
$(document).ready(function () {
    $('#addMore').click(function () {
        $(this).before($("<div/>", {id: 'filediv'}).
            fadeIn('slow').
            append($("<input/>", {name: 'file[]', type: 'file', id: 'file'}), $("<br/><br/>")));
    });

// Following function will executes on change event of file input to select different file.
    $('body').on('change', '#file', function () {
        if (this.files && this.files[0]) {
            numOfPictures += 1; // Incrementing global variable by 1.
            $(this).before("<div id='temp" + numOfPictures + "' class='temp'></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
//                $(this).hide();
            $("#temp" + numOfPictures).append($("<img/>", {
                id: 'img',
                src: 'x.png',
                alt: 'delete'
            }).click(function () {
                $(this).parent().parent().remove();
            }));
        }
    });

    $('#upload').click(function (e) {
        var name = $(":file").val();
        if (!name) {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
