<?php
/**
 * Link Shield
 *
 * @package Link Shield
 * @version 0.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_multisite() ) {
	add_action( 'network_admin_menu', 'link_shield_network_menu' );
} else {
	add_action( 'admin_menu', 'link_shield_menu' );
}

add_action( 'admin_init', 'link_shield_register_settings' );

/**
 * Register Link Shield settings.
 */
function link_shield_register_settings() {
	// Register settings using the settings API, with proper sanitization.
	register_setting( 'link_shield_options_group', 'link_shield_text', 'sanitize_text_field' );
	register_setting( 'link_shield_options_group', 'link_shield_shordcode', 'sanitize_text_field' );
	register_setting( 'link_shield_options_group', 'link_shield_blog_show_link_text', 'absint' );
	register_setting( 'link_shield_options_group', 'link_shield_blog_comments_show_link_text', 'absint' );
	register_setting( 'link_shield_options_group', 'link_shield_bbpress_show_link_text', 'absint' );
	register_setting( 'link_shield_options_group', 'link_shield_hidden_text_message', 'sanitize_text_field' );
	register_setting( 'link_shield_options_group', 'link_shield_add_nofollow_to_comments_links', 'absint' );
}

/**
 * Add Link Shield options page to the admin menu.
 */
function link_shield_menu() {
	add_options_page( 'Link Shield Options', 'Link Shield', 'manage_options', 'link_shield_menu_options', 'link_shield_menu_options' );
}

/**
 * Add Link Shield submenu to the network admin menu.
 */
function link_shield_network_menu() {
	add_submenu_page( 'settings.php', 'Link Shield Options', 'Link Shield', 'manage_options', 'link_shield_menu_options', 'link_shield_menu_options' );
}

/**
 * Display the Link Shield options page.
 */
function link_shield_menu_options() {
	// Check that the user has the required capability.
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'link-shield' ) );
	}

	?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Link Shield Settings', 'link-shield' ); ?></h2>
		<form method="post" action="options.php">
			<?php
				// Security fields for the settings page.
				settings_fields( 'link_shield_options_group' );
				do_settings_sections( 'link_shield_options_group' );
			?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Text for hidden links', 'link-shield' ); ?></th>
					<td><input type="text" name="link_shield_text" class="regular-text" value="<?php echo esc_attr( get_option( 'link_shield_text' ) ); ?>"></td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Hide link text on Post?', 'link-shield' ); ?></th>
					<td>
						<select name="link_shield_blog_show_link_text">
							<option value="0" <?php selected( get_option( 'link_shield_blog_show_link_text' ), 0 ); ?>><?php esc_html_e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
							<option value="1" <?php selected( get_option( 'link_shield_blog_show_link_text' ), 1 ); ?>><?php esc_html_e( 'Show link text', 'link-shield' ); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Hide link text on Comments?', 'link-shield' ); ?></th>
					<td>
						<select name="link_shield_blog_comments_show_link_text">
							<option value="0" <?php selected( get_option( 'link_shield_blog_comments_show_link_text' ), 0 ); ?>><?php esc_html_e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
							<option value="1" <?php selected( get_option( 'link_shield_blog_comments_show_link_text' ), 1 ); ?>><?php esc_html_e( 'Show link text', 'link-shield' ); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Hide link text on bbPress?', 'link-shield' ); ?></th>
					<td>
						<select name="link_shield_bbpress_show_link_text">
							<option value="0" <?php selected( get_option( 'link_shield_bbpress_show_link_text' ), 0 ); ?>><?php esc_html_e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
							<option value="1" <?php selected( get_option( 'link_shield_bbpress_show_link_text' ), 1 ); ?>><?php esc_html_e( 'Show link text', 'link-shield' ); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Shordcode for hide text/links', 'link-shield' ); ?></th>
					<td>
						<input type="text" name="link_shield_shordcode" class="regular-text" value="<?php echo esc_attr( get_option( 'link_shield_shordcode' ) ); ?>">
						<code><?php echo esc_html( get_option( 'link_shield_shordcode' ) ? '[' . get_option( 'link_shield_shordcode' ) . ']text[/' . get_option( 'link_shield_shordcode' ) . ']' : '[linkshield_hide]text[/linkshield_hide]' ); ?></code>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Text to show by the shortcode to users', 'link-shield' ); ?></th>
					<td>
						<input type="text" name="link_shield_hidden_text_message" class="regular-text" value="<?php echo esc_attr( get_option( 'link_shield_hidden_text_message' ) ); ?>">
						<p class="description"><?php esc_html_e( 'Add the text to use when you hide text, links, text blocks, videos, etc. with the shortcode', 'link-shield' ); ?></p>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php esc_html_e( "Add rel='nofollow' to comments reply link", 'link-shield' ); ?></th>
					<td>
						<label>
							<input name="link_shield_add_nofollow_to_comments_links" type="checkbox" value="1" <?php checked( get_option( 'link_shield_add_nofollow_to_comments_links' ), 1 ); ?>>
							<?php esc_html_e( 'The reply link will include rel="nofollow" to avoid indexing duplicate content by search engines.', 'link-shield' ); ?>
						</label>
					</td>
				</tr>
			</table>

			<?php submit_button( esc_html__( 'Save Changes', 'link-shield' ) ); ?>
		</form>
	</div>
	<?php
}

/**
 * Shortcode to hide links or content for non-logged-in users.
 *
 * @param array       $atts Shortcode attributes.
 * @param string|null $content Content to hide.
 * @return string Content for logged-in users or a message for non-logged-in users.
 */
function link_shield_hide_link_shortcode( $atts, $content = null ) {
	if ( is_user_logged_in() ) {
		return $content;
	} else {
		$hidden_text_message = get_option( 'link_shield_hidden_text_message', __( 'You need to log in to see this content', 'link-shield' ) );
		return esc_html( $hidden_text_message );
	}
}

add_shortcode( 'linkshield_hide', 'link_shield_hide_link_shortcode' );

if ( get_option( 'link_shield_shordcode' ) ) {
	add_shortcode( get_option( 'link_shield_shordcode' ), 'link_shield_hide_link_shortcode' );
}

/**
 * Add rel="nofollow" to comment reply link if selected.
 *
 * @param string $link The comment reply link.
 * @return string The comment reply link with rel="nofollow".
 */
function link_shield_add_nofollow_to_comments_links( $link ) {
	if ( get_option( 'link_shield_add_nofollow_to_comments_links' ) ) {
		$link = str_replace( '")\'>', '")\' rel="nofollow">', $link );
	}
	return $link;
}

if ( get_option( 'link_shield_add_nofollow_to_comments_links' ) === '1' ) {
	add_filter( 'comment_reply_link', 'link_shield_add_nofollow_to_comments_links' );
}
