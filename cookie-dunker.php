<?php
/**
 * Plugin Name: Cookie Dunker
 * Plugin URL: https://www.splitanatom.com/services/web-design-development/cookie-dunker/
 * Description: Cookie Dunker replaces your embedded YouTube players with an ePrivacy-compliant version that does not serve tracking cookies. Cookie Dunker also removes Facebook Pixel's cookie.
 * Version: 1.7
 * Requires at least: 5.1
 * Requires PHP: 5.6
 * Author: Split An Atom
 * Author URI: https://www.splitanatom.com
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cookie-dunker
 */

add_filter( 'plugin_row_meta', 'wk_plugin_row_meta', 10, 2 );

function wk_plugin_row_meta( $links, $file ) {    
    if ( plugin_basename( __FILE__ ) == $file ) {
        $row_meta = array(
          'docs'    => '<a href="' . esc_url( 'https://www.splitanatom.com/services/web-design-development/cookie-dunker/' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" style="color:green;">' . esc_html__( 'Support', 'domain' ) . '</a>'
        );

        return array_merge( $links, $row_meta );
    }
    return (array) $links;
}

// Add "nocookie" To WordPress oEmbed YouTube Videos
function ev_youtube_nocookie_oembed( $html ) {
	return str_replace( 'youtube.com', 'youtube-nocookie.com', $html );
}
add_filter( 'embed_oembed_html', 'ev_youtube_nocookie_oembed' ); // WordPress
add_filter( 'video_embed_html', 'ev_youtube_nocookie_oembed' ); // Jetpack
add_filter('facebook_for_woocommerce_integration_pixel_enabled', '__return_false');