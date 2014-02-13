<?php
/**
 * Theme options page and setup.
 *
 * @package Craftory Framework
 */

add_action('admin_init', 'register_craftory_options' );
function register_craftory_options(){
	register_setting( 'craftory', 'craftory', 'craftory_validate_options' );
}

add_action('admin_menu', 'craftory_add_pages');
function craftory_add_pages() {
    // Add a new submenu under Appearance
	$theme_page = add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'craftory', 'craftory_options');
	add_action("admin_head-$theme_page", 'craftory_css');
}

function craftory_css() { ?>
<style type="text/css">
	.layout label { display: block; float: left; margin-right: 2em; min-width: 190px; }
	.layout label input[type="radio"] { float: left; margin-right: 6px; }
	.layout label img { display: block; clear: none; }
</style>
<?php 
}

function craftory_validate_options($input) {
	$input['page_list_filters'] = (int)$input['page_list_filters'];

	if ( !in_array( $input['layout'], array( 'left', 'right', 'none') ) )
		$input['layout'] = 'left';
	
	if (!isset($input['shortlink']))
		$input['shortlink'] = '';
	if (!isset($input['shortlink_url']))
		$input['shortlink_url'] = $options['shortlink_url'];
	
	// leave this alone
	// $input['google_meta_key'];
		
	return apply_filters('craftory_theme_options_validation', $input);
}

// Options page
function craftory_options() { ?>	
    <div class="wrap">
	<form method="post" id="craftory_form" action="options.php">
		<?php settings_fields('craftory');
		$options = get_option('craftory'); ?>

    <h2><?php _e( 'Craftory Theme Options', 'craftory'); ?></h2>
    
	<?php
	if (isset($_GET['settings-updated'])) {
	?>
		<div class="updated"><p><?php _e('Settings updated.'); ?></p></div>
	<?php } ?>
	
	<table class="form-table ui-tabs-panel">
		<tr>
	    <th scope="row"><?php _e("Comment defaults", 'craftory'); ?></th>
		    <td>
			    <ul id="craftory_comment_defaults">
			    <?php
			    $content_types = get_post_types('', 'objects');
			    $ignored = array('revision', 'nav_menu_item', 'deprecated_log');
				//var_dump($content_types);
			    foreach ($content_types as $content_type) {
			    	if (!in_array($content_type->name, $ignored)) { ?>
			    		<li> <?php echo $content_type->labels->name; ?>
			    		<label>
			    		<input type="radio" name="craftory[comments][<?php echo $content_type->name ?>]" value="1" 
					<?php checked('1', $options['comments'][$content_type->name]); ?> />
			    		<?php _e('On'); ?></label>
			
						<label>
			    		<input type="radio" name="craftory[comments][<?php echo $content_type->name ?>]" value="0" 
					<?php checked('0', $options['comments'][$content_type->name]); ?> />
			    		<?php _e('Off'); ?></label>
			    		</li>
			    	<?php }
			    }
			    ?>
			    </ul>
		    </td>
	    </tr>
	
	
		<tr>
	    <th scope="row"><?php _e("Child page lists", 'craftory'); ?></th>
		    <td>
			    <label>
				<input type="checkbox" name="craftory[page_list_filters]" value="1" 
		<?php checked('1', $options['page_list_filters']); ?> />
    		<?php _e('List child pages when content is empty.'); ?></label>
			<p class="fineprint"><?php _e('Affects all hierarchical post types. 
			You may also use the [subpages] shortcode wherever you would like to list child pages.'); ?></p>
		    </td>
	    </tr>
	
		<tr class="layout">
			<th scope="row"><?php _e('Layout' ); ?></th>
			<td>
				<label>
					<input name="craftory[layout]" type="radio" value="left" <?php checked($options['layout'], 'left'); ?>/>
					<img src="<?php bloginfo('template_url'); ?>/images/layout-left.png" class="layout" />
					<?php _e('Main Content on the Left'); ?>
				</label>
				
				<label>
					<input name="craftory[layout]" type="radio" value="right" <?php checked($options['layout'], 'right'); ?> />
					<img src="<?php bloginfo('template_url'); ?>/images/layout-right.png" class="layout" />
					<?php _e('Main Content on the Right'); ?>
				</label>	
				
				<label>
					<input name="craftory[layout]" type="radio" value="none" <?php checked($options['layout'], 'none'); ?> />
					<img src="<?php bloginfo('template_url'); ?>/images/one-column.png" class="layout" />
					<?php _e('No Sidebars'); ?>
				</label>	
			</td>
		</tr>

		<tr>
			<th scope="row"><?php _e('Short Links' ); ?></th>
			<td colspan="3">
			<p>	<label>
					<input name="craftory[shortlink]" type="checkbox" value="1" <?php checked($options['shortlink'], 1); ?>/>
					<?php _e('Display a short URL on all posts and pages'); ?>
				</label></p>
			<?php
			if (function_exists('dm_domains_admin')) : // Domain Mapping is activated
				global $wpdb, $blog_id;
				$wpdb->dmtable = $wpdb->base_prefix . 'domain_mapping';
				$rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->dmtable} WHERE blog_id = %d", $blog_id ) );
			?>
			<p><?php _e('Use domain:'); ?><br />
			<?php foreach ($rows as $domain) : ?>
			<label>
				<input name="craftory[shortlink_url]" type="radio" value="<?php echo $domain->domain; ?>" <?php checked($options['shortlink_url'], $domain->domain); ?>/>
				<?php echo $domain->domain; ?>
			</label> <br />
			<?php endforeach; ?>
			<span class="description"><?php
			_e("The shortest available domain is usually best." );
			?></span>
			</p>
			<?php endif; ?>
			</td>
		</tr>			
		<tr>
			<th scope="row"><?php _e('Google Verification' ); ?></th>
			<td colspan="3">
			<input type="text" size="60" id="google_meta_key" name="craftory[google_meta_key]" value="<?php esc_attr_e($options['google_meta_key']); ?>" /><br />
			<span class="description"><?php
			_e('Enter the verification key for the Google meta tag.' );
			?></span>
			</td>
		</tr>
	</table>
    
	<p class="submit">
	<input type="submit" name="submit" class="button-primary" value="<?php _e('Update Options', 'craftory'); ?>" />
	</p>
	</form>
	</div>
<?php 
} // end function craftory_options()