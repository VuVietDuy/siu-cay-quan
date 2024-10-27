const backBtn = $('#backBtn')

function goBack() {
    window.history.back()
}

backBtn.click(function() {
    goBack()
})

updateTotalPrice()
