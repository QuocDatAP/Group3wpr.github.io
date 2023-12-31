<?php
get_header(); // Gọi phần header của theme
?>
<div class="page-banner">
      <div class="page-banner__bg-image"  style="background-image: url('<?php echo get_theme_file_uri('images/slider-fashion.jpg') ?>')"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
      </div>
      <div class="card my-4">
          
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <?php get_search_form() ?>
          </div>
        </div>
<?php
get_footer(); // Gọi phần footer của theme
?>
