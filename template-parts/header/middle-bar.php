<?php

/**
 * Header MiddleBar Template
 *
 * @package Asgard
 */

$menu_class = \ASGARD_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('asgard-main-menu');
?>
<div class="middle-bar mt-2 mb-3">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 logo-block">
	            <?php
	            if ( function_exists( 'the_custom_logo' ) ) {
		            the_custom_logo();
	            }
	            ?>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6 col-xs-3 category-search-form d-none d-sm-none d-md-block">
                <?php
                if ( shortcode_exists( 'fibosearch' ) ) {
	                echo do_shortcode('[fibosearch]');
                }
                ?>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6 card_wishlist_area">
	            <?php //if (class_exists('WooCommerce')) { ?>
                <!-- <div class="top-cart-contain position-relative">
		            <?php //asgard_mini_cart(); ?>
                </div> -->
                <?php //} ?>
                <ul class="contact-group p-0 m-0">
                    <li class="list-group-item"><a href="#" class="text-primary">Contact Dr Fox</a></li>
                    <li class="list-group-item">T: <a href="tel:01172050198" class="text-decoration-none text-black">0117 2050198</a></li>
                    <li class="list-group-item">E: <a href="mailto:info@doctorfox.co.uk" class="text-decoration-none text-black">info@doctorfox.co.uk</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>