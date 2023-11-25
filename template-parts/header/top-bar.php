<?php

/**
 * Header TopBar Template
 *
 * @package Asgard
 */

$menu_class     = \ASGARD_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'asgard-main-menu' );
?>
<div class="header-top-bar-main border-bottom border-opacity-20 border-light border-success">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center text-sm-center text-md-start">
                <div class="block-currency-wrapper">
                    <ul class="list-inline list-unstyled mx-0">
                        <li class="">
                            <span class="d-none d-sm-inline-block d-md-none d-lg-inline-block">US Toll Free:&nbsp;</span>
                            <a href="tel:+1(877)925-1112" class="text-decoration-none fs-14 text-black" aria-label="US Toll Free">+1(877)
                                925-1112</a></li>
                        <li class="d-none d-sm-inline-block">
                            <a href="javascript:void(0);"
                               class="bookmark-btn d-inline-flex justify-content-center align-items-center badge text-bg-primary fs-14 text-decoration-none rounded-pill fw-normal"
                               onclick="bookmarkmsg()">
                                Bookmark
                            </a>
                            <script>
                                function bookmarkmsg() {
                                    alert("Press Ctrl+D to bookmark this page.");
                                }
                            </script>
                        </li>
                        <li>
                            <div class="track-btn">
                                <a href="https://arrowmeds.aftership.com/" target="_blank"
                                   class="badge text-bg-primary fs-14 text-decoration-none rounded-pill fw-normal">Track
                                    Order</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 hidden-xs d-none d-sm-none d-md-block">
                <div class="toplinks">
                    <div class="links d-flex justify-content-end align-self-center align-self-stretch">
                        <p class="head_whatsapp mb-0">
                            <svg width="25px" height="25px" viewBox="-5.52 -5.52 35.04 35.04" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" stroke="">
                                <g id="SVGRepo_bgCarrier" stroke-width="0">
                                    <rect x="-5.52" y="-5.52" width="35.04" height="35.04" rx="17.52" fill="#42D741"
                                          strokewidth="0"></rect>
                                </g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M3.50002 12C3.50002 7.30558 7.3056 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C10.3278 20.5 8.77127 20.0182 7.45798 19.1861C7.21357 19.0313 6.91408 18.9899 6.63684 19.0726L3.75769 19.9319L4.84173 17.3953C4.96986 17.0955 4.94379 16.7521 4.77187 16.4751C3.9657 15.176 3.50002 13.6439 3.50002 12ZM12 1.5C6.20103 1.5 1.50002 6.20101 1.50002 12C1.50002 13.8381 1.97316 15.5683 2.80465 17.0727L1.08047 21.107C0.928048 21.4637 0.99561 21.8763 1.25382 22.1657C1.51203 22.4552 1.91432 22.5692 2.28599 22.4582L6.78541 21.1155C8.32245 21.9965 10.1037 22.5 12 22.5C17.799 22.5 22.5 17.799 22.5 12C22.5 6.20101 17.799 1.5 12 1.5ZM14.2925 14.1824L12.9783 15.1081C12.3628 14.7575 11.6823 14.2681 10.9997 13.5855C10.2901 12.8759 9.76402 12.1433 9.37612 11.4713L10.2113 10.7624C10.5697 10.4582 10.6678 9.94533 10.447 9.53028L9.38284 7.53028C9.23954 7.26097 8.98116 7.0718 8.68115 7.01654C8.38113 6.96129 8.07231 7.046 7.84247 7.24659L7.52696 7.52195C6.76823 8.18414 6.3195 9.2723 6.69141 10.3741C7.07698 11.5163 7.89983 13.314 9.58552 14.9997C11.3991 16.8133 13.2413 17.5275 14.3186 17.8049C15.1866 18.0283 16.008 17.7288 16.5868 17.2572L17.1783 16.7752C17.4313 16.5691 17.5678 16.2524 17.544 15.9269C17.5201 15.6014 17.3389 15.308 17.0585 15.1409L15.3802 14.1409C15.0412 13.939 14.6152 13.9552 14.2925 14.1824Z"
                                          fill="#fff"></path>
                                </g>
                            </svg>
                            <strong><a href="https://api.whatsapp.com/send?phone=18779251112&amp;text=Hi,%20Arrowmeds,%20Team"
                                       class="text-decoration-none fs-14 text-black">&nbsp;187-7925-1112 <span
                                            class="d-none d-sm-none d-md-none d-lg-inline-block">(Click to chat)</span></a></strong>
                        </p>
                        <ul id="menu-toplinks"
                            class="top-links1 mega-menu1 show-arrow list-unstyled d-flex align-items-center">
                            <li id="nav-menu-item-4855"
                                class="menu-item menu-item-type-post_type menu-item-object-page  narrow "><a
                                        href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"
                                        class="text-decoration-none">My account</a></li>
							<?php
							if ( is_user_logged_in() ) {
								if ( class_exists( 'WooCommerce' ) ) {
									$logout_link = wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );
								} else {
									$logout_link = wp_logout_url( get_home_url() );
								}
								?>
                                <li class="menu-item">
                                    <span>
                                        <a href="<?php echo esc_url( $logout_link ); ?>"
                                           class="text-decoration-none fs-14 text-black">Logout</a>
                                    </span>
                                </li>
								<?php
							} else {
								$login_link = $register_link = '';
								if ( class_exists( 'WooCommerce' ) ) {
									$login_link = wc_get_page_permalink( 'myaccount' );
									if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) {
										$register_link = wc_get_page_permalink( 'myaccount' );
									}
								} else {
									$login_link    = wp_login_url( get_home_url() );
									$active_signup = get_site_option( 'registration', 'none' );
									$active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
									if ( $active_signup != 'none' ) {
										$register_link = wp_registration_url( get_home_url() );
									}
								}
								?>
                                <li class="menu-item"><span><a href="<?php echo esc_url( $login_link ); ?>"
                                                               class="text-decoration-none fs-14 text-black">Login</a></span>
                                </li>
								<?php
								if ( $register_link ) {
									?>
                                    <li class="menu-item"><span><a href="<?php echo esc_url( $register_link ); ?>"
                                                                   class="text-decoration-none fs-14 text-black">Register</a></span>
                                    </li>
									<?php
								}
							}
							?>
                        </ul>
                    </div>
                </div>
                <!-- End Header Top Links -->
            </div>
        </div>
    </div>
</div>