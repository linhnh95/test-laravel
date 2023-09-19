// import './bootstrap';


$(document).ready(function () {

    let quantitiy = 0;

    $('.quantity-right-plus').click(function (e) {

        e.preventDefault();
        let quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity + 1);
    });

    $('.quantity-left-minus').click(function (e) {
        e.preventDefault();
        let quantity = parseInt($('#quantity').val());
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });


    $('.image-thumbnail').click(function (e) {
        let src = $(this).attr('src');
        console.log(src)
        let figure = $('#image-figure');
        let figureImage = figure.attr('src');

        $(this).attr('src', figureImage)
        figure.attr('src', src)
    })

    $('#add-to-cart').click(function(){
        let quantity = $('#quantity')
        let totalItem = $('#total-item-in-cart')

        let quantityValue = quantity.val()
        let currentTotalItem = totalItem.html()
        let total = parseInt(quantityValue) + parseInt(currentTotalItem)
        totalItem.html(total)
        quantity.val(1)
    })
});
