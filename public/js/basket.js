if (false) document.addEventListener("DOMContentLoaded", function() {
    const basketBlock = document.querySelector("#basket")
    if (!basketBlock) return

    const data = new FormData()

    const basket = localStorage.getItem("basket")
    data.append("basket", basket)
    data.append("_token", csrf)

    const request = new XMLHttpRequest()

    request.onreadystatechange = function() {
        basketBlock.innerHTML = request.responseText
    }

    request.open("POST", "/basket")
    request.send(data)
})
