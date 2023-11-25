<?php
/**
 *  Single Blog Page
 *
 * @package Asgard
 */

get_header();
?>

    <div id="primary">
        <div id="main" class="mb-5">
			<?php
			if ( have_posts() ) {
			?>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 mt-3">
						<?php
						if ( is_home() && ( ! is_front_page() ) ) {
							?>
                            <header>
                                <h1 class="page-title mb-5"><?php single_post_title(); ?></h1>
                            </header>
							<?php
						}
						?>

						<?php

						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content' );
						endwhile;
						?>


						<?php
						} else {
							get_template_part( 'template-parts/content', 'none' );
						}
						?>
                    </div>
                    <div class="col-md-3">
						<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();