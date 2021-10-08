var totalPrice = document.getElementById("total_price");
var curTotalPrice;
console.log("abc");
document.getElementById("j_javas").onclick = function () {
  var oldPrice = document.querySelector("input[name=j_java]:checked");
  var newPrice = document.getElementById("new_java");
  //   newPrice.removeAttribute("readonly");

  if (oldPrice) {
    newPrice.readOnly = false;
  } else {
    newPrice.readOnly = true;
  }
};

document.getElementById("ca_laits").onclick = function () {
  var single = document.getElementById("single_lait");
  var double = document.getElementById("double_lait");
  var newPriceSingle = document.getElementById("new_single_lait");
  var newPriceDouble = document.getElementById("new_double_lait");

  if (single.checked) {
    newPriceSingle.readOnly = false;
  } else {
    newPriceSingle.readOnly = true;
  }

  if (double.checked) {
    newPriceDouble.readOnly = false;
  } else {
    newPriceDouble.readOnly = true;
  }
};

document.getElementById("i_caps").onclick = function () {
  var single = document.getElementById("single_cap");
  var double = document.getElementById("double_cap");
  var newPriceSingle = document.getElementById("new_single_cap");
  var newPriceDouble = document.getElementById("new_double_cap");

  if (single.checked) {
    newPriceSingle.readOnly = false;
  } else {
    newPriceSingle.readOnly = true;
  }

  if (double.checked) {
    newPriceDouble.readOnly = false;
  } else {
    newPriceDouble.readOnly = true;
  }
};
