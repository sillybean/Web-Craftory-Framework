<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Craftory Framework
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php do_action( 'before_footer' ); ?>
		<?php craftory_menu( 'above-footer', 'site-info' ); ?>
		
		<div class="site-info" id="site-info">
			<?php do_action( 'craftory_credits' ); ?>
			<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			
			<p class="copyright"><?php echo apply_filters( 'craftory_copyright', '&copy; '.date(' Y ').get_bloginfo('name') ); ?></p>
			<div class="contact"><?php echo wpautop( get_theme_mod( 'craftory_footer_text', '' ) ); ?></div>
			
		</div><!-- .site-info -->
		
		<?php craftory_menu( 'below-footer', '' ); ?>
		<?php do_action( 'after_footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>