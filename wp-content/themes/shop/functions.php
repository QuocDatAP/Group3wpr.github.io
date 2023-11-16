<?php 

define('THEME_URI',get_template_directory_uri());
define('THEME_PATH',get_template_directory());

/*INCLUDE THEME FILES */

include(THEME_PATH. '/inc/woocommerce.php');

/*ADD HOOKS */
add_action('wp_enqueue_scripts','shop_script');
function shop_script( ){
wp_enqueue_style('style_theme', get_stylesheet_uri());
wp_enqueue_style('font-awesome', get_theme_file_uri('/css/font-awesome.min.css'));
wp_enqueue_style('font-awesome1', get_theme_file_uri('/css/bootstrap.css'));
wp_enqueue_style('jquery-ui', get_theme_file_uri('/css/jquery-ui.css'));
wp_enqueue_style('owl-carousel', get_theme_file_uri('/css/owl.carousel.css'));
wp_enqueue_style('magnific-popup', get_theme_file_uri('/css/magnific-popup.css'));
wp_enqueue_style('fotorama', get_theme_file_uri('/css/fotorama.css'));
wp_enqueue_style('custom', get_theme_file_uri('/css/custom.css'));
wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));

wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap.min.js'),  array('jquery'), '', true);
wp_enqueue_script('bootstrap-js1', get_theme_file_uri('/js/jquery-1.12.3.min.js'),  array('jquery'), '', true);
wp_enqueue_script('jquery-ui-min', get_theme_file_uri('js/jquery-ui.min.js'),  array('jquery'), '', true);
wp_enqueue_script('fotorama', get_theme_file_uri('/js/fotorama.js'),  array('jquery'), '', true);
wp_enqueue_script('jquery-magnific-popup', get_theme_file_uri('/js/jquery.magnific-popup.js'),  array('jquery'), '', true);
wp_enqueue_script('owl-carousel-min', get_theme_file_uri('/js/owl.carousel.min.js'),  array('jquery'), '', true);
wp_enqueue_script('custom', get_theme_file_uri('/js/custom.js'),  array('jquery'), '', true);    
}


add_theme_support('post-formats',array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',

));


function my_theme_support()
{
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
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

add_action('woocommerce_before_main_content','shop_wc_output_content_wrapper',10);
add_action('woocommerce_after_main_content','shop_wc_after_main_content',10);
add_action('woocommerce_shop_loop_item_title','shop_wc_loop_product_title',10);
add_action('woocommerce_before_shop_loop_item_title','shop_wc_loop_product_thumbnail',10);
add_action('woocommerce_after_shop_loop_item_title','shop_wc_loop_rating_loop_price',10);



remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_after_main_content',10);
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);


add_filter('woocommerce_show_page_title','shop_wc_show_page_title');



//remove_action("woocommerce_sidebar", "woocommerce_get_sidebar");
//  add container & row class
function open_container_row_div_classes()
{
    echo "<div class='container owt-container'><div class='row owt-row'> ";
}
add_action("woocommerce_before_main_content", "open_container_row_div_classes", 5);

function close_container_row_div_classes()
{
    echo "</div></div>";
}
add_action("woocommerce_after_main_content", "close_container_row_div_classes", 5);

add_action("template_redirect", "load_template_layout");

function load_template_layout()
{
    if (is_shop()) {
        add_action("woocommerce_before_main_content", "open_sidebar_column_grid", 6);
        function open_sidebar_column_grid()
        {
            echo "<div class= 'col-sm-4'>";
        }
        add_action("woocommerce_before_main_content", "woocommerce_get_sidebar", 7);

        add_action("woocommerce_before_main_content", "close_sidebar_column_grid", 8);
        function close_sidebar_column_grid()
        {
            echo "</div>";
        }
    }
}
add_filter("woocommerce_show_page_title","toggle_page_title");

function toggle_page_title($val){
    $val = false;
    return $val;
}

//add_action("woocommerce_after_shop_loop_item_title","the_excerpt");

remove_action("woocommerce_before_main_content","woocommerce_breadcrumb",20);

remove_action("woocommerce_before_shop_loop","woocommerce_result_count",20);

remove_action("woocommerce_before_shop_loop","woocommerce_catalog_ordering",30);


