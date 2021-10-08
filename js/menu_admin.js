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

// document.getElementById("ca_laits").onclick = function () {
//   var oldPrice = document.querySelector("input[id=double_lait]:checked");
//   var newPriceSingle = document.getElementById("new_double_lait");
//   newPriceSingle.removeAttribute("readonly");
// };

// document.getElementById("qty_java").addEventListener("input", function () {
//   var priceVal = document.querySelector("input[name=j_java]:checked");
//   var subTotalPrice = document.getElementById("price_java");
//   //var totalPrice = document.getElementById('total_price');
//   subTotalPrice.value = this.value * priceVal.getAttribute("data-price");
//   //totalPrice.value += (subTotalPrice.value);
//   curTotalPrice = Number(totalPrice.value);
//   total = Number(subTotalPrice.value) + curTotalPrice;
//   totalPrice.value = total;
// });

// document.getElementById("ca_laits").onclick = function () {
//   var priceVal = document.querySelector("input[name=ca_lait]:checked");
//   var qty = document.getElementById("qty_lait");
//   var subTotalPrice = document.getElementById("price_lait");
//   //var totalPrice = document.getElementById('total_price');
//   subTotalPrice.value = priceVal.getAttribute("data-price") * qty.value;
//   //totalPrice.value += eval(subTotalPrice.value);
//   curTotalPrice = Number(totalPrice.value);
//   total = Number(subTotalPrice.value) + curTotalPrice;
//   totalPrice.value = total;
// };

// document.getElementById("qty_lait").addEventListener("input", function () {
//   var priceVal = document.querySelector("input[name=ca_lait]:checked");
//   var subTotalPrice = document.getElementById("price_lait");
//   //var totalPrice = document.getElementById('total_price');
//   subTotalPrice.value = this.value * priceVal.getAttribute("data-price");
//   //totalPrice.value += eval(subTotalPrice.value);
//   curTotalPrice = Number(totalPrice.value);
//   total = Number(subTotalPrice.value) + curTotalPrice;
//   totalPrice.value = total;
// });

// document.getElementById("i_caps").onclick = function () {
//   var priceVal = document.querySelector("input[name=i_cap]:checked");
//   var qty = document.getElementById("qty_cap");
//   var subTotalPrice = document.getElementById("price_cap");
//   //var totalPrice = document.getElementById('total_price');
//   subTotalPrice.value = priceVal.getAttribute("data-price") * qty.value;
//   //totalPrice.value += eval(subTotalPrice.value);
//   curTotalPrice = Number(totalPrice.value);
//   total = Number(subTotalPrice.value) + curTotalPrice;
//   totalPrice.value = total;
// };

// document.getElementById("qty_cap").addEventListener("input", function () {
//   var priceVal = document.querySelector("input[name=i_cap]:checked");
//   var subTotalPrice = document.getElementById("price_cap");
//   //var totalPrice = document.getElementById('total_price');
//   subTotalPrice.value = this.value * priceVal.getAttribute("data-price");
//   //totalPrice.value += eval(subTotalPrice.value);
//   curTotalPrice = Number(totalPrice.value);
//   total = Number(subTotalPrice.value) + curTotalPrice;
//   totalPrice.value = total;
// });
