<?php
/**
 * The Template for displaying all single posts.
 *
 * @since 1.0.0
 */
get_header(); 
?>
<?php if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                    } ?>
    <div class="container">
        <div class="row">
            <div id="primary" <?php bavotasan_primary_attr(); ?>>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail();
                    }
                    ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>

                    <div id="posts-pagination" class="clearfix">
                        <h3 class="sr-only"><?php _e( 'Post navigation', 'arcade' ); ?></h3>
                        <div class="previous pull-left"><?php previous_post_link( '%link', __( '&larr; %title', 'arcade' ) ); ?></div>
                        <div class="next pull-right"><?php next_post_link( '%link', __( '%title &rarr;', 'arcade' ) ); ?></div>
                    </div><!-- #posts-pagination -->

                    <?php comments_template( '', true ); ?>

                <?php endwhile; // end of the loop. ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php if ( is_active_sidebar( 'homeowners-side-bar' ) ) : ?>
	<?php dynamic_sidebar( 'homeowners-side-bar' ); ?>
<?php endif; ?>

<?php get_footer(); ?>