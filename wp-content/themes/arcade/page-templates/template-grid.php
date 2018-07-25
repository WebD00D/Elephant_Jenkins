<?php
/**
 * Template Name: Grid
 *
 * Description: A page template that will display "all" posts in a grid layout
 *
 * @since 1.0.0
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" class="col-md-12">
				<?php
				while ( have_posts() ) : the_post();
					if ( '' != $post->post_content ) { ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2 class="entry-title">
								<?php the_title(); ?>
							</h2>

						    <div class="entry-content description clearfix">
							    <?php the_content( __( 'Read more', 'arcade' ) ); ?>
						    </div><!-- .entry-content -->

						    <?php get_template_part( 'content', 'footer' ); ?>
						</article><!-- #post-<?php the_ID(); ?> -->
					<?php
					}

				endwhile;

				bavotasan_grid_template();
				?>
			</div>
		</div>
	</div><!-- #primary.c8 -->

<?php get_footer(); ?>