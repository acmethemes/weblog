<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'weblog-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'weblog' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'weblog' )
) );

/*
* file for header breadcrumb options
*/
require_once weblog_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once weblog_file_directory('acmethemes/customizer/options/search.php');

/*
* file for pagination
*/
require_once weblog_file_directory('acmethemes/customizer/options/pagination.php');