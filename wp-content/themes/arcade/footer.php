<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	</main><!-- main -->

	<footer id="footer" role="contentinfo">
		<div id="footer-content" class="container">
			<div class="row">
				<?php dynamic_sidebar( 'extended-footer' ); ?>
			</div><!-- .row -->

			<div class="row">
				<div class="copyright col-lg-12">
					<?php $class = ( is_active_sidebar( 'extended-footer' ) ) ? ' active' : ''; ?>
					<span class="line<?php echo $class; ?>"></span>
					<?php dynamic_sidebar( 'footer-notice' ); ?>
					<span class="credit-link pull-right"><i class="fa fa-leaf"></i><?php printf( __( 'The %s Theme by %s.', 'arcade' ), BAVOTASAN_THEME_NAME, '<a href="https://themes.bavotasan.com/themes/arcade-wordpress-theme/">bavotasan.com</a>' ); ?></span>
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- #footer-content.container -->
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>