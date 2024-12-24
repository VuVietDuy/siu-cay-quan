const quantityInput = $("#quantity")
const plusBtn = $("#plusBtn")
const subBtn = $("#subBtn")
const price = $("#price")
const backBtn = $('#backBtn')

function updateTotalPrice() {
    $('#totalPrice').text(parseInt(quantityInput.val()) * parseInt(price.attr('data-price')) + ' đ')
    console.log(parseInt(quantityInput.val()) * parseInt(price.attr('data-price')))
}

plusBtn.click(function() {
    quantityInput.val(parseInt(quantityInput.val()) + 1)
    updateTotalPrice()
})

subBtn.click(function() {
    if (quantityInput.val() > 1) {
        quantityInput.val(parseInt(quantityInput.val()) - 1)
        updateTotalPrice()
    }
})

function goBack() {
    window.history.back()
}

backBtn.click(function() {
    goBack()
})

updateTotalPrice()
