jQuery(document).ready(function($) {
    $('.sale-countdown').each(function() {
        var sale_end_date = $(this).data('sale-end-date');
        $(this).countdown(sale_end_date, function(event) {
            $(this).html(event.strftime('%D days %H:%M:%S'));
        });
    });
});
