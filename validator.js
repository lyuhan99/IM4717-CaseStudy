var nameObject = document.getElementById("name");
nameObject.addEventListener("change", checkName, false);

var emailObject = document.getElementById("email");
emailObject.addEventListener("change", checkEmail, false);

var dateObject = document.getElementById("date");
dateObject.addEventListener("change", checkDate, false);

function checkName(event) {

  var inputName = event.currentTarget;
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
  //not done

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

function checkDate(event) {

  var startDateEvent = event.currentTarget
  var startDate = event.currentTarget.value;
  var dateYear = startDate.split("-")[0]
  var dateMonth = startDate.split("-")[1] - 1
  var dateDay = startDate.split("-")[2]

  var startDateObject = new Date(dateYear, dateMonth, dateDay);
  var todayDate = new Date()

  var startDateTime = startDateObject.getTime();
  var todayTime = todayDate.getTime();

  if (startDateTime <= todayTime) {
    alert("The date you entered (" + startDate +
      ") is not valid.");
      startDateEvent.focus();
      startDateEvent.select();
    return false;
  }



}



