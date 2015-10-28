function validateForm() {

  if (!Modernizr.input.required) {
    // check the required fields
    
    // get an array that holds all the elements.
    var inputElements = document.getElementById("assignUserForm").elements;
    
    for(var i = 0; i < inputElements.length; i++) {
      if (inputElements[i].hasAttribute("required")) {
        // If this elemnent is required, check if it has a value.
        if (inputElements[i].value == "") {
          alert("Custom required-field validation failed. The form will not be submitted.");
          return false;
        }
      }
    }

    // submit the form.
    return true;
  }
}


function validateComments(input) {
    if (input.value.length < 50) {
        input.setCustomValidity("You need to comment in more detail.");
    }
    else {
        // There's no error. Clear any error message.
        input.setCustomValidity("");
    }
}