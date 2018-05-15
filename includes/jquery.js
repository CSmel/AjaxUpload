// This uses jQuery and Ajax to upload files to a mySQL database.
// Normally once the submit button is clicked, it will redirect itself to
// the php file that does the uploading.
// This script will upload the data without 'redirecting' to a different page.

$(document).ready(function () { // once the document is ready, then the function may start.
    $("html").on("dragover", function (e) {
        e.stopPropagation();
        $("h6").css("visibility", " visible").text('Draggin?');
       // $("h6").text('Draggin?');
    });
    $(`#dropContainer`).on("drop", function (e) {
        e.stopPropagation();
        //$("[for='upload']").text('Dropped');
        const fileName = $('#file').val().replace(/C:\\fakepath\\/i, '');
        $('h6').html("You Dropped <br>" + fileName);
    });
    $('#dropContainer').change(function(e){
        e.stopPropagation();
        const fileName = $('#file').val().replace(/C:\\fakepath\\/i, '');
        $('h6').css("visibility", " visible").text(fileName);
    });

    // language=JQuery-CSS
    $('#uploadForm').submit(function (e) { // once the form is submitted, then all of the data in the form will be sent.
        e.preventDefault(); // this will prevent its default method.
        $.ajax({ // calling Ajax.
            url: $(this).attr('action'), // this will FOCUS on the forms action 'updateVerUpload.php'.
            type: 'POST',
            data: new FormData(this), // creating an instance of all of the form data.
            contentType: false, // options
            cache: false,
            processData: false,
            success: data => {
                // this section is for testing purposes.
                if (data == -1) {
                    $('#error').text("Name or comment was empty");
                } else if (data == 0) {
                    $('#error').text("File input was empty");
                } else if (data == 1) {
                    // language=JQuery-CSS
                    $('#error').text("File size is too big");
                } else if (data == 2) {
                    $('#error').text("File uploaded successfully.");
                    $('#uploadForm').hide('slow');
                    $('#load').load('includes/section.php');
                } else if (data == 3) {
                    $('#error').text("File upload failed, please try again.");
                } else {
                    $('#load').load('includes/section.php');
                }
            }
        });
    });

});
