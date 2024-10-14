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

	// must check that the user has the required capability
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'link_shield_network_menu' ) );
	}

	// variables for the field and option names
	// $link_shield_text = 'link_shield_text';
	// $link_shield_text_field = 'link_shield_text';

	// Read in existing option value from database
	// $opt_val = get_site_option( $link_shield_text );
	if ( isset( $_POST['link_shield_text_field'] ) || isset( $_POST['link_shield_shordcode_field'] ) || isset( $_POST['link_shield_blog_show_link_text_field'] ) || isset( $_POST['link_shield_blog_comments_show_link_text_field'] ) || isset( $_POST['link_shield_buddypress_show_link_text_field'] ) || isset( $_POST['link_shield_bbpress_show_link_text_field'] ) || isset( $_POST['link_shield_hidden_text_message_field'] ) ) {
		// Read their posted value
		$opt_link_shield_text                         = @$_POST['link_shield_text_field'];
		$opt_link_shield_shordcode                    = @$_POST['link_shield_shordcode_field'];
		$opt_link_shield_blog_show_link_text          = @$_POST['link_shield_blog_show_link_text_field'];
		$opt_link_shield_blog_comments_show_link_text = @$_POST['link_shield_blog_comments_show_link_text_field'];
		$opt_link_shield_bbpress_show_link_text       = @$_POST['link_shield_bbpress_show_link_text_field'];
		$opt_link_shield_hidden_text_message          = @$_POST['link_shield_hidden_text_message_field'];

		// Save the posted value in the database
		update_site_option( 'link_shield_text', $opt_link_shield_text );
		update_site_option( 'link_shield_shordcode', $opt_link_shield_shordcode );
		update_site_option( 'link_shield_blog_show_link_text', $opt_link_shield_blog_show_link_text );
		update_site_option( 'link_shield_blog_comments_show_link_text', $opt_link_shield_blog_comments_show_link_text );
		update_site_option( 'link_shield_bbpress_show_link_text', $opt_link_shield_bbpress_show_link_text );
		update_site_option( 'link_shield_add_nofollow_to_comments_links', @$_POST['link_shield_add_nofollow_to_comments_links'] === '1' ? 1 : 0 );
		update_site_option( 'link_shield_hidden_text_message', $opt_link_shield_hidden_text_message );

		do_action( 'link_shield_save_options' );

		// Put an settings updated message on the screen
		?>
<div class="updated"><p><strong><?php _e( 'settings saved.', 'link-shield' ); ?></strong></p></div>
		<?php
	}
	?>


<div class="wrap">
	<h2><?php _e( 'Links Shield', 'link-shield' ); ?></h2>
<form name="form1" method="post" action="">
	<table class="form-table">
		<tr>
			<th scope="row"><label><?php _e( 'Text for hidden links:', 'link-shield' ); ?> </label></th>
			<td><input type="text" name="link_shield_text_field" class="regular-text" value="<?php echo get_site_option( 'link_shield_text' ); ?>"></td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e( 'Hide link text on Post?: ', 'link-shield' ); ?></label></th>
			<td><select name="link_shield_blog_show_link_text_field" id="link_shield_blog_show_link_text_field">
				<option value="0" 
				<?php
				if ( ( get_site_option( 'link_shield_blog_show_link_text' ) === 0 ) || ! get_site_option( 'link_shield_blog_show_link_text' ) ) {
					echo 'selected="selected"';}
				?>
				><?php _e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
				<option value="1" 
				<?php
				if ( get_site_option( 'link_shield_blog_show_link_text' ) === 1 ) {
					echo 'selected="selected"';}
				?>
				><?php _e( 'Show link text', 'link-shield' ); ?></option>
</select></td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e( 'Hide link text on Comments?: ', 'link-shield' ); ?></label></th>
				<td><select name="link_shield_blog_comments_show_link_text_field" id="link_shield_blog_comments_show_link_text_field">
						<option value="0" 
						<?php
						if ( ( get_site_option( 'link_shield_blog_comments_show_link_text' ) === 0 ) || ! get_site_option( 'link_shield_blog_comments_show_link_text' ) ) {
							echo 'selected="selected"';}
						?>
						><?php _e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
						<option value="1" 
						<?php
						if ( get_site_option( 'link_shield_blog_comments_show_link_text' ) === 1 ) {
							echo 'selected="selected"';}
						?>
						><?php _e( 'Show link text', 'link-shield' ); ?></option>
