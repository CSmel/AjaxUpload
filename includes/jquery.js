
// This uses jQuery and Ajax to upload files to a mySQL database.
// Normaly once the submit button is clicked, it will redirect itself to
// the php file that does the uploading.
// This script will upload the data without 'redrecting' to a different page.
$(document).ready(function() {  // once the document is ready, then the function may start.
  $('#uploadForm').submit(function(e) { // once the form is submitted, then all of the data in the form will be sent.
    e.preventDefault(); // this will prevent its default method.
    $.ajax({ // calling Ajax.
      url: $(this).attr('action'), // this will FOCUS on the forms action 'updateVerUpload.php'.
      type: 'POST',
      data: new FormData(this), // creatining an instance of all of the form data.
      contentType: false, // options
      cache: false,
      processData: false,
      success: function(data) { // this section is for testing purposes.
  $('#load').load('includes/section.php');
//$('nav').hide("slow");
}
  });
});
});
