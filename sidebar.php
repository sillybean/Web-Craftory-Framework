<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Craftory Framework
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php 
		if ( ! dynamic_sidebar( 'sidebar' ) && current_user_can( 'edit_theme_options' ) ) : 
			printf( __( 'This is the Primary Sidebar Widget Area. You can add content to this area by visiting your 
			  <a href="%s">Widgets Panel</a> and adding new widgets to this area.', 'craftory' ), admin_url( 'widgets.php' ) );
		endif; // end sidebar widget area ?>
		<?php do_action( 'after_sidebar' ); ?>
	</div><!-- #secondary -->
