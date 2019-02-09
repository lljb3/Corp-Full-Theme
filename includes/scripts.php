<?php
	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_script_enqueuer() {
        /* Theme CSS */
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}