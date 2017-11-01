<?php
	/*
	Template Name: Template - Section Post
	*/
?>

<?php
	/**
	 * The template for displaying all pages.
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site will use a
	 * different template.
	 *
	 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers
	 * @since 		Starkers 4.0
	 */
global $kake_theme_option; 
?>

<!-- Section Information -->
<section class="container-fluid" id="section">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="content-section">
                <div class="col-md-10 col-md-offset-1">
                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <div class="has-text"><?php the_content(); ?></div>
                    <?php endwhile; ?>
                <!-- end .col-md-10 --></div>
            <!-- end .row --></div>
        <!-- end .col-md-12 --></div>
    <!-- end .row --></div>
<!-- end #section --></section>