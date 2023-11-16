<?php

function my_theme_support()
{
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce', array(
        "thumbnail_image_width" => 300,
        "single_image_width" => 300,
        "product_grid" => array(
            "default_columns" => "7",
            "min_columns" => "2",
            "max_columns" => "3",

        )
    ));
    add_theme_support('title-tag');
    register_nav_menu('headerMenuLocation', 'Header Menu Location ');
    register_nav_menu('footerLocation1', 'Footer Menu 1 ');
    register_nav_menu('footerLocation2', 'Footer Menu 2 ');

    add_theme_support('custom-logo', array(
        'width' => 100,
        'height' => 100,
        'flex-width' => true,
    ));
    //product thumbnail effect support
    add_theme_support("wc-product-gallery-zoom");
    add_theme_support("wc-product-gallery-lightbox");
    add_theme_support("wc-product-gallery-slider");
}

add_action('after_setup_theme', 'my_theme_support');
function university_files()
{
    wp_enqueue_style('style_theme', get_stylesheet_uri());
    wp_enqueue_style('jquery-ui', get_theme_file_uri('/css/jquery-ui.css'));
    wp_enqueue_style('owl-carousel', get_theme_file_uri('/css/owl.carousel.css'));
    wp_enqueue_style('magnific-popup', get_theme_file_uri('/css/magnific-popup.css'));
    wp_enqueue_style('fotorama', get_theme_file_uri('/css/fotorama.css'));
    wp_enqueue_style('custom', get_theme_file_uri('/css/custom.css'));
    wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));

    if(is_home()){
        wp_enqueue_style('responsive1',get_theme_file_uri('/css/Phantrang.css'));
    }
    if(is_404()){
        wp_enqueue_style('responsive1',get_theme_file_uri('/css/404.css'));
    }


    wp_enqueue_style("style", get_stylesheet_uri(),array() ,"1.0","all");
    wp_enqueue_style('main_style', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('second_style', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_script('my-script', get_theme_file_uri('/build/index.js'),  array('jquery'), '1.0', true);
    wp_enqueue_style('bootstrap-1', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('bootstrap-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'university_files');

function nhom3_get_posts($query)
{
    if ($query->is_home() && $query->is_main_query())
        $query->set('orderby', 'rand');
}
//add_action('pre_get_posts', 'nhom3_get_posts');

//add_filter('the_content_feed', 'filter_the_content_feed', 10, 2);

function filter_the_content_feed($content, $feed_type)
{
    // Kiểm tra xem chúng ta có đang trong vòng lặp chính trong một Bài viết không.
    if (is_singular() && in_the_loop() && is_main_query()) {
        return $content . esc_html__('Tôi đang lọc nội dung cho feed', 'wporg');
    }
    return $content;
}


function group3_content_filter($content)
{
    $find = 'Lorem';
    $replacement = '<strong style ="color: red; font-size:30px;" >Lorem</strong>';
    $content = str_replace($find, $replacement, $content);
    return $content;
}
add_filter('the_content', 'group3_content_filter');

function simple_bootstrap_theme_add_anchor_links($classes,$item, $args){
    $classes['class'] = "nav-link sbt-link-class";
    return $classes;
}
add_filter("nav_menu_link_attributes","simple_bootstrap_theme_add_anchor_links",1,10);


include_once 'include/wc-modifications.php';

function wpdocs_after_setup_theme() {
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );

 

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
    
	ob_start();

	?>
	 <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View   cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}

/**
 * Default WooCommerce Cart Hooks (just an example, do not copy)
 *
 */?>
<?php 



add_filter('woocommerce_sale_flash', 'replace_discount_text_with_percentage', 10, 3);
function replace_discount_text_with_percentage($html, $post, $product) {
    $regular_price = floatval($product->get_regular_price());
    $sale_price = floatval($product->get_sale_price());
    
    if ($regular_price > 0) {
        $percentage = round(($regular_price - $sale_price) / $regular_price * 100);
        $html = '<span class="onsale">' . esc_html($percentage) . '%</span>';
    }
    return $html;
}

function custom_add_social_sharing_buttons() {
    if (is_product()) {
        echo '<div class="social-sharing-buttons">';
        echo '<a href="https://www.facebook.com/sharer.php?u=' . get_permalink() . '" target="_blank" class="social-button">Share on Facebook</a>';
        echo '<a href="https://twitter.com/share?url=' . get_permalink() . '" target="_blank" class="social-button">Share on Twitter</a>';
        echo '<a href="https://www.linkedin.com/shareArticle?url=' . get_permalink() . '" target="_blank" class="social-button">Share on LinkedIn</a>';
        echo '</div>';
    }
}
add_action('woocommerce_single_product_summary', 'custom_add_social_sharing_buttons',70);


function get_product_views($product_id) {
    $views = get_post_meta($product_id, '_product_views', true);
    return (int) $views;
}

function set_product_views($product_id) {
    $views = get_product_views($product_id);
    update_post_meta($product_id, '_product_views', $views + 1);
}

// Hook để tăng số lượng người xem mỗi khi sản phẩm được xem
add_action('template_redirect', 'track_product_views');

function track_product_views() {
    if (is_single() && is_product()) {
        global $post;
        if ($post && $post->ID) {
            set_product_views($post->ID);
        }
    }
}

// Hiển thị số lượng người xem sản phẩm trên trang sản phẩm
function display_product_views() {
    global $product;
    if ($product) {
        $product_id = $product->get_id();
        $views = get_product_views($product_id);
        echo 'Số lượt xem: ' . $views;
    }
}

// Thêm hook để hiển thị số lượng người xem trên trang sản phẩm
add_action('woocommerce_single_product_summary', 'display_product_views', 11);




function track_order_shortcode() {
     ob_start();
?>
    <div class="order-tracking-form">
         <h2>Enter your order ID to track your order</h2>
         <form method="post">
             <input type="text" name="order_id" placeholder="Enter your order ID">
             <input type="submit" value="Track Order">
         </form>
     </div>
       <?php 
    return ob_get_clean();
}
add_shortcode('track_order', 'track_order_shortcode');



//Code phan trang
// Numbered Pagination
if (!function_exists('wpex_pagination')) {

    function wpex_pagination()
    {

        $prev_arrow = is_rtl() ? '→' : '←';
        $next_arrow = is_rtl() ? '←' : '→';

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if ($total > 1) {
            if (!$current_page = get_query_var('paged'))
                $current_page = 1;
            if (get_option('permalink_structure')) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => $format,
                    'current' => max(1, get_query_var('paged')),
                    'total' => $total,
                    'mid_size' => 3,
                    'type' => 'list',
                    'prev_text' => $prev_arrow,
                    'next_text' => $next_arrow,
                )
            );
        }
    }
}

// Đăng ký hàm callback để gửi email khi có sản phẩm mới
