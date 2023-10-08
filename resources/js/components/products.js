document.addEventListener("DOMContentLoaded", () => {
    const priceBlock = document.querySelector("[data-js=price]")

    function updateTotalPriceHtml(price) {
        priceBlock.innerHTML = price
    }

    async function updateTotalPrice(data) {
        const formData = new FormData()

        formData.append("product-id", data.productId)
        formData.append("amount", data.amount)

        if (!data["amount"]) action = "remove"
        else action = "add"

        formData.append("_token", csrf)

        let response = null

        try {
            response = await fetch(`/basket/${action}`, {
                method: "POST",
                body: formData,
                widthCredentials: true,
            })

            response = await response.json()
        } catch (e) {
            console.error(e)
        }

        if (response.price) {
            updateTotalPriceHtml(response.price)
        }
    }

    document.addEventListener("click", function(clickEvent) {
        const selectedOption = clickEvent.target.closest(".option")
        const isOption = selectedOption ? true : false

        if (!isOption) return

        const counter = selectedOption.closest(".count")
        const optionType = selectedOption.getAttribute("data-option-type")
        const input = counter.querySelector(".value")
        const product = clickEvent.target.closest("[data-js=product]")
        const inCart = product.querySelector(".in")
        const notInCart = product.querySelector(".not-in")

        if (optionType === "+") {
            input.value++;
        } else if (optionType === "-" && input.value > 1) {
            input.value--;
        }

        updateTotalPrice({
            productId: product.getAttribute("data-id"),
            amount: input.value
        })

        if (inCart && notInCart) {
            inCart.classList.remove("hidden")
            notInCart.classList.add("hidden")
        }
    })

    document.addEventListener("click", function(clickEvent) {
        const target = clickEvent.target.closest(`[data-js=togglable]`)
        if (!target) return

        const wrapper = target.closest(".cart-wrapper")
        const product = target.closest("[data-js=product]")

        if (!product) {
            console.error("Product block is not found")
            return
        }

        if (!wrapper) return

        const inCart = wrapper.querySelector(".in")
        const notInCart = wrapper.querySelector(".not-in")

        if (target.classList.contains("not-in")) {
            action = "add"
        } else {
            action = "remove"
        }

        updateTotalPrice({
            productId: target.dataset.id,
            amount: (action === "add") ? product.querySelector("[name=count]").value : 0
        })

        if (inCart && notInCart) {
            inCart.classList.toggle("hidden")
            notInCart.classList.toggle("hidden")
        }
    })

    document.addEventListener("click", async clickEvent => {
        const target = clickEvent.target.closest("[data-js=removable]")
        if (!target) return

        const productContainer = target.closest("[data-js=product-container]")

        const productID = target.dataset.id
        const data = new FormData()

        data.append("product-id", productID)
        data.append("_token", csrf)

        let response = null

        try {
            response = await fetch(`/basket/remove`, {
                method: "POST",
                body: data,
                widthCredentials: true,
            })

            response = await response.json()
        } catch (e) {
            console.error(e)
            return
        }

        if (response.price) {
            updateTotalPriceHtml(response.price)
        }

        if (!productContainer) {
            console.error("The product conainter isn't found")
            return
        }

        productContainer.remove()
    })
})