</select></td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e( 'Hide link text on bbPress?: ', 'link-shield' ); ?></label></th>
				<td><select name="link_shield_bbpress_show_link_text_field" id="link_shield_bbpresss_show_link_text_field">
			<option value="0" 
			<?php
			if ( ( get_site_option( 'link_shield_bbpress_show_link_text' ) === 0 ) || ! get_site_option( 'link_shield_bbpress_show_link_text' ) ) {
				echo 'selected="selected"';}
			?>
			><?php _e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?></option>
			<option value="1" 
			<?php
			if ( get_site_option( 'link_shield_bbpress_show_link_text' ) === 1 ) {
				echo 'selected="selected"';}
			?>
			><?php _e( 'Show link text', 'link-shield' ); ?></option>
		</select></td>
		</tr>

	<?php do_action( 'link_shield_fields_options_block' ); ?>

		<tr>
			<th scope="row"><label><?php _e( 'Shordcode for hide text/links:', 'link-shield' ); ?></label></th>
				<td><input type="text" name="link_shield_shordcode_field" class="regular-text" value="<?php echo get_site_option( 'link_shield_shordcode' ); ?>"> <code>
				<?php
				if ( get_site_option( 'link_shield_shordcode' ) ) {
					echo '[' . get_site_option( 'link_shield_shordcode' ) . ']Text to hide[/' . get_site_option( 'link_shield_shordcode' ) . ']';
				} else {
					echo '[linkshield_hide]text to hide[/linkshield_hide]'; }
				?>
				</code>
<p class="description"><?php _e( 'Use this Shordcode for hide links, text, text block, vids, etc to non logedin users', 'link-shield' ); ?></p></td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e( 'Text to show by the shordcode to users:', 'link-shield' ); ?></label></th>
				<td><input type="text" name="link_shield_hidden_text_message_field" class="regular-text" value="<?php echo get_site_option( 'link_shield_hidden_text_message' ); ?>"><p class="description"><?php _e( 'Add the text to use when you hide text, links, text blocks, vids, etc with the shordcode', 'link-shield' ); ?></p></td>
		</tr>

		<tr>
			<th scope="row"><label><?php _e( "Add rel='nofollow' to comments reply link:", 'link-shield' ); ?></label></th>
			<td><label><input name="link_shield_add_nofollow_to_comments_links" type="checkbox" id="link_shield_add_nofollow_to_comments_links" value="1" <?php echo get_site_option( 'link_shield_add_nofollow_to_comments_links' ) === '1' ? 'checked' : ''; ?>><?php _e( ' The reply link will include the comment ID in the URL and will send you back to the page with the comment form in place to make your reply to the comment.', 'link-shield' ); ?><br />
		<?php _e( 'The problem is that search engines can follow this link on your page and will index the page the links goes to. This page is the same as the current page but will have additional query string options to take to back to the comment form. These URLs are then indexed in the search engines creating duplicate context in the search engine index.', 'link-shield' ); ?><br />
		<?php _e( 'A good way to solve this problem is to add a rel="nofollow" to all your comment reply links, which tells search engines not to follow this link.', 'link-shield' ); ?></label></td>

	<?php do_action( 'link_shield_fields' ); ?>

</table>
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
</p>
</form>
</div>

	<?php
}
add_filter( 'the_content', 'link_shield_look_for_bl_domains' );
add_filter( 'the_excerpt', 'link_shield_look_for_bl_domains' );
add_filter( 'the_content_feed', 'link_shield_look_for_bl_domains_comments' );
add_filter( 'comment_text', 'link_shield_look_for_bl_domains_comments' );
add_filter( 'comments_number', 'link_shield_look_for_bl_domains_comments' );
add_filter( 'get_comment_text', 'link_shield_look_for_bl_domains_comments' );

/**
 * Hide links on posts and excerpts.
 *
 * @param string $text The content to check for blacklisted domains.
 * @return string The content with blacklisted domains' links hidden.
 */
