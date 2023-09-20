// import './bootstrap';


$(document).ready(function () {


    $('.quantity-right-plus').click(function (e) {
        let quantity = $('#quantity');
        e.preventDefault();
        let quantityNumber = parseInt(quantity.val());
        quantity.val(quantityNumber + 1);
    });

    $('.quantity-left-minus').click(function (e) {
        let quantity = $('#quantity');
        e.preventDefault();
        let quantityNumber = parseInt(quantity.val());
        if (quantityNumber > 0) {
            quantity.val(quantityNumber - 1);
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

    $('#add-to-cart').click(function () {
        let quantity = $('#quantity')
        let totalItem = $('#total-item-in-cart')

        let quantityValue = quantity.val()
        let currentTotalItem = totalItem.html()
        let total = parseInt(quantityValue) + parseInt(currentTotalItem)
        totalItem.html(total)
        quantity.val(1)
    })

    $('#upload-images').change(function (e) {
        let files = e.target.files || [];
        if (files.length > 0) {
            const previewImage = $('#preview-image');
            let html = "";
            for (let file of files) {
                let src = URL.createObjectURL(file)
                html += `<div class="preview-image-item">
                    <img src="${src}" alt="Vodaplay">
                </div>`
            }
            previewImage.html(html)
        }
    })
});
