<?php
/**
 * BuddyPress Link Shield
 *
 * @package Link Shield
 *
 * @version 0.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Añadir filtros para BuddyPress.
add_filter( 'bp_get_activity_content_body', 'link_shield_look_for_bl_domains_buddypress' );
add_filter( 'bp_get_group_name', 'link_shield_look_for_bl_domains_buddypress' );
add_filter( 'bp_get_group_description', 'link_shield_look_for_bl_domains_buddypress' );
add_filter( 'bp_get_activities_title', 'link_shield_look_for_bl_domains_buddypress' );
add_filter( 'bp_activity_comment_content', 'link_shield_look_for_bl_domains_buddypress' );

/**
 * Look for blacklisted domains in BuddyPress content.
 *
 * @param string $text The content to be checked.
 * @return string The content with blacklisted domains hidden or modified.
 */
function link_shield_look_for_bl_domains_buddypress( $text ) {
	// Asegurar que el contenido es una cadena de texto.
	if ( ! is_string( $text ) ) {
		return $text;
	}

	$low_domain       = strtolower( $text );
	$link_shield_text = get_site_option( 'link_shield_text', __( 'link blocked thanks to AEDE Spanish tax', 'link-shield' ) );

	// Comprobamos que $GLOBALS['aede_domains'] esté definido y sea un array.
	if ( isset( $GLOBALS['aede_domains'] ) && is_array( $GLOBALS['aede_domains'] ) ) {
		foreach ( $GLOBALS['aede_domains'] as $blacklisted_domain ) {
			$searchword = '~\b' . preg_quote( $blacklisted_domain, '~' ) . '\b~';
			preg_match_all( $searchword, $low_domain, $found );

			foreach ( $found[0] as $pattern ) {
				if ( get_site_option( 'link_shield_buddypress_show_link_text' ) === '1' ) {
					// Reemplazar solo el texto del enlace.
					$text = preg_replace( '/<a[^>]+?href="http:\/\/' . preg_quote( $pattern, '/' ) . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '$2', $text );
				} else {
					// Reemplazar el enlace entero con el texto bloqueado.
					$text = preg_replace( '/<a[^>]+?href="http:\/\/' . preg_quote( $pattern, '/' ) . '([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '[' . esc_html( $link_shield_text ) . ']', $text );
				}
			}
		}
	}

	return $text;
}

/**
 * Add the option to hide the link text on BuddyPress.
 */
function link_shield_fields_buddypress() {
	?>

	<tr>
		<th scope="row"><label for="link_shield_buddypress_show_link_text_field"><?php esc_html_e( 'Hide link text on BuddyPress?', 'link-shield' ); ?></label></th>
		<td>
			<select name="link_shield_buddypress_show_link_text_field" id="link_shield_buddypress_show_link_text_field">
				<option value="0" <?php selected( get_site_option( 'link_shield_buddypress_show_link_text' ), '0' ); ?>>
					<?php esc_html_e( 'Replace text with "Text for hidden links"', 'link-shield' ); ?>
				</option>
				<option value="1" <?php selected( get_site_option( 'link_shield_buddypress_show_link_text' ), '1' ); ?>>
					<?php esc_html_e( 'Show link text', 'link-shield' ); ?>
				</option>
			</select>
		</td>
	</tr>

	<?php
}
add_action( 'link_shield_fields_options_block', 'link_shield_fields_buddypress' );

/**
 * Save the option to hide the link text on BuddyPress.
 */
function link_shield_fields_buddypress_save() {
	// Verificar que el nonce es válido.
	if ( isset( $_POST['link_shield_buddypress_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['link_shield_buddypress_nonce'] ) ), 'link_shield_buddypress_save' ) ) {
		// Verificar la capacidad del usuario antes de guardar la opción.
		if ( current_user_can( 'manage_options' ) ) {
			if ( isset( $_POST['link_shield_buddypress_show_link_text_field'] ) ) {
				$opt_link_shield_buddypress_show_link_text = sanitize_text_field( wp_unslash( $_POST['link_shield_buddypress_show_link_text_field'] ) );
				update_site_option( 'link_shield_buddypress_show_link_text', $opt_link_shield_buddypress_show_link_text );
			}
		} else {
			wp_die( esc_html__( 'You do not have sufficient permissions to perform this action.', 'link-shield' ) );
		}
	}
}
add_action( 'link_shield_save_options', 'link_shield_fields_buddypress_save' );
