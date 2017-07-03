<?php
/*
Template Name: Template - Jumbotron Page
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

<!-- Jumbotron Information -->
<div class="jumbotron" id="other">
    <div class="slider-text">
        <?php 
            $slidertitle = get_post_meta($post->ID, "slidermeta-text", true); 
            $sliderimage = get_post_meta($post->ID, "slidermeta-image", true); 
            if( !empty( $slidertitle ) && empty( $sliderimage ) ) { 
        ?>
            <h1 class="slider-title"><?php echo $slidertitle; ?></h1>
        <?php } elseif( empty( $slidertitle ) && !empty( $sliderimage ) ) { ?>
            <h1 class="slider-title">
                <img src="<?php echo $sliderimage; ?>" alt="" class="img-responsive center-block" />
            <!-- end .slider-title --></h1>
        <?php } elseif( !empty( $slidertitle ) && !empty( $sliderimage ) ) { ?>
            <h1 class="slider-title">
                <img src="<?php echo $sliderimage; ?>" alt="" class="img-responsive center-block" />
                <?php echo $slidertitle; ?>
            <!-- end .slider-title --></h1>
        <?php } ?>
        <?php 
            $slidertext = get_post_meta($post->ID, "slidermeta-textarea", true);
            if( $slidertext ) { 
        ?>
            <p><?php echo $slidertext; ?></p>
        <?php } ?>
        <?php 
            $sliderbutton = get_post_meta($post->ID, "slidermeta-button", true); 
            $sliderlink = get_post_meta($post->ID, "slidermeta-link", true); 
            if( $sliderbutton ) {
        ?>
            <a href="<?php echo $sliderlink; ?>" class="btn btn-lg button-success"><?php echo $sliderbutton; ?></a>
        <?php } ?>
        <div class="down-arrow">
            <?php $scrdwnimg = $kake_theme_option['scroll-down-icon-image']['url']; $scrdwnicon = $kake_theme_option['scroll-down-icon-html']; $scrdwntxt = $kake_theme_option['scroll-down-text']; $scrdwnline = $kake_theme_option['scroll-down-line']; ?>
            <?php if( !empty( $scrdwnimg ) && empty( $scrdwnicon ) ) { ?>
                <a href="#content" data-scroll><img src="<?php echo $scrdwnimg ?>" alt="" /></a>
            <?php } elseif( !empty( $scrdwnicon ) ) { ?>
                <a href="#content" data-scroll><i class="<?php echo $scrdwnicon ?>"></i></a>
            <?php } if( !empty( $scrdwntxt ) ) { ?>
                <br /><a href="#content" class="scroll-text" data-scroll><span><?php echo $scrdwntxt; ?></span></a>
            <?php } if( ( $scrdwnline ) ) { ?>
                <br /><span class="line"></span>
            <?php } ?>
        </div>
    <!-- end .slider-text --></div>
    <div class="slider">
        <?php $slidername = get_post_meta($post->ID, "layer_slider_post_class", true); ?>
        <?php layerslider($slidername); ?>
    <!-- end .slider --></div>
    <div class="slider-wash"></div>
<!-- end .jumbotron --></div>

<!-- Content Information -->
<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <h2 class="has-title text-center hidden"><?php the_title(); ?></h2>
            <div class="has-text"><?php the_content(); ?></div>
            <div class="hidden"><?php comments_template( '', true ); ?></div>
            <?php endwhile; ?>
        <!-- end .col-md-10 --></div>
    <!-- end .row --></div>
<!-- end #content --></div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>