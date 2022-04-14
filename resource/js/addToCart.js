"use strict"

let addButtons = document.querySelectorAll(".addButton");
for(let button of addButtons) {
  button.onclick = addToCart;
}

function addToCart() {
  let id = this.getAttribute("productId");
  fetch("/cart/add/"+id)
    .then(response => response.text())
    .then(result => alert(result));
}
