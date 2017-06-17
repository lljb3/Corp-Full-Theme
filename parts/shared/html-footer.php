<?php
	global $kake_theme_option;
	$custom_scripts = $kake_theme_option['custom-scripts'];
?>

<!-- File Calls -->
<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<script type="text/javascript">
	<?php echo $custom_scripts; ?>
</script>
</body>

<!-- End of Site -->
</html>