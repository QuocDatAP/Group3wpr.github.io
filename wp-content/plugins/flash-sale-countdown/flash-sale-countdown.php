<?php
/*
Plugin Name: Flash Sale Countdown
Description: A plugin to create a countdown timer for flash sales.
Version: 1.0
Author: Your Name
*/

// Enqueue JavaScript for countdown timer
function enqueue_flash_sale_countdown_script() {
    wp_enqueue_script('flash-sale-countdown', plugin_dir_url(__FILE__) . 'js/flash-sale-countdown.js', array('jquery'), '1.0', true);

    wp_localize_script('flash-sale-countdown', 'flash_sale_params', array(
        'category' => 'Clothing',
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_flash_sale_countdown_script');

// Shortcode function to display the countdown timer
function flash_sale_countdown_shortcode() {
    ob_start();
    ?>
    <div id="flash-sale-countdown"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('flash_sale_countdown', 'flash_sale_countdown_shortcode');

// Apply discount to products in the flash sale category
function apply_flash_sale_discount() {
    $category = sanitize_text_field($_POST['category']);
    $discount = 0.9; // 10% discount (adjust as needed)

    if (has_term($category, 'product_cat')) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $product_id = $cart_item['product_id'];

            if (has_term($category, 'product_cat', $product_id)) {
                $product = wc_get_product($product_id);
                $product_price = $product->get_price();
                $new_price = $product_price - ($product_price * $discount);
                $cart_item['data']->set_price($new_price);
            }
        }
    }
    wp_die();
}
add_action('wp_ajax_apply_flash_sale_discount', 'apply_flash_sale_discount');
add_action('wp_ajax_nopriv_apply_flash_sale_discount', 'apply_flash_sale_discount');
