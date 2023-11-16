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
<div class="container container--narrow page-section">
    </div>
    <div class="container">
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <p class="content"><?php the_content() ?></p>
        <?php
        }
        ?>
    </div>
</div>
<?php get_footer() ?>