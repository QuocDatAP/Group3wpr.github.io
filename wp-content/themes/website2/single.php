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
<?php 
while(have_posts()){
    the_post();
    ?>
    <h2><?php the_title() ?></h2>
    <p class ="content"><?php the_content()?></p>
<?php
}
?>
               
               <?php comments_template(); ?>
<?php get_footer() ?>