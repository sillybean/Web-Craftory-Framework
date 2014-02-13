<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Craftory Framework
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="image-meta">
				<?php printf( __( 'View: %s', 'craftory' ), craftory_image_size_links() ); ?>
			</div>
				
			<p class="attachment">
				<?php echo get_the_attachment_link( get_the_ID() , true, array(450, 800) ); ?>
			</p>
			
			<?php the_content(); ?>

			<?php craftory_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>