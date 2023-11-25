<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s Customer username */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $user_login ) ); ?></p>
<?php /* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */ ?>
<p><?php printf( __( 'Thanks for creating an account on %1$s. Your username is %2$s. You can access your account area to view orders, change your password, and more at: %3$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>', make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p><?php // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>
	<?php /* translators: %s Auto generated password */ ?>
	<p><?php printf( esc_html__( 'Your password has been automatically generated: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>
<?php endif; ?>

<p><?php esc_html_e( 'We look forward to seeing you soon.', 'woocommerce' ); ?></p>
<p>
Warm Regards,<br/>
Team ArrowMeds
</p>
<div >
									<h6 style="text-align: center; font-size: 16px; margin-top: 20px; margin-bottom: 20px;">
<?php _e( 'Download Our Apps', 'woocommerce' ); // phpcs:ignore WordPress.XSS.EscapeOutput ?>
</h6>
								</div>
<div id="email_app_button" style="text-align: center; display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
								<div class="android_icon">
									<a href="https://play.google.com/store/apps/details?id=actizameds.arrow.meds.arrowmeds" target="_blank">
										<img src="https://www.arrowmeds.com/wp-content/uploads/2022/07/d11_playstore.webp" alt="Android App" width="120" height="60">
									</a>
								</div>
								<div class="iso_icon">
									<a href="#">
										<img src="https://www.arrowmeds.com/wp-content/uploads/2022/07/d11_appstore.webp" alt="ISO App" width="120" height="60">
									</a>
								</div>
							</div>

<?php
do_action( 'woocommerce_email_footer', $email );
