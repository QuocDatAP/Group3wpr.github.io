<?php get_header() ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url('<?php echo get_theme_file_uri('images/slider-image-1.jpg') ?>')"></div>
    <div class="page-banner__content container t-center c-white">
        <h2 class="headline headline--large">Welcome to Our Fashion Store</h2>
        <h3 class="headline headline--medium">Discover the Latest Trends and Styles</h3>
      
        <a href="#" class="btn btn--large btn--blue">SHOP</a>
    </div>
</div>

<div class="col-md-6 owt-css">
    <div class="featured-home">
        <h1>Featured Products</h1>
    </div>
    <div class="card my-4 my-product">
        <?php echo do_shortcode('[featured_products per_page="12"  orderby="date" order="desc"]'); ?>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Mar</span>
                    <span class="event-summary__day">25</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">Poetry in the 100</a></h5>
                    <p>Bring poems you&rsquo;ve wrote to the 100 building this Tuesday for an open mic and snacks. <a href="#" class="nu gray">Learn more</a></p>
                </div>
            </div>
            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Apr</span>
                    <span class="event-summary__day">02</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
                    <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
                </div>
            </div>

            <p class="t-center no-margin"><a href="#" class="btn btn--blue">View All Events</a></p>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php
            $my_query = new WP_Query(array(
                'post_per_page' => 2,
                'orderby' =>  'rand',
            ));
            while ($my_query->have_posts()) {
                $my_query->the_post();

            ?>
                <?php
                // Lấy ID của single post hiện tại
                $post_id = get_the_ID();

                // Lấy URL của single post
                $post_permalink = get_permalink($post_id);
                ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="#">
                        <span class="event-summary__month"><?php echo get_the_date('M') ?></span>
                        <span class="event-summary__day"><?php echo get_the_date('D') ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo esc_url($post_permalink); ?>"><?php echo the_title() ?></a>
                        </h5>
                        <p> <?php echo the_excerpt() ?> <a href="#" class="nu gray">Read more</a></p>
                    </div>
                </div>

            <?php } ?>

            <p class="t-center no-margin"><a href="<?php echo site_url('/blog') ?>" class="btn btn--yellow">View All
                    Blog Posts</a></p>
        </div>
    </div>
</div>
<section class="pb-60 pb-xs-30">
    <div class="service-block center-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-6 feature-box-main">
                    <div class="feature-box">
                        <i class="fa fa-truck"></i>
                        <div class="title">Free Delivery</div>
                        <div class="subtitle">From $99.99</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 feature-box-main">
                    <div class="feature-box">
                        <i class="fa fa-users"></i>
                        <div class="title">Support 24/7</div>
                        <div class="subtitle">Online 24 hours</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 feature-box-main">
                    <div class="feature-box">
                        <i class="fa fa-shield"></i>
                        <div class="title">Safe Payment</div>
                        <div class="subtitle">Buyers Safety</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 feature-box-main">
                    <div class="feature-box">
                        <i class="fa fa-usd"></i>
                        <div class="title">More Discount</div>
                        <div class="subtitle">on affiliation</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="col-md-6 owt-css">
    <div class="featured-home">
        <h1>Latest Products</h1>
    </div>
    <div class="card my-4 my-product">
        <?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]'); ?>
    </div>
</div>
<?php get_footer(); ?>