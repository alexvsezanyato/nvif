document.addEventListener("click", function(clickEvent) {
    const selectedOption = clickEvent.target.closest(".option")
    const isOption = selectedOption? true : false

    if (!isOption) return

    const counter = selectedOption.closest(".count")
    const optionType = selectedOption.getAttribute("data-option-type")
    const input = counter.querySelector(".value")

    if (optionType === "+") {
        input.value++;
    } else if (optionType === "-" && input.value > 1) {
        input.value--;
    }
})

document.addEventListener("click", function(clickEvent) {
    const target = clickEvent.target
    if (!target.classList.contains("cart")) return

    const wrapper = target.closest(".cart-wrapper")
    if (!wrapper) return

    const inCart = wrapper.querySelector(".in")
    const notInCart = wrapper.querySelector(".not-in")

    if (target.classList.contains("not-in")) {
        action = "add"
    } else {
        action = "remove"
    }

    const productID = target.dataset.id

    const data = new FormData()

    data.append("product-id", productID)
    data.append("_token", csrf)

    const request = new XMLHttpRequest()

    request.onload = function() {
        if (request.responseText) {
            inCart.classList.toggle("hidden")
            notInCart.classList.toggle("hidden")
        }
    }

    request.open("POST", `/basket/${action}`)
    request.send(data)
})
