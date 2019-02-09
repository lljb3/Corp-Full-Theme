<?php
	global $kake_theme_option;
	$custom_scripts = $kake_theme_option['custom-scripts'];
?>

<!-- File Calls -->
<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<?php echo $custom_scripts; ?>

<!-- RequireJS -->
<script type="text/javascript" data-main="<?php echo get_template_directory_uri(); ?>/assets/js/site.js" src="<?php echo get_template_directory_uri(); ?>/assets/js/require.js"></script>
</body>

<!-- End of Site -->
</html>