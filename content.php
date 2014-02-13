<?php
/**
 * @package Craftory Framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<div class="entry-meta">
			<?php craftory_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'craftory' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'craftory' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

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

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'craftory' ), __( '1 Comment', 'craftory' ), __( '% Comments', 'craftory' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'craftory' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
