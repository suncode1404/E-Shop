// public/js/quantity.js
$(document).ready(function () {
    $('.btn-number').click(function (e) {
        e.preventDefault();

        var button = $(this);
        var input = button.closest('.input-group').find('.input-number');
        var currentValue = parseInt(input.val());
        var type = button.data('type');
        var minValue = parseInt(input.data('min'));
        var maxValue = parseInt(input.data('max'));
        let price = parseInt(button.closest('tr').find('.price span').text().replace(/[^0-9]/g, ''));
        let inputTotalPrice = button.closest('tr').find('.total-amount span');
        var inputSubTotal = $('#cartsubtotal span');
        var inputTotal  = $('#carttotal span');
        var subTotalPrice = parseInt(inputSubTotal.text().replace(/[^0-9]/g, ''));
        if (type === 'minus') {

            newValue = currentValue - 1;
            if (newValue < 1) {
                return;
            }
            let totalPrice = newValue * price;
            //sub price tổng tiền
            subTotalPrice -= price;
            // console.log(subTotalPrice);
            inputTotalPrice.text(totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            inputSubTotal.text(subTotalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            inputTotal.text(subTotalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            // console.log(newValue);
        } else {
            newValue = currentValue + 1;
            let totalPrice = newValue * price;
            subTotalPrice += price;
            inputTotalPrice.text(totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            inputSubTotal.text(subTotalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
            inputTotal.text(subTotalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'đ');
        }

        if (newValue >= minValue && newValue <= maxValue) {
            input.val(newValue);
            updateQuantity(input, newValue);
        }
    });

    function updateQuantity(button, quantity) {
        var price = parseInt(button.closest('tr').find('.price span').text().replace(/[^0-9]/g, ''));
        var id = parseInt(button.closest('tr').find('.id').text());
        console.log();
        $.ajax({
            url: '/update-quantity',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                idProduct: id,
                priceProduct: price,
                quantity: quantity
            },
            success: function (response) {
                if (response.status === 'success') {
                    console.log('Quantity updated successfully.');
                } else {
                    alert(response.message);
                }
            }
        });
    }
});
