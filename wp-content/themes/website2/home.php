<?php get_header() ?>
<div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title"><?php the_title() ?></h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="<?php echo site_url('/')?>">Home</a>/</li>
            <li><span><?php the_title() ?></span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
<section class="py-4">
    <div class="container">
        <h1>New post</h1>
        <div class="row">
            <?php
            $args = array(
                'post_status' => 'publish',
                // Chỉ lấy những bài viết được publish
                'showposts' => 1,
                // số lượng bài viết
            );
            $getposts = new WP_query($args);
            global $wp_query;
            $wp_query->in_the_loop = true;
            while ($getposts->have_posts()):
                $getposts->the_post();
                $url1 = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                <!-- các thành phần cần lấy -->

                <div class="col-sm col-lg">
                    <a href="#"><img class="" src=<?php echo $url1 ?>></a>
                    <div class="">
                        <h2 class=" card-title h4" style="margin-top: 10px">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title() ?>
                            </a>
                        </h2>
                        <p class="">
                            <?php the_content() ?>
                        </p>
                        <a class="btn btn-primary" href="<?php the_permalink() ?>">Read more →</a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>

</section>

<section class="py-5">
    <!-- post style 2-->
    <div class="container">
        <h1>More</h1>
        <div class="row">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    //
                    //Post Content?>
                    <div class="col-sm-6 col-lg-4">
                        <a href="#"><img class="card-img-top" style="height: 188.65px;width: 350px;" src=<?php echo $url ?>></a>
                        <div class="card-body">

                            <h2 class="card-title h4">
                                <a href="<?php the_permalink() ?>">
                                  <?php the_title() ?>
                                </a>
                            </h2>
                            <p class="card-text" style="">
                                <?php the_excerpt() ?>
                            </p>
                            <a class="btn btn-primary" href="<?php the_permalink() ?>">Read more →</a>
                        </div>
                    </div>
                    <?php
                    //
                } // end while
            } // end if
         
            ?>
        </div>
       <?php  wpex_pagination (); ?>
    </div>
</section>

</section>

<?php get_footer() ?>

