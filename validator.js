var nameObject = document.getElementById("name");
nameObject.addEventListener("change", checkName, false);

var emailObject = document.getElementById("email");
emailObject.addEventListener("change", checkEmail, false);

function checkName(event) {

  var inputName = event.currentTarget;

  //var pos = inputName.value.search(/^[A-Z][a-z]+ ?[A-Z][a-z]+ ?[A-Z]?[a-z]*$/);
  
  var pos = inputName.value.search(/^[^0-9]+$/);

  if (pos != 0) {
    alert("The name you entered (" + inputName.value + 
          ") is not valid. \n");
    inputName.focus();
    inputName.select();
	return false;
  } 
}

function checkEmail(event) {

  var inputEmail = event.currentTarget;
  
  var pos = inputEmail.value.search(/^[\w.-]+@[\w.-]+(\.[A-Za-z]{2,3}){1,2}$/);

  if (pos != 0) {
    alert("The email you entered (" + inputEmail.value + 
          ") is not valid. \n");
    inputEmail.focus();
    inputEmail.select();
	return false;
  } 
}