function link_shield_look_for_bl_domains( $text ) {
	$low_domain = strtolower( $text );
	if ( ! get_site_option( 'link_shield_text' ) ) {
		$link_shield_text = __( 'link blocked thanks to AEDE Spanish tax', 'link-shield' );
	} else {
		$link_shield_text = get_site_option( 'link_shield_text' );
	}

	foreach ( $GLOBALS['aede_domains'] as $blacklisteddomain ) {
		$searchword = '~\b' . $blacklisteddomain . '\b~';
			preg_match_all( $searchword, $low_domain, $found );
		foreach ( $found[0] as $pattern ) {
			if ( get_site_option( 'link_shield_blog_show_link_text' ) === 1 ) {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '$2', $text );
			} else {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '[' . $link_shield_text . ']', $text );

			}
		}
	} return $text;
}

/**
 * Hide links on comments.
 *
 * @param string $text The content to check for blacklisted domains.
 * @return string The content with blacklisted domains' links hidden.
 */
function link_shield_look_for_bl_domains_comments( $text ) {
	$low_domain = strtolower( $text );
	if ( ! get_site_option( 'link_shield_text' ) ) {
		$link_shield_text = __( 'link blocked thanks to AEDE Spanish tax', 'link-shield' );
	} else {
		$link_shield_text = get_site_option( 'link_shield_text' );
	}

	foreach ( $GLOBALS['aede_domains'] as $blacklisteddomain ) {
		$searchword = '~\b' . $blacklisteddomain . '\b~';
			preg_match_all( $searchword, $low_domain, $found );
		foreach ( $found[0] as $pattern ) {
			if ( get_site_option( 'link_shield_blog_comments_show_link_text' ) === 1 ) {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '$2', $text );
			} else {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '[' . $link_shield_text . ']', $text );
			}
		}
	} return $text;
}

/**
 * Hide links on bbPress posts.
 *
 * @param string $text The content to check for blacklisted domains.
 * @return string The content with blacklisted domains' links hidden.
 */
function link_shield_look_for_bl_domains_bbpress( $text ) {
	$low_domain = strtolower( $text );
	if ( ! get_site_option( 'link_shield_text' ) ) {
		$link_shield_text = __( 'link blocked thanks to AEDE Spanish tax', 'link-shield' );
	} else {
		$link_shield_text = get_site_option( 'link_shield_text' );
	}

	foreach ( $GLOBALS['aede_domains'] as $blacklisteddomain ) {
		$searchword = '~\b' . $blacklisteddomain . '\b~';
			preg_match_all( $searchword, $low_domain, $found );
		foreach ( $found[0] as $pattern ) {
			if ( get_site_option( 'link_shield_bbpress_show_link_text' ) === 1 ) {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '$2', $text );
			} else {
				$text = preg_replace( '/<a[^>]+?href="http:\/\/' . $pattern . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '[' . $link_shield_text . ']', $text );
			}
		}
	} return $text;
}

/**
 * Shortcode to hide links or content for non-logged-in users.
 *
 * @param array       $atts Shortcode attributes.
 * @param string|null $content Content to hide.
 * @return string Content for logged-in users or a message for non-logged-in users.
 */
function link_shield_hide_link_shordcode( $atts, $content = null ) {

	if ( is_user_logged_in() ) {
		return $content;
	} else {
		$hidentextmessage = get_site_option( 'link_shield_hidden_text_message' );
		if ( $hidentextmessage ) {
			return $hidentextmessage;
		} else {
			return __( 'You need to login for see this content', 'link-shield' );
		}
	}
}

if ( ! get_site_option( 'link_shield_shordcode' ) ) {
	add_shortcode( 'linkshield_hide', 'link_shield_hide_link_shordcode' );
} else {
	add_shortcode( get_site_option( 'link_shield_shordcode' ), 'link_shield_hide_link_shordcode' );
}

/**
 * Add rel="nofollow" to comment replay link if it is seleccted
 *
 * @param string $link The comment replay link.
 * @return string The comment replay link with rel="nofollow"
 */
function link_shiled_add_nofollow_to_comments_links( $link ) {
	return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}

if ( get_site_option( 'link_shield_add_nofollow_to_comments_links' ) === 1 ) {
	add_filter( 'comment_reply_link', 'link_shiled_add_nofollow_to_comments_links' );
}
