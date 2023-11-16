
<div class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="newsletter">
        <div class="newsletter-inner center-sm">
          <div class="row">
            <div class="col-md-4">
              <div class="newsletter-title">
                <div class="newsletter-icon"><img src="<?php echo get_theme_file_uri('images/newsletter-icon.png') ?>" alt=" ">
                </div>
                <h2 class="main_title">Subscribe to our newsletter</h2>
              </div>
            </div>

            <div class="col-md-4">
              <input type="email" placeholder="Your email address">
              <button title="Subscribe"><i class="fa fa-paper-plane"></i> Subscribe</button>
            </div>

            <div class="col-md-4">
              <div class="footer_social right-side float-none-sm pt-sm-15 pb-sm-15 center-sm mt-sm-15">
                <ul class="social-icon">
                  <li>
                    <div class="title">Follow us on :</div>
                  </li>
                  <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-4 f-col">
          <div class="footer-static-block">
            <h3 class="title">About Us</h3>
            <p>Chúng tôi tin rằng thời trang không chỉ là về việc mặc đẹp mà còn là về cách bạn thể hiện bản thân và phản ánh cái tôi riêng của bạn. Group 3  ra đời với sứ mệnh làm nổi bật vẻ đẹp tự nhiên và phong cách riêng biệt của mỗi người</p>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4 f-col">
              <div class="footer-static-block">
                <h3 class="title">Information</h3>
                <ul class="link" style="color:aliceblue">
                  <li><a ><?php
                          wp_nav_menu(array(
                            'theme_location' => 'footerLocation1'
                          ));
                          ?></a></li>

                </ul>
              </div>
            </div>

            <div class="col-md-4 f-col">
              <div class="footer-static-block">
                <h3 class="title">Customer care</h3>
                <ul class="link">
                  <?php
                  wp_nav_menu(array(
                    'theme_location' => 'footerLocation2'
                  ));
                  ?>
                </ul>
              </div>
            </div>
            <div class="col-md-4 f-col">
              <div class="footer-static-block">
                <h3 class="title">Address</h3>
                <ul class="address-footer">
                  <li class="item"> <i class="fa fa-home"> </i>
                    <p>1056 Arlington Avenue, Mountain View, Arkansas</p>
                  </li>
                  <li class="item"> <i class="fa fa-envelope-o"> </i>
                    <p> <a>info@expent.info</a> </p>
                  </li>
                  <li class="item"> <i class="fa fa-phone"> </i>
                    <a href="tel:+223366554">+223366554</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 center-sm">
          <div class="copy-right">© 2018 All Rights Reserved. Design By <a href="http://themespry.com/">Themespry</a></div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="payment float-none-xs center-sm">
            <img src="<?php echo get_theme_file_uri('images/payment-method.png') ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $copyright = 'Design by Group 3';
echo apply_filters('Group3_copyright', $copyright);
?>
</footer>
<?php wp_footer() ?>
</body>

</html>