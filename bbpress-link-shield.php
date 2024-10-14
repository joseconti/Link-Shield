<?php
/**
 * Add the option to hide the link text on bbPress.
 *
 * @package Link Shield
 * @version 0.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'bbp_get_topic_content', 'link_shield_look_for_bl_domains_bbpress' );
add_filter( 'bbp_get_reply_content', 'link_shield_look_for_bl_domains_bbpress' );
