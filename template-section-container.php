<?php
	/*
	Template Name: Template - Section Container
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
$trans_opt = $kake_theme_option['transitional-header-button'];
$trans_page_opt = get_post_meta($post->ID,'page_options_trans-header',true);
?>
<?php if ( $trans_page_opt == 1 ) { ?> 
    <?php if ( $kake_theme_option['transitional-header-button'] ) { ?>
        <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/trans-header' ) ); ?>
    <?php } ?>
<?php } else { ?>
    <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php } ?>

<!-- Section Container Information -->
<main class="container-fluid" id="section-container">
	<?php 
		$args = array(
			'post_type'=>'page',
			'post_parent'=>$post->ID,
			'order'=>'ASC',
			'orderby'=>'menu_order',
			'posts_per_page'=>-1,
		);
		$parent = new WP_Query($args); 
	?>
    <div class="row">
        <div class="col-md-12">
			<?php if ( $parent->have_posts() ) while ( $parent->have_posts() ) : $parent->the_post(); ?>
				<section class="container-fluid" id="section">
					<div class="row">
						<div class="col-md-12">
							<?php the_content(); ?>
						<!-- end .col-md-12 --></div>
					<!-- end .row --></div>
				<!-- end #section --></section>
			<?php endwhile; ?>
        <!-- end .col-md-12 --></div>
    <!-- end .row --></div>
<!-- end #content --></main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>