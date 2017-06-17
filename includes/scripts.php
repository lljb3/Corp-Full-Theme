<?php
	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_script_enqueuer() {
		/* Theme JS */
        wp_register_script( 'site', get_template_directory_uri().'/assets/js/site.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'site' );

        /* Theme CSS */
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}