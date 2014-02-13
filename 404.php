<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Craftory Framework
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'I&rsquo;m sorry. I couldn&rsquo;t find the page you requested.', 'craftory' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
						<?php get_template_part( 'searchform' ); ?>

						<?php 
						global $wp_query;
						$wp_query->query_vars['is_search'] = true;
						$s = str_replace("-"," ",$wp_query->query_vars['name']);
						$loop = new WP_Query('post_type=any&s='.$s);
						?>
						<?php if ($loop->have_posts()) : ?>
							<p><?php _e('I&rsquo;m searching for the name of the page you tried to visit... was it one of these?', 'craftory' ); ?></p>
							<ol>
							<?php while ($loop->have_posts()) : $loop->the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php the_excerpt(); ?>
								</li>
							<?php endwhile; ?>
							</ol>
					   	<?php endif; ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>