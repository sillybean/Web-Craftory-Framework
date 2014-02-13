<?php
/**
 * Filters for core tags
 *
 * @package Craftory Framework
 */

/**
 * Append child page lists to pages with no content.
 *
 * @param string $content Post content.
 * @return string
 */
function craftory_append_child_pages($content) {
	$options = get_option('craftory');
	if ( !$options['page_list_filters'] )
		return $content;

	$children = '';
	$type = get_post_type();
	if ( is_singular() && ( empty( $content ) ) && is_post_type_hierarchical( $type ) ) {
		$args = array(
			'echo'		=> 0,
			'title_li'  => '',
			'child_of'  => get_the_ID(),
			'post_type' => $type
		);
		$children = '<ul class="childpages">'.wp_list_pages( $args ).'</ul>';
	}
	return $content.$children;
}
add_filter('the_content', 'craftory_append_child_pages');

/**
 * Adjust default comment settings per post type based on theme options.
 *
 * @param string $post_content Post content.
 * @param object $post Post object.
 * @return string
 */
function craftory_comment_default( $post_content, $post ) {
	$options = get_option('craftory');
    if ( $post->post_type && $options['comments'][$post->post_type] == '0' ) {
    	$post->comment_status = 'closed';
		$post->ping_status = 'closed';
	}
	else {
		$post->comment_status = 'open';
		$post->ping_status = 'open';
	}
    return $post_content;
}
add_filter( 'default_content', 'craftory_comment_default', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function craftory_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'craftory_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function craftory_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() )
		$classes[] = 'group-blog';

	return $classes;
}
add_filter( 'body_class', 'craftory_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function craftory_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'craftory' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'craftory_wp_title', 10, 2 );
