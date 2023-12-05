<?php
/**
 * Footer Template
 *
 * @package Asgard
 */
?>

</div>
<footer>
<!--    <div class="footer-top bg-black bg-opacity-75 py-3">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-12 col-md-6 align-items-center justify-content-lg-start justify-content-center my-1">-->
<!--					--><?php
////					if ( is_active_sidebar( 'footer-newsletter' ) ) {
////						dynamic_sidebar( 'footer-newsletter' );
////					}
//					?>
<!--                </div>-->
<!--                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-end my-1">-->
<!--                    <a href="--><?php //// echo home_url( '/securemedz-app/' ); ?><!--">-->
<!--                        <svg width="180" height="53.333">-->
<!--                            <use href="#app-logo"></use>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="footer-widget bg-success pt-sm-4 pt-md-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 pt-4 pt-md-4 pb-md-4 mb-4 mb-md-0">
					<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php } ?>
                </div>
                <div class="col-lg-2 col-sm-6 pt-md-4 pb-md-4 mb-4 mb-md-0">
					<?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                <div class="col-lg-2 col-sm-6  pt-lg-4 pb-md-4 mb-4 mb-md-0">
					<?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <div class="col-lg-2 col-sm-6 pt-lg-4 pb-md-4 mb-4 mb-md-0">
					<?php dynamic_sidebar( 'footer-4' ); ?>
                </div>
                <div class="col-lg-3 col-sm-6 pt-lg-4 pb-md-4 mb-4 mb-md-0">
					<?php dynamic_sidebar( 'footer-5' ); ?>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="social-payment border-top bg-dark py-sm-4 py-2">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="social-links col-sm-6 py-2 d-flex align-items-center">-->
<!--                    <ul class="list-inline m-0 p-0 text-center text-sm-start w-100">-->
<!--                        <li class="list-inline-item">-->
<!--                            <a href="https://www.facebook.com/securemedzus/" target="_blank"-->
<!--                               class="bg-primary p-1 rounded-2 lh-sm">-->
<!--                                <svg width="15" height="15" fill="#fff">-->
<!--                                    <use href="#icon-facebook"></use>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="list-inline-item">-->
<!--                            <a href="https://twitter.com/securemedz" target="_blank"-->
<!--                               class="bg-primary p-1 rounded-2 lh-sm">-->
<!--                                <svg width="15" height="15" fill="#fff">-->
<!--                                    <use href="#icon-twitter"></use>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="list-inline-item">-->
<!--                            <a href="https://www.linkedin.com/" target="_blank" class="bg-primary p-1 rounded-2 lh-sm">-->
<!--                                <svg width="15" height="15" fill="#fff">-->
<!--                                    <use href="#icon-linkedin"></use>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="list-inline-item">-->
<!--                            <a href="https://www.instagram.com/securemedzus/" target="_blank"-->
<!--                               class="bg-primary p-1 rounded-2 lh-sm">-->
<!--                                <svg width="15" height="15" fill="#fff">-->
<!--                                    <use href="#icon-instagram"></use>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="payment-links col-sm-6 py-2 text-sm-end text-center">-->
<!--					--><?php //$paymentUrl = get_template_directory_uri() . '/assets/build/src/img/payment.webp'; ?>
<!--                    <img src="--><?php //echo esc_url( $paymentUrl ); ?><!--" height="35" width="240" alt="payment logo"/>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="footer-copyright bg-primary text-center text-white text-opacity-75 py-2">
        <div class="container">
            <div class="row">
                <?php
                $domain = get_option('siteurl'); //or home
                $domain = str_replace('https://www.', '', $domain);
                ?>
                <div class="col-12 fs-12">Copyright © <?php echo date( 'Y' ); ?> <?php echo ucfirst($domain); ?> All Rights Reserved.</div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php
wp_footer();
get_template_part( 'template-parts/content', 'svgs' );
?>
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasAM" aria-labelledby="offcanvasAMLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasAMLabel">All Categories</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
		<?php
		echo asgard_canvas_menu();
		?>

    </div>
</div>
</body>
</html>
