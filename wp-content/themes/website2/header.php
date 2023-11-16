<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>Document</title>
</head>

<body <?php body_class(); ?>>
    <header class="navbar navbar-custom" id="header">
        <div class="header-top bg-gray">
            <div class="container">
                <div class="row header">
                    <div class="col-sm-5">
                        <div class="top-link top-link-left">
                            <ul class="social-icon">
                                <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                                <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                                <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                                <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                                <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="top-link right-side">
                            <ul>
                                <?php if(class_exists("WooCommerce")): ?>
                                <?php if(is_user_logged_in()) : ?>
                                <li class="login-icon">
                                    <a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")) ?>">
                                        <i class="fa fa-user"></i>
                                        <span class="hidden-xs hidden-sm hidden-md">MY ACCOUNT</span>
                                    </a>
                                </li>

                                <li class="Compare-icon">
                                    <a href="<?php echo wp_logout_url(get_permalink(get_option("woocommerce_myaccount_page_id"))) ?>">
                                        <i class="fa fa-sign-in"></i>
                                        <span class="hidden-xs hidden-sm hidden-md">LOGOUT</span>
                                    </a>
                                </li>


                                    <?php else: ?>
                                        <li class="login-icon">
                                    <a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")) ?>">
                                        <i class="fa fa-user"></i>
                                        <span class="hidden-xs hidden-sm hidden-md">Login/Register</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="header-middle">
            <div class="container">
                <div class="header-inner">
                    <div class="navbar-header">
                        <a> <a href=""><?php the_custom_logo() ?></a> </a>
                    </div>
                    <div class="right-side float-none-sm">
                        <div class="right-side float-left-xs header-right-link">

                            <ul>
            


                                <?php get_search_form() ?>

                                <li class="cart-icon"> <a href="<?php echo wc_get_cart_url(); ?>"
                                        title="<?php _e('Cart View', 'woothemes'); ?>"><span><i
                                                class="fa fa-shopping-cart"></i> <small class="cart-notification"> <?php echo sprintf(_n('%d item',  WC()->cart->cart_contents_count, 'woothemes'),
                    WC()->cart->cart_contents_count);?></small> </span> </a>

                                </li>
                                <li class="account-icon"> <a
                                        href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>"><span><i
                                                class="fa fa-heart-o"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header_search_toggle mobile-view">
                        <form>
                            <div class="search-box">
                                <input class="input-text" type="text" placeholder="Search entire store here...">
                                <button class="search-btn"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container position-r">
                <div class="row m-0">
                    <div class="col-md-9 p-0">
                        <div class="nav_sec position-r">
                            <div class="mobilemenu-title mobilemenu">
                                <span>Menu</span>
                                <i class="fa fa-bars pull-right"></i>
                            </div>
                            <div class="mobilemenu-content">
                                <nav class="main-navigation">
                                  
                                    <ul>
                                        <?php
                wp_nav_menu(array(
                  'theme_location' => 'headerMenuLocation'
                ));
              ?>
                                    </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>