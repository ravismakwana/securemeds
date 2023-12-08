<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
    <div class="container">
		<?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <h1 class="page-title fs-2 py-md-3 py-2"><?php single_post_title(); ?></h1>
            </header>
		<?php else : ?>
            <header class="page-header">
                <h2 class="page-title"><?php _e('Posts', 'twentyseventeen'); ?></h2>
            </header>
		<?php endif; ?>
        <div class="td_block_wrap td_block_big_grid_7 td_uid_6_5ccbe6acf0f3c_rand td-grid-style-1 td-hover-1 td-big-grids td-pb-border-top td_block_template_1 col-xs-12">

					<?php
					// the query
					global $wpdb;
					$recent_posts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type='post' order by post_date DESC LIMIT 7", ARRAY_A);
					$cnt = 0;
					if ($recent_posts) :

						foreach ($recent_posts as $post_data) {
							if ($cnt < 3) {
								$class_module = 'td_module_mx12';
								$thumbnail_size = 'blog_thumbnail';
								$grid_class = 'large_grid';
							} else {
								$class_module = 'td_module_mx6';
								$thumbnail_size = 'blog_thumbnail_small';
								$grid_class = 'small_grid';
							}
							// Get a list of categories and extract their names
							$post_categories = get_the_terms($post_data['ID'], 'category');
							if (!empty($post_categories) && !is_wp_error($post_categories)) {
								$categories = wp_list_pluck($post_categories, 'name');
							}
							// Get the ID of a given category
							$category_id = get_cat_ID($categories[0]);
							?>
                            <div class="<?php echo $class_module; ?> td-animation-stack td-big-grid-post-<?php echo $cnt++; ?> td-big-grid-post td-small-thumb">
                                <div class="td-module-thumb">
                                    <a href="<?php echo get_permalink($post_data['ID']) ?>" rel="bookmark" class="td-image-wrap text-decoration-none" title="<?php echo $post_data['post_title']; ?>"><?php echo get_the_post_thumbnail($post_data['ID'], $thumbnail_size, array('class' => 'entry-thumb td-animation-stack-type0-2')); ?></a>
                                </div>
                                <div class="td-meta-info-container">
                                    <div class="td-meta-align">
                                        <div class="td-big-grid-meta">
                                            <a href="<?php echo get_category_link($category_id); ?>" class="td-post-category text-decoration-none"><?php echo $categories[0]; ?></a>
                                            <h3 class="entry-title td-module-title <?php echo $grid_class; ?>">
                                                <a href="<?php echo get_permalink($post_data['ID']); ?>" rel="bookmark" title="<?php echo $post_data['post_title']; ?>" class="text-decoration-none"><?php echo $post_data['post_title']; ?></a>
                                            </h3>
                                        </div>

                                        <div class="td-module-meta-info">
										<span class="td-post-date">
											
											<time class="entry-date td-module-date" datetime="<?php echo get_the_time('F j, Y'); ?>"><?php
												$new_date = date("F j, Y", strtotime($post_data['post_modified']));
												$publish_date = date("F j, Y", strtotime($post_data['post_date']));
												$author_id = $post_data['post_author'];
												if(get_the_modified_time( 'U' ) > get_the_time( 'U' )) {
													$byline = sprintf(
													/* translators: %s: post author */
														__( 'Last updated by &nbsp;%1$s&nbsp;on %2$s', 'twentyseventeen' ),
														'<span class="author vcard">' . get_the_author_meta( 'display_name', $author_id ) . '</span>',  mysql2date( __( 'F j, Y' ), $publish_date )
													);
												}else {
													$byline = sprintf(
													/* translators: %s: post author */
														__( 'Last updated by &nbsp;%1$s&nbsp;on %2$s', 'twentyseventeen' ),
														'<span class="author vcard">' . get_the_author_meta( 'display_name', $author_id ) . '</span>',  mysql2date( __( 'F j, Y' ), $new_date )
													);
												}

												// Finally, let's write all of this to the page.
												echo '<span class="byline"> ' . $byline . '</span>';
												?></time>
										</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						}
						wp_reset_postdata();
						wp_reset_query();
						?>

					<?php else : ?>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 main-blog-content other-blogs">
                <div class="td-big-grid-wrapper row">
					<?php
					/**
					 * Always follow this rule when you need offset for posts
					 */
					$paged = max( 1, get_query_var( 'paged' ) );
					$per_page     = get_option('posts_per_page'); // posts per page
					$offset_start = 7;  // initial offset
					$offset       = $paged ? ( $paged - 1 ) * $per_page + $offset_start : $offset_start;
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => $per_page,
						'offset' => $offset,
						'order' => 'DESC',
						'post_status' => 'publish',
						'orderby' => 'date',
					);
					$cnt = 0;
					$the_query = new WP_Query($args);
					$thumbnail_size = 'blog_thumbnail_large';
					if ($the_query->have_posts()) :
						while ($the_query->have_posts()) : $the_query->the_post();
							// Get a list of categories and extract their names
							$post_categories = get_the_terms(get_the_ID(), 'category');
							if (!empty($post_categories) && !is_wp_error($post_categories)) {
								$categories = wp_list_pluck($post_categories, 'name');
							}
							// Get the ID of a given category
							$category_id = get_cat_ID($categories[0]);
							?>
                            <div class="td_module_2 td_module_wrap td-animation-stack col-xs-12 row">
                                <div class="td-module-image col-sm-5">
                                    <div class="td-module-thumb">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark" class="td-image-wrap text-decoration-none" title="<?php the_title(); ?>">
											<?php the_post_thumbnail($thumbnail_size, array('class' => 'entry-thumb td-animation-stack-type0-2')); ?>
                                        </a>
										<a href="<?php echo get_category_link($category_id); ?>" class="td-post-category text-decoration-none"><?php echo $categories[0]; ?></a>
                                    </div>
                                </div>
								<div class="col-sm-7">
									<h3 class="entry-title td-module-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" class="text-decoration-none"><?php the_title(); ?></a>
									</h3>

									<div class="td-module-meta-info">
									<span class="td-post-date"><time class="entry-date td-module-date" datetime="<?php echo get_the_time(DATE_W3C); ?>"><?php
											global $post;
											$byline = sprintf(
											/* translators: %s: post author */
												__( 'Last updated by &nbsp;%1$s&nbsp;on %2$s', 'twentyseventeen' ),
												'<span class="author vcard">' . get_the_author() . '</span>',  mysql2date( __( 'F j, Y' ), $post->post_modified )
											);
											// Finally, let's write all of this to the page.
											echo '<span class="byline"> ' . $byline . '</span>';
											?></time></span>
										<div class="td-module-comments d-none"><a href="<?php echo get_comments_link(get_the_ID()); ?>" class="text-decoration-none"><?php echo get_comments_number(get_the_ID()); ?></a></div>
									</div>
									<div class="td-excerpt">
										<?php the_excerpt(); ?>
									</div>
									<div class="read-more">
										<a href="<?php the_permalink(); ?>" class="text-decoration-none btn btn-success px-2 py-1 fs-6 mt-3">Continue Reading</a>
									</div>
								</div>
                            </div>

						<?php
						endwhile;

						the_posts_pagination(array(
							'mid_size' => 1,
							'type' => 'list',
							'prev_text' => '<span class="">' . __('Prev', 'twentyseventeen') . '</span>',
							'next_text' => '<span class="">' . __('Next', 'twentyseventeen') . '</span>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentyseventeen') . ' </span>',
						));
						?>
                        <!-- pagination here -->

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
                        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 blog-sidebar">
				<?php get_sidebar(); ?>
            </div>
        </div>


    </div><!-- .wrap -->

<?php
get_footer();