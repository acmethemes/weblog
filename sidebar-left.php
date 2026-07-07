<?php
/**
 * The left sidebar containing the main widget area.
 */
if ( ! is_active_sidebar( 'weblog-sidebar' ) ) {
	return;
}
$sidebar_layout = weblog_sidebar_selection();
?>
<?php if( $sidebar_layout == "left-sidebar" || $sidebar_layout == "both-sidebar"  ) : ?>
    <div id="secondary-left" class="widget-area sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'weblog-sidebar-left' ); ?>
        </div>
    </div>
<?php endif;