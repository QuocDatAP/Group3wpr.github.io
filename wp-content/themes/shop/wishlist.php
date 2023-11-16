<?php get_header(); ?>
<section class="ptb-60">
    <div class="container">
      <div class="row">
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();?>
        <div class="col-xs-12">
              <?php 
              if (shortcode_exists('ti_wishlistsview')):
                echo do_shortcode('ti_wishlistsview');
              endif;
              ?>



        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>
<?php get_footer(); ?>