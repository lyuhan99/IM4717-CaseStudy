var totalPrice = document.getElementById('total_price');
var curTotalPrice;
console.log("abc");
document.getElementById('j_javas').onclick = function() {
    var priceVal = document.querySelector('input[name=j_java]:checked');
    var qty = document.getElementById('qty_java');
    var subTotalPrice = document.getElementById('price_java');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = priceVal.getAttribute('data-price') * qty.value;
    //totalPrice.value += (subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;
}

document.getElementById('qty_java').addEventListener('input', function() {
    var priceVal = document.querySelector('input[name=j_java]:checked');
    var subTotalPrice = document.getElementById('price_java');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = this.value * priceVal.getAttribute('data-price');
    //totalPrice.value += (subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;
})

document.getElementById('ca_laits').onclick = function() {
    var priceVal = document.querySelector('input[name=ca_lait]:checked');
    var qty = document.getElementById('qty_lait');
    var subTotalPrice = document.getElementById('price_lait');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = priceVal.getAttribute('data-price') * qty.value;
    //totalPrice.value += eval(subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;
}

document.getElementById('qty_lait').addEventListener('input', function() {
    var priceVal = document.querySelector('input[name=ca_lait]:checked');
    var subTotalPrice = document.getElementById('price_lait');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = this.value * priceVal.getAttribute('data-price');
    //totalPrice.value += eval(subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;

})

document.getElementById('i_caps').onclick = function() {
    var priceVal = document.querySelector('input[name=i_cap]:checked');
    var qty = document.getElementById('qty_cap');
    var subTotalPrice = document.getElementById('price_cap');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = priceVal.getAttribute('data-price') * qty.value;
    //totalPrice.value += eval(subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;
}

document.getElementById('qty_cap').addEventListener('input', function() {
    var priceVal = document.querySelector('input[name=i_cap]:checked');
    var subTotalPrice = document.getElementById('price_cap');
    //var totalPrice = document.getElementById('total_price');
    subTotalPrice.value = this.value * priceVal.getAttribute('data-price');
    //totalPrice.value += eval(subTotalPrice.value);
    curTotalPrice = Number(totalPrice.value);
    total = Number(subTotalPrice.value) + curTotalPrice;
    totalPrice.value = total;
})