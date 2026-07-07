<?php
/**
 * Weblog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Weblog
 */


/**
 *  Default Theme layout options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_theme_layout
 */
if ( ! function_exists( 'weblog_get_default_theme_options' ) ) :
	function weblog_get_default_theme_options() {

		$default_theme_options = array(
			/*feature section options*/
			'weblog-feature-cat'               => 0,
			'weblog-enable-feature'            => '',

			/*header options*/
			'weblog-header-logo'               => '',
			'weblog-header-id-display-opt'     => 'title-and-tagline',

			'weblog-show-date'                 => 1,
			'weblog-header-date-format'        => 'default',

			'weblog-facebook-url'              => '',
			'weblog-twitter-url'               => '',
			'weblog-youtube-url'               => '',
			'weblog-instagram-url'             => '',
			'weblog-enable-social'             => '',
			'weblog-header-show-search'        => 1,
			'weblog-enable-sticky-menu'        => '',
			'weblog-enable-sticky-sidebar'     => 1,

			/*footer options*/
			'weblog-footer-copyright'          => __( '&copy; All Right Reserved 2018', 'weblog' ),

			/*layout/design options*/
			'weblog-default-layout'            => 'fullwidth',

			/*layout/design options*/
			'weblog-sidebar-layout'            => 'right-sidebar',
			'weblog-front-page-sidebar-layout' => 'no-sidebar',
			'weblog-archive-sidebar-layout'    => 'no-sidebar',

			'weblog-pagination-option'         => 'default',
			'weblog-blog-archive-layout'       => 'full-image',
			'weblog-blog-archive-more-text'    => __( 'Read More', 'weblog' ),
			'weblog-primary-color'             => '#F78E3F',
			'weblog-custom-css'                => '',

			/*single post options*/
			'weblog-blog-archive-image-size'   => 'large',

			'weblog-show-related'              => 1,
			'weblog-related-title'             => __( 'Related posts', 'weblog' ),
			'weblog-related-post-display-from' => 'cat',
			'weblog-single-image-size'         => 'full',

			/*theme options*/
			'weblog-search-placholder'         => __( 'Search', 'weblog' ),
			'weblog-show-breadcrumb'           => '',

			/*Reset*/
			'weblog-reset-options'             => '0',

			'weblog-you-are-here-text'         => __( 'You are here', 'weblog' ),
		);
		return apply_filters( 'weblog_default_theme_options', $default_theme_options );
	}
endif;


if ( ! function_exists( 'weblog_get_theme_options' ) ) :
	/**
	 *  Get theme options
	 *
	 * @since Weblog 1.0.0
	 *
	 * @return array weblog_theme_options
	 */
	function weblog_get_theme_options() {
		static $cached_theme_options = null;

		// Skip cache in Customizer to reflect live changes.
		if ( null !== $cached_theme_options && ! is_customize_preview() ) {
			return $cached_theme_options;
		}

		$weblog_default_theme_options = weblog_get_default_theme_options();
		$weblog_get_theme_options     = get_theme_mod( 'weblog_theme_options' );

		if ( is_array( $weblog_get_theme_options ) ) {
			$cached_theme_options = array_merge( $weblog_default_theme_options, $weblog_get_theme_options );
		} else {
			$cached_theme_options = $weblog_default_theme_options;
		}

		return $cached_theme_options;
	}
endif;

/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ) . 'acmethemes/init.php';
