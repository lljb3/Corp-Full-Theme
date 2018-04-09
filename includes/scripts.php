<?php
	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_script_enqueuer() {
		/* Theme JS */
		$app_base = get_template_directory_uri() . '/assets/js';
		wp_enqueue_script( 'enquire',  $app_base . '/lib/enquire.min.js', array('jquery'), null, true );
		if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {
			wp_enqueue_script( 'requirejs',  $app_base . '/require.js', array('jquery','backbone','jetpack-carousel'), null, true );
		} else {
			wp_enqueue_script( 'requirejs',  $app_base . '/require.js', array('jquery','backbone','wp-embed'), null, true );
		}
		wp_localize_script( 'requirejs', 'require', array(
			'baseUrl' => $app_base,
			'deps' => array( $app_base . '/site.js')
		));

        /* Theme CSS */
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}