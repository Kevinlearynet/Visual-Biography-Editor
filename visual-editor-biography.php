<?php
/*
Plugin Name: Visual Biography Editor
Version: 1.4
Plugin URI: http://www.kevinleary.net/
Description: Replace the "Biographical Info" profile field with a TinyMCE visual, rich text editor. Requires WordPress 3.3 or higher.
Author: Kevin Leary
Author URI: http://www.kevinleary.net
License: GPL2

Copyright 2012  Kevin Leary  (email : info@kevinleary.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class KLVisualBiographyEditor {
	private $name = 'Visual Biography Editor';
	
	/**
	 * Setup WP hooks
	 */
	public function __construct() {
		// Add a visual editor if the current user is an Author role or above and WordPress is v3.3+
		if ( function_exists('wp_editor') ) {

			// Add the WP_Editor
			add_action( 'show_user_profile', array($this, 'visual_editor') );
			add_action( 'edit_user_profile', array($this, 'visual_editor') );
			
			// Don't sanitize the data for display in a textarea
			add_action( 'admin_init', array($this, 'save_filters') );

			// Load required JS
			add_action( 'admin_enqueue_scripts', array($this, 'load_javascript'), 10, 1 );
			
			// Add content filters to the output of the description
			add_filter( 'get_the_author_description', 'wptexturize' );
			add_filter( 'get_the_author_description', 'convert_chars' );
			add_filter( 'get_the_author_description', 'wpautop' );
		}
		// Display a message if the requires aren't met
		else {
			add_action( 'admin_notices', array($this, 'update_notice') );
		}
	}
	
	/**
	 * Friendly notice if WP is out of date
	 */
	public function update_notice() {
	
		// Notification is for administrators only
		if ( !current_user_can('administrator') )
			return;
		
		?>
		<div class="updated">
			<p>The <strong><?php echo $this->name; ?></strong> plugin requires WordPress 3.3 or higher. Update WordPress or <a href="<?php echo get_admin_url(null, 'plugins.php'); ?>">de-activate the plugin</a>.</p>
		</div>
		<?php
	}
	
	
	/**
	 *	Create Visual Editor
	 *
	 *	Add TinyMCE editor to replace the "Biographical Info" field in a user profile
	 *
	 * @uses wp_editor() http://codex.wordpress.org/Function_Reference/wp_editor
	 * @param $user An object with details about the current logged in user
	 */
	public function visual_editor( $user ) {
		
		// Contributor level user or higher required
		if ( !current_user_can('edit_posts') )
			return;
		?>
		<table class="form-table">
			<tr>
				<th><label for="description"><?php _e('Biographical Info'); ?></label></th>
				<td>
					<?php 
					$description = get_user_meta( $user->ID, 'description', true);
					wp_editor( $description, 'description' ); 
					?>
					<p class="description"><?php _e('Share a little biographical information to fill out your profile. This may be shown publicly.'); ?></p>
				</td>
			</tr>
		</table>
		<?php
	}
	
	/**
	 * Admin JS customizations to the footer
	 *
	 * @uses wp_enqueue_script() http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 * @uses plugin_dir_path() http://codex.wordpress.org/Function_Reference/plugin_dir_path
	 */
	public function load_javascript( $hook ) {
		
		// Contributor level user or higher required
		if ( !current_user_can('edit_posts') )
			return;
		
		// Load JavaScript only on the profile and user edit pages 
		if ( $hook == 'profile.php' || $hook == 'user-edit.php' ) {
			wp_enqueue_script(
				'visual-editor-biography', 
				plugins_url('js/visual-editor-biography.js', __FILE__), 
				array('jquery'), 
				false, 
				true
			);
		}
	}
	
	/**
	 * Remove textarea filters from description field
	 */
	public function save_filters() {
		
		// Contributor level user or higher required
		if ( !current_user_can('edit_posts') )
			return;
			
		remove_all_filters('pre_user_description');
	}
}

$kpl_visual_editor_biography = new KLVisualBiographyEditor();