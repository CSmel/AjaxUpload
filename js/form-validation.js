// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='loginForm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      loginName: "required",
      loginPW: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      loginName: "Invalid name",

      loginPW: {
        required: "Invalid password",
        minlength: "Too short"
      },

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  }
  });
});
