<?php

/**
 * Disable self pingbacks
*/
function kongresszentrum_disable_self_pingbacks( &$links ) {
	foreach ( $links as $l => $link )
				if ( 0 === strpos( $link, get_option( 'home' ) ) )
						unset($links[$l]);
}

add_action( 'pre_ping', 'kongresszentrum_disable_self_pingbacks' );

/**
 * Remove Query Strings
 */
function remove_query_strings() {
	if ( ! is_admin() ) {
			add_filter( 'script_loader_src', 'remove_query_strings_split', 15 );
			add_filter( 'style_loader_src', 'remove_query_strings_split', 15 );
	}
}

function remove_query_strings_split( $src ) {
	$output = preg_split("/(&ver|\?ver)/", $src);
	return $output[0];
}
add_action( 'init', 'remove_query_strings' );

/**
 * Disable embeds
 */
function my_deregister_scripts() {
	wp_dequeue_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

 /**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );

	}
	return $urls;

}

/**
 * Disable RSS feed.
 */
function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action( 'do_feed', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rdf', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss2', 'itsme_disable_feed', 1 );
add_action( 'do_feed_atom', 'itsme_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'itsme_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'itsme_disable_feed', 1 );

/**
 * Clean up wp_head — remove unused links and meta.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

/**
 * Disable XML-RPC.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
