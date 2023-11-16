jQuery(document).ready(function($) {
    $('.countdown-sale-timer').each(function() {
        var countdown = $(this);
        var targetTime = parseInt(countdown.data('time'));
        
        if (targetTime > 0) {
            setInterval(function() {
                targetTime -= 1;
                
                var days = Math.floor(targetTime / (24 * 60 * 60));
                var hours = Math.floor((targetTime % (24 * 60 * 60)) / (60 * 60));
                var minutes = Math.floor((targetTime % (60 * 60)) / 60);
                var seconds = targetTime % 60;
                
                countdown.html('<span class="countdown-sale-days">' + days + 'd </span>'
                    + '<span class="countdown-sale-hours">' + hours + 'h </span>'
                    + '<span class="countdown-sale-minutes">' + minutes + 'm </span>'
                    + '<span class="countdown-sale-seconds">' + seconds + 's </span>');
            }, 1000);
        }
    });
});
