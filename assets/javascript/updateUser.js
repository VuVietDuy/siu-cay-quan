const btn = $('.updateUserBtn')
console.log(btn)

btn.on('click', function() {
    console.log($(this).data('user-id'))
})
