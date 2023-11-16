jQuery(document).ready(function($) {
    var endDateTime = new Date('2023-12-31 23:59:59').getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = endDateTime - now;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById('flash-sale-countdown').innerHTML = 'Sale has ended!';
        } else {
            $.ajax({
                url: flash_sale_params.ajax_url,
                type: 'post',
                data: {
                    action: 'apply_flash_sale_discount',
                    category: flash_sale_params.category,
                },
                success: function(response) {
                    // Handle the response if needed
                },
            });

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('flash-sale-countdown').innerHTML =
                days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's';
        }
    }, 1000);
});
