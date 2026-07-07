<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('weblog_sidebar_selection') ) :
	function weblog_sidebar_selection( ) {
		wp_reset_postdata();
		$weblog_customizer_all_values = weblog_get_theme_options();
		global $post;
		if(
			isset( $weblog_customizer_all_values['weblog-sidebar-layout'] ) &&
			(
				'left-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout'] ||
				'both-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout'] ||
				'middle-col' == $weblog_customizer_all_values['weblog-sidebar-layout'] ||
				'no-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout']
			)
		){
			$weblog_body_global_class = $weblog_customizer_all_values['weblog-sidebar-layout'];
		}
		else{
			$weblog_body_global_class= 'right-sidebar';
		}

		if ( weblog_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'weblog_sidebar_layout', true );
				$weblog_wc_single_product_sidebar_layout = $weblog_customizer_all_values['weblog-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$weblog_body_classes = $post_class;
					} else {
						$weblog_body_classes = $weblog_wc_single_product_sidebar_layout;
					}
				}
				else{
					$weblog_body_classes = $weblog_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $weblog_customizer_all_values['weblog-wc-shop-archive-sidebar-layout'] ) ){
					$weblog_archive_sidebar_layout = $weblog_customizer_all_values['weblog-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $weblog_archive_sidebar_layout ||
						'left-sidebar' == $weblog_archive_sidebar_layout ||
						'both-sidebar' == $weblog_archive_sidebar_layout ||
						'middle-col' == $weblog_archive_sidebar_layout ||
						'no-sidebar' == $weblog_archive_sidebar_layout
					){
						$weblog_body_classes = $weblog_archive_sidebar_layout;
					}
					else{
						$weblog_body_classes = $weblog_body_global_class;
					}
				}
				else{
					$weblog_body_classes= $weblog_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'left-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'both-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'middle-col' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'no-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout']
				){
					$weblog_body_classes = $weblog_customizer_all_values['weblog-front-page-sidebar-layout'];
				}
				else{
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes= $weblog_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'weblog_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$weblog_body_classes = $post_class;
				} else {
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes = $weblog_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $weblog_customizer_all_values['weblog-archive-sidebar-layout'] ) ){
				$weblog_archive_sidebar_layout = $weblog_customizer_all_values['weblog-archive-sidebar-layout'];
				if(
					'right-sidebar' == $weblog_archive_sidebar_layout ||
					'left-sidebar' == $weblog_archive_sidebar_layout ||
					'both-sidebar' == $weblog_archive_sidebar_layout ||
					'middle-col' == $weblog_archive_sidebar_layout ||
					'no-sidebar' == $weblog_archive_sidebar_layout
				){
					$weblog_body_classes = $weblog_archive_sidebar_layout;
				}
				else{
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes= $weblog_body_global_class;
			}
		}
		else {
			$weblog_body_classes = $weblog_body_global_class;
		}
		return $weblog_body_classes;
	}
endif;