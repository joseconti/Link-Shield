<?php
/**
 * Uninstall Link Shield
 * @version     0.5.0
 */
 if( !defined('WP_UNINSTALL_PLUGIN') ) exit();

 //Remove Options used by Link Shield
 delete_site_option( 'link_shield_text'								);
 delete_site_option( 'link_shield_shordcode'						);
 delete_site_option( 'link_shield_blog_show_link_text'				);
 delete_site_option( 'link_shield_blog_comments_show_link_text'		);
 delete_site_option( 'link_shield_bbpress_show_link_text'			);
 delete_site_option( 'link_shield_add_nofollow_to_comments_links'	);
 delete_site_option( 'link_shield_buddypress_show_link_text'		);
 delete_site_option( 'link_shield_hidden_text_message'				);
 ?>