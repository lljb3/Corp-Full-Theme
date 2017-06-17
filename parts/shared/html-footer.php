<?php
	global $kake_theme_option;
	$custom_scripts = $kake_theme_option['custom-scripts'];
?>

<!-- File Calls -->
<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<?php echo '<script type="text/javascript">' . $custom_scripts . '</script>'; ?>
<!-- RequireJS -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/require.js"></script>
</body>

<!-- End of Site -->
</html>