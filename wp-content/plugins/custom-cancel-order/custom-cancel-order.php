<?php
/*
Plugin Name: Custom Cancel Order
Description: Adds the ability to cancel orders in WooCommerce.
Version: 1.0
Author: Your Name
*/

// Hàm để hủy đơn hàng
function custom_cancel_order($order_id) {
    // Kiểm tra xem đơn hàng tồn tại và có thể bị hủy không
    $order = wc_get_order($order_id);

    if ($order) {
        // Đặt trạng thái của đơn hàng thành "Hủy"
        $order->update_status('cancelled');

        // Thêm lý do hủy đơn hàng (tùy chọn)
        $order->add_order_note(
            'Đơn hàng đã bị hủy bởi người dùng.',
            true
        );

        // Hoàn trả tiền (tùy thuộc vào cài đặt)
        $order->set_status('refunded');
        $order->save();

        // Tùy chỉnh các hành động khác ở đây, ví dụ: gửi email thông báo
    }
}

// Sử dụng hook để gọi hàm hủy đơn hàng (ví dụ: khi người dùng nhấn nút hủy)
add_action('wp_ajax_cancel_order', 'custom_cancel_order');
add_action('wp_ajax_nopriv_cancel_order', 'custom_cancel_order');
