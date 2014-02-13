<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Craftory Framework
 */

get_header(); 
$search = esc_attr( apply_filters( 'the_search_query', get_search_query( false ) ) ); 
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :
			$page = get_query_var('paged');
			if (!isset($page) || empty($page))
				$start = 1;
			else
				$start = ($page - 1) * get_option('posts_per_page') + 1;
			?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'craftory' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<ol class="search-results" start="<?php echo $start; ?>">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>
			</ol>
			<?php craftory_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
