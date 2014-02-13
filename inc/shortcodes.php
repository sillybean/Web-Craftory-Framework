<?php
/**
 * Registers shortcodes
 *
 * @package Craftory Framework
 */

/**
 * Append child page lists to pages with no content.
 */
function craftory_child_pages_shortcode( $atts, $content = null ) {
	if ( isset( $atts['depth'] ) )
		$depth = (int)$atts['depth'];
	elseif ( isset( $atts[0] ) )
		$depth = (int)$atts[0];
	
	$args = array(
		'echo'		=> 0,
		'depth'		=> $depth,
		'title_li'  => '',
		'child_of'  => get_the_ID(),
		'post_type' => get_post_type(),
	);
	
	return '<ul class="childpages">'.wp_list_pages( $args ).'</ul>';
}
add_shortcode('subpages', 'craftory_child_pages_shortcode');

/**
 * Genesis Content Columns 1/2 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/2
 */

add_shortcode( 'one_half', 'gsc_one_half_shortcode' );
add_shortcode( 'two_fourths', 'gsc_one_half_shortcode' );
add_shortcode( 'three_sixths', 'gsc_one_half_shortcode' );

function gsc_one_half_shortcode( $atts , $content ) {

	//extract short code attr
	extract( shortcode_atts( array(
		'class' => '',
	) , $atts ) );
	
	$return_html = '<div class="one-half ' . $class . '">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/2 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/2 (first column)
 */

add_shortcode( 'one_half_first', 'gsc_one_half_first_shortcode' );
add_shortcode( 'two_fourths_first', 'gsc_one_half_first_shortcode' );
add_shortcode( 'three_sixths_first', 'gsc_one_half_first_shortcode' );

function gsc_one_half_first_shortcode( $atts , $content ) {

	//extract short code attr
	extract( shortcode_atts( array(
		'class' => '',
	) , $atts ) );
	
	$return_html = '<div class="one-half first '.$class.'">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/2 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/2 (last column)
 */
add_shortcode( 'one_half_last', 'gsc_one_half_last_shortcode' );
add_shortcode( 'two_fourths_last', 'gsc_one_half_last_shortcode' );
add_shortcode( 'three_sixths_last', 'gsc_one_half_last_shortcode' );

function gsc_one_half_last_shortcode( $atts , $content ) {

	//extract short code attr
	extract( shortcode_atts( array(
		'class' => '',
	) , $atts ) );
	
	$return_html = '<div class="one-half last '.$class.'">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/3 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/3
 */

add_shortcode( 'one_third', 'gsc_one_third_shortcode' );
add_shortcode( 'two_sixths', 'gsc_one_third_shortcode' );

function gsc_one_third_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-third">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/3 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/3 (first)
 */

add_shortcode( 'one_third_first', 'gsc_one_third_first_shortcode' );
add_shortcode( 'two_sixths_first', 'gsc_one_third_first_shortcode' );

function gsc_one_third_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-third first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/3 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/3 (last)
 */

add_shortcode( 'one_third_last', 'gsc_one_third_last_shortcode' );
add_shortcode( 'two_sixths_last', 'gsc_one_third_last_shortcode' );

function gsc_one_third_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-third last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/3 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/3
 */

add_shortcode( 'two_thirds', 'gsc_two_thirds_shortcode' );
add_shortcode( 'four_sixths', 'gsc_two_thirds_shortcode' );

function gsc_two_thirds_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-thirds">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/3 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/3 (first)
 */

add_shortcode( 'two_thirds_first', 'gsc_two_thirds_first_shortcode' );
add_shortcode( 'four_sixths_first', 'gsc_two_thirds_first_shortcode' );

function gsc_two_thirds_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-thirds first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/3 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/3 (last)
 */

add_shortcode( 'two_thirds_last', 'gsc_two_thirds_last_shortcode' );
add_shortcode( 'four_sixths_last', 'gsc_two_thirds_last_shortcode' );

function gsc_two_thirds_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-thirds last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/4 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4
 */

add_shortcode( 'one_fourth', 'gsc_one_fourth_shortcode' );

function gsc_one_fourth_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fourth">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/4 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4 (first)
 */

add_shortcode( 'one_fourth_first', 'gsc_one_fourth_first_shortcode' );

function gsc_one_fourth_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fourth first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/4 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4 (last)
 */

add_shortcode( 'one_fourth_last', 'gsc_one_fourth_last_shortcode' );

function gsc_one_fourth_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fourth last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/4 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4
 */

add_shortcode( 'three_fourths', 'gsc_three_fourth_shortcode' );

function gsc_three_fourth_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fourths">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/4 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4 (first)
 */

add_shortcode( 'three_fourths_first', 'gsc_three_fourths_first_shortcode' );

function gsc_three_fourths_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fourths first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/4 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/4 (last)
 */

add_shortcode( 'three_fourths_last', 'gsc_three_fourths_last_shortcode' );

function gsc_three_fourths_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fourths last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/5 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/5
 */

add_shortcode( 'one_fifth', 'gsc_one_fifth_shortcode' );

function gsc_one_fifth_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fifth">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/5 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/5 (first)
 */

add_shortcode( 'one_fifth_first', 'gsc_one_fifth_first_shortcode' );

function gsc_one_fifth_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fifth first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/5 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/5 (last)
 */

add_shortcode( 'one_fifth_last', 'gsc_one_fifth_last_shortcode' );

function gsc_one_fifth_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-fifth last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/5 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/5
 */

add_shortcode( 'two_fifths', 'gsc_two_fifths_shortcode' );

function gsc_two_fifths_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-fifths">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/5 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/5 (first)
 */

add_shortcode( 'two_fifths_first', 'gsc_two_fifths_first_shortcode' );

function gsc_two_fifths_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-fifths first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 2/5 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 2/5 (last)
 */

add_shortcode( 'two_fifths_last', 'gsc_two_fifths_last_shortcode' );

function gsc_two_fifths_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="two-fifths last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/5 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 3/5
 */

add_shortcode( 'three_fifths', 'gsc_three_fifths_shortcode' );

function gsc_three_fifths_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fifths">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/5 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 3/5 (first)
 */

add_shortcode( 'three_fifths_first', 'gsc_three_fifths_first_shortcode' );

function gsc_three_fifths_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fifths first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 3/5 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 3/5 (last)
 */

add_shortcode( 'three_fifths_last', 'gsc_three_fifths_last_shortcode' );

function gsc_three_fifths_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="three-fifths last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 4/5 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 4/5
 */

add_shortcode( 'four_fifths', 'gsc_four_fifths_shortcode' );

function gsc_four_fifths_shortcode( $atts , $content ) {
	
	$return_html = '<div class="four-fifths">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 4/5 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 4/5 (first)
 */

add_shortcode( 'four_fifths_first', 'gsc_four_fifths_first_shortcode' );

function gsc_four_fifths_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="four-fifths first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 4/5 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 4/5 (last)
 */

add_shortcode( 'four_fifths_last', 'gsc_four_fifths_last_shortcode' );

function gsc_four_fifths_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="four-fifths last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/6 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/6
 */

add_shortcode( 'one_sixth', 'gsc_one_sixth_shortcode' );

function gsc_one_sixth_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-sixth">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/6 first Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/6 first
 */

add_shortcode( 'one_sixth_first', 'gsc_one_sixth_first_shortcode' );

function gsc_one_sixth_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-sixth first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 1/6 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 1/6 last
 */

add_shortcode( 'one_sixth_last', 'gsc_one_sixth_last_shortcode' );

function gsc_one_sixth_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="one-sixth last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 5/6 Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 5/6
 */

add_shortcode( 'five_sixths', 'gsc_five_sixths_shortcode' );

function gsc_five_sixths_shortcode( $atts , $content ) {
	
	$return_html = '<div class="five-sixths">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 5/6 First Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 5/6 (first)
 */

add_shortcode( 'five_sixths_first', 'gsc_five_sixths_first_shortcode' );

function gsc_five_sixths_first_shortcode( $atts , $content ) {
	
	$return_html = '<div class="five-sixths first">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}

/**
 * Genesis Content Columns 5/6 Last Shortcode
 *
 * @param	content
 * @return	string	HTML Genesis Content Columns 5/6 (last)
 */

add_shortcode( 'five_sixths_last', 'gsc_five_sixths_last_shortcode' );

function gsc_five_sixths_last_shortcode( $atts , $content ) {
	
	$return_html = '<div class="five-sixths last">' . do_shortcode ( $content ) . '</div>';
	
	return $return_html;
}