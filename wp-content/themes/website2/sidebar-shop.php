<div class="col-sm-4 col-md-8 mb-xs-30">
    <div class="sidebar-block">
        <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
        <div class="price-range mb-30">
                    <div class="inner-title">Search</div>
                    <?php get_search_form() ?>
                    <div id="slider-range"></div>
                </div>
            <div class="sidebar-title">
                <h3>Categories</h3>
            </div>
            <div class="sidebar-contant">
                <ul>
                    <?php
                    $product_categories = get_terms('product_cat');

                    foreach ($product_categories as $category) {
                        $category_link = get_term_link($category);
                        $category_count = $category->count;
                    ?>
                        <li><a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?>
                                <span>(<?php echo esc_html($category_count); ?>)</span></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- <div class="sidebar-box gray-box mb-40"> <span class="opener plus"></span>
            <div class="sidebar-title">
                <h3>Shop by</h3>
            </div>
            <div class="sidebar-contant">
                <div class="mb-20">
                    <div class="inner-title">Color</div>
                    <ul>
                        <?php
                        $colors = get_terms('pa_color');
                        foreach ($colors as $color) {
                            $color_link = get_term_link($color);
                            $color_count = $color->count;
                        ?>
                            <li><a href="<?php echo esc_url($color_link); ?>"><?php echo esc_html($color->name); ?>
                                    <span>(<?php echo esc_html($color_count); ?>)</span></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="mb-20">
                    <div class="inner-title">Manufacture</div>
                    <ul>
                        <?php
                        // Lặp qua danh sách nhà sản xuất đã được định rõ cho các sản phẩm trong WooCommerce
                        $manufacturers = get_terms('pa_manufacturer');

                        foreach ($manufacturers as $manufacturer) {
                            if (is_object($manufacturer)) {
                                $manufacturer_link = get_term_link($manufacturer);
                                $manufacturer_count = $manufacturer->count;
                        ?>
                                <li><a href="<?php echo esc_url($manufacturer_link); ?>"><?php echo esc_html($manufacturer->name); ?> <span>(<?php echo esc_html($manufacturer_count); ?>)</span></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <a href="#" class="btn btn-color">Refine</a>
            </div>
        </div> -->
        <div class="1sidebar-box sidebar-item"> <span class="opener plus"></span>
            <div class="sidebar-title">
                <h3>Best Seller</h3>
            </div>

            <div class="sidebar-contant">
                <ul> <?php // Lấy các sản phẩm bán chạy nhất từ Woocommerce 
                        $args = array('post_type' => 'product', 'posts_per_page' => 3, 'meta_key' => 'total_sales', 'orderby' => 'meta_value_num',);
                        $products = new WP_Query($args);
                        if ($products->have_posts()) {
                            while ($products->have_posts()) : $products->the_post(); ?>
                            <li>
                                <div class="pro-media"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                </div>
                                <div class="pro-detail-info"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <div>
                                        <?php woocommerce_template_loop_price(); ?>
                                    </div>
                            </li> <?php endwhile;
                                wp_reset_postdata();
                            } ?>
                </ul>
            </div>
        </div>
    </div>
</div>