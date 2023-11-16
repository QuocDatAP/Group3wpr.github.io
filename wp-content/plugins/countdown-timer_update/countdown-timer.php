<?php
/*
Plugin Name: Countdown Timer Plugin 
Plugin URI: https://example.com/countdown-timer-plugin
Description: A simple countdown timer plugin for WordPress.
Version: 1.0
Author: Group 3
Author URI: https://example.com
*/

// Tạo shortcode để nhúng bộ đếm ngược vào các trang hoặc bài viết
function countdown_timer_shortcode($atts) {
    ob_start();

    // Lấy các thuộc tính shortcode (nếu có)
    $atts = shortcode_atts(array(
        'date' => '2023-12-31', // Ngày mục tiêu
        'time' => '00:00:00' // Giờ mục tiêu
    ), $atts);

    // Tạo ID duy nhất cho bộ đếm ngược
    $timer_id = uniqid();

    // Nhúng script và CSS cần thiết
    wp_enqueue_script('countdown-timer-script', plugin_dir_url(__FILE__) . 'js/countdown-timer-script.js', array('jquery'), '1.0', true);
    wp_enqueue_style('countdown-timer-style', plugin_dir_url(__FILE__) . 'css/countdown-timer-style.css');

    // Hiển thị div chứa bộ đếm ngược
    echo '<div id="countdown-timer-'.$timer_id.'" class="countdown-timer" data-date="'.$atts['date'].'" data-time="'.$atts['time'].'"></div>';

    return ob_get_clean();
}
add_shortcode('countdown_timer', 'countdown_timer_shortcode');