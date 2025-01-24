<?php 
add_filter( 'elementor/icons_manager/additional_tabs', 'themesflat_iconpicker_register' );

function themesflat_iconpicker_register( $icons = array() ) {
	
	$icons['theme_icon'] = array(
		'name'          => 'theme_icon',
		'label'         => esc_html__( 'Theme Icons', 'themesflat-core' ),
		'labelIcon'     => 'icon-monal-menu',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-monal.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/onsus_fonts_default.json',
		'ver'           => '1.0.0',
	);

	$icons['onsus_icon'] = array(
		'name'          => 'onsus_icon',
		'label'         => esc_html__( 'Onsus Icons', 'themesflat-core' ),
		'labelIcon'     => 'icon-onsus',
		'prefix'        => '',
		'displayPrefix' => '',
		'url'           => THEMESFLAT_LINK . 'css/icon-onsus.css',
		'fetchJson'     => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME . 'assets/css/onsus_fonts_extend.json',
		'ver'           => '1.0.0',
	);

	return $icons;
}