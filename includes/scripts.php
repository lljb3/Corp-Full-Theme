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
		wp_enqueue_script( 'requirejs',  $app_base . '/require.js', array('jquery'), false, true );
		wp_localize_script( 'requirejs', 'require', array(
			'baseUrl' => $app_base,
			'deps' => array( $app_base . '/site.js')
		));

        /* Theme CSS */
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}