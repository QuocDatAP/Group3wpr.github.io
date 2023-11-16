jQuery(function($) {
    // Lặp qua mỗi div countdown-timer
    $('.countdown-timer').each(function() {
        var $this = $(this);

        // Lấy các thuộc tính từ data-attribute
        var date = $this.data('date');
        var time = $this.data('time');

        // Tính toán ngày giờ mục tiêu
        var targetDateTime = new Date(date + ' ' + time);

        // Cập nhật bộ đếm ngược
        function updateCountdown() {
            var now = new Date().getTime();
            var distance = targetDateTime - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $this.text(days + 'd ' + hours + 'h ' + minutes + 'm ' + seconds + 's');

            if (distance < 0) {
                clearInterval(countdown);
                $this.text('EXPIRED');
            }
        }
        updateCountdown();

        // Update bộ đếm ngược mỗi giây
        var countdown = setInterval(updateCountdown, 1000);
    });
});
