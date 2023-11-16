<?php 
function shop_wc_output_content_wrapper(){
    echo '<section class="ptb-60"><div class="container"><div class="row">';
 }

  function shop_wc_after_main_content(){
     echo '</div></div></section>';
 }
 function shop_wc_show_page_title(){
    return;
 }

 function shop_wc_loop_product_title(){

 }

 function shop_wc_loop_product_thumbnail(){ ?>
<div class="product-image">
    <a href="<?php the_permalink() ?>"> <?php woocommerce_template_loop_product_thumbnail() ?></a>
    <div class="product-detail-inner">
        <div class="item-overlay">
            <ul>
                <li><?php woocommerce_template_loop_add_to_cart(); ?>
                </li>
                <?php if(shortcode_exists('ti_wishlists_addtowishlist')): ?>
                <li><?php echo do_shortcode('[ti_wishlists_addtowishlist]')?></li>
                <?php endif; ?>
                <li><a href="#" title="Compare"><i class="fa fa-random"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<?php }

function shop_wc_loop_rating_loop_price(){
    ?>
<div class="item-title"> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </div>
<div class="product-item-details">
    <div class="price-box">
        <?php woocommerce_template_loop_price();  woocommerce_template_loop_rating(); ?>
    </div>
</div>
<?php }