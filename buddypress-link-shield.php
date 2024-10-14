<?php

// BuddyPress

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter(	'bp_get_activity_content_body',		'link_shield_look_for_bl_domains_buddypress'	);
add_filter( 'bp_get_group_name',				'link_shield_look_for_bl_domains_buddypress'	);
add_filter( 'bp_get_group_description',			'link_shield_look_for_bl_domains_buddypress'	);
add_filter( 'bp_get_activities_title',			'link_shield_look_for_bl_domains_buddypress'	);
add_filter( 'bp_activity_comment_content',		'link_shield_look_for_bl_domains_buddypress'	);

// Hide links on BuddyPress
	function link_shield_look_for_bl_domains_buddypress($text){
		$low_domain = strtolower($text);
		if (!get_site_option( 'link_shield_text' ) ) { $link_shield_text =  __('link blocked thanks to AEDE Spanish tax','link-shield'); } else { $link_shield_text = get_site_option( 'link_shield_text' ); }

			//print_r($GLOBALS['aede_domains']);
			foreach ($GLOBALS['aede_domains'] as $blacklisteddomain) {
				$searchword = '~\b'.$blacklisteddomain.'\b~';
					preg_match_all($searchword, $low_domain, $found);
						foreach ($found[0] as $pattern) {
							if ( get_site_option ('link_shield_buddypress_show_link_text') == 1){
								$text = preg_replace('/<a[^>]+?href="http:\/\/'.$pattern.'([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '$2', $text);
								} else {
									$text = preg_replace('/<a[^>]+?href="http:\/\/'.$pattern.'([\s\S]*?)[^>]*>([\s\S]*?)<\/a>/', '[' .$link_shield_text. ']', $text);
								}
							//print_r($found[0]);
						}
					} return $text;
	}

	function link_shield_fields_buddypress(){ ?>

		<tr>
			<th scope="row"><label><?php _e("Hide link text on BuddyPress?: ", 'link-shield' ); ?></label></th>
			<td><select name="link_shield_buddypress_show_link_text_field" id="link_shield_buddypress_show_link_text_field">
			<option value="0" <?php if (  ( get_site_option ('link_shield_buddypress_show_link_text') == 0 ) || ! get_site_option ('link_shield_buddypress_show_link_text') ) echo 'selected="selected"'; ?> ><?php _e('Replace text with "Text for hidden links"','link-shield'); ?></option>
			<option value="1" <?php if ( get_site_option ('link_shield_buddypress_show_link_text') == 1 ) echo 'selected="selected"'; ?>><?php _e('Show link text','link-shield'); ?></option>
		</select></td>
		</tr>
	<?php }
	add_action('link_shield_fields_options_block','link_shield_fields_buddypress');

	function link_shield_fields_buddypress_save(){
		$opt_link_shield_buddypress_show_link_text		= @$_POST[ 'link_shield_buddypress_show_link_text_field' ];
		update_site_option( 'link_shield_buddypress_show_link_text', $opt_link_shield_buddypress_show_link_text );
	}
	add_action('link_shield_save_options','link_shield_fields_buddypress_save');

?>