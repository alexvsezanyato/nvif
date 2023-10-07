/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/components/products.js ***!
  \*********************************************/
document.addEventListener("DOMContentLoaded", function () {
  var priceBlock = document.querySelector("[data-js=price]");
  function updatePrice(price) {
    priceBlock.innerHTML = price;
  }
  function updateRemote(data) {
    var onload = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
    var formData = new FormData();
    formData.append("product-id", data.productId);
    formData.append("amount", data.amount);
    if (!data["amount"]) action = "remove";else action = "add";
    formData.append("_token", csrf);
    var request = new XMLHttpRequest();
    if (onload) request.onload = onload;
    if (!onload) request.onload = function () {
      var response = null;
      try {
        response = JSON.parse(request.responseText);
      } catch (e) {
        console.error(e);
        return;
      }
      if (!response.status) return;
      if (response.price) {
        updatePrice(response.price);
      }
    };
    request.open("POST", "/basket/".concat(action));
    request.send(formData);
  }
  document.addEventListener("click", function (clickEvent) {
    var selectedOption = clickEvent.target.closest(".option");
    var isOption = selectedOption ? true : false;
    if (!isOption) return;
    var counter = selectedOption.closest(".count");
    var optionType = selectedOption.getAttribute("data-option-type");
    var input = counter.querySelector(".value");
    var product = clickEvent.target.closest("[data-js=product]");
    var inCart = product.querySelector(".in");
    var notInCart = product.querySelector(".not-in");
    if (optionType === "+") {
      input.value++;
    } else if (optionType === "-" && input.value > 1) {
      input.value--;
    }
    updateRemote({
      productId: product.getAttribute("data-id"),
      amount: input.value
    });
    inCart.classList.remove("hidden");
    notInCart.classList.add("hidden");
  });
  document.addEventListener("click", function (clickEvent) {
    var target = clickEvent.target.closest("[data-js=\"togglable\"]");
    // if (target.dataset.js !== "togglable") return
    if (!target) return;
    var wrapper = target.closest(".cart-wrapper");
    var product = target.closest("[data-js=product]");
    if (!product) {
      console.error("Product block is not found");
      return;
    }
    if (!wrapper) return;
    var inCart = wrapper.querySelector(".in");
    var notInCart = wrapper.querySelector(".not-in");
    if (target.classList.contains("not-in")) {
      action = "add";
    } else {
      action = "remove";
    }
    var productID = target.dataset.id;
    var data = new FormData();
    data.append("product-id", productID);
    data.append("_token", csrf);
    if (action === "add") {
      var amount = product.querySelector("[name=count]").value;
      data.append("amount", amount);
    }
    var request = new XMLHttpRequest();
    request.onload = function () {
      var response = null;
      try {
        response = JSON.parse(request.responseText);
      } catch (e) {
        console.error(e);
        return;
      }
      if (!response.status) return;
      if (response.price) {
        updatePrice(response.price);
      }
      inCart.classList.toggle("hidden");
      notInCart.classList.toggle("hidden");
    };
    request.open("POST", "/basket/".concat(action));
    request.send(data);
  });
  document.addEventListener("click", function (clickEvent) {
    var target = clickEvent.target;
    if (target.dataset.js !== "removable") return;
    var productContainer = target.closest("[data-js=product-container]");
    var productID = target.dataset.id;
    var data = new FormData();
    data.append("product-id", productID);
    data.append("_token", csrf);
    var request = new XMLHttpRequest();
    request.onload = function () {
      var response = null;
      try {
        response = JSON.parse(request.responseText);
      } catch (e) {
        console.error(e);
        return;
      }
      if (!response.status) return;
      if (response.price) {
        updatePrice(response.price);
      }
      if (!productContainer) {
        console.error("The product conainter isn't found");
        return;
      }
      productContainer.remove();
    };
    request.open("POST", "/basket/remove");
    request.send(data);
  });
});
/******/ })()
;