<?php
/**
 * @package Craftory Framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php craftory_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'craftory' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			// get all public taxonomies for this post type
			$taxes = get_taxonomies( array( 'public' => true, 'object_type' => get_post_type() ), 'objects' );

			if (!empty($taxes)) :
				$termlist = '';
				foreach ($taxes as $tax) :
					$termlist .= get_the_term_list( get_the_ID(), $tax->name, '<span class="terms"><strong>'.$tax->label.':</strong> ', ', ', '</span>' );
				endforeach;
			endif;
			
			echo apply_filters( 'craftory_terms', $termlist );
		?>

		<?php edit_post_link( __( 'Edit', 'craftory' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
