<?php
	/*
	Template Name: Template - Home
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
?>
<?php global $kake_theme_option; if ( $kake_theme_option['transitional-header-button'] ) { ?>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/trans-header' ) ); ?>
<?php } else { ?>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php } ?>

<!-- Jumbotron Information -->
<div class="jumbotron" id="home">
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
        <div class="down-arrow"><a href="#content" data-scroll><span class="glyphicon glyphicon-triangle-bottom"></span></a></div>
    <!-- end .slider-text --></div>
    <div class="slider">
        <?php $slidername = get_post_meta($post->ID, "layer_slider_post_class", true); ?>
        <?php layerslider($slidername); ?>
    <!-- end .slider --></div>
<!-- end .jumbotron --></div>

<!-- Content Information -->

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="content-section">
                <div class="col-md-10 col-md-offset-1">
                    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <h2 class="has-title hidden"><?php the_title(); ?></h2>
                    <div class="has-text"><?php the_content(); ?></div>
                    <div class="hidden"><?php comments_template( '', true ); ?></div>
                    <?php endwhile; ?>
                <!-- end .col-md-10 --></div>
            <!-- end .row --></div>
            <?php if( $kake_theme_option['content-posts-container'] ) { ?>
                <div class="row" id="posts-section">
                    <?php // Display blog posts on any page @ http://m0n.co/l
                    $temp = $wp_query; $wp_query = null;
                    $postsno = $kake_theme_option['blog-posts-number-of'];
                    $wp_query = new WP_Query(); $wp_query->query('showposts=' . $postsno . '&paged='.$paged);
                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <div class="col-md-4">
                        <div class="post-item">
                            <?php if (has_post_thumbnail()) { $feat_image_url = wp_get_attachment_url(get_post_thumbnail_id()); } ?>
                            <div class="post-thumbnail" style="background-image:url(<?php echo $feat_image_url; ?>);opacity:.3;"></div>
                            <h3 class="has-title">
                                <a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
                            <!-- end .has-title --></h3>
                            <?php global $more; $more = 0; ?>
                            <div class="has-text">
                                <div class="category text-accent">
                                    <span class="pull-left"><?php the_category(', '); ?> -</span>
                                    <span class="pull-left">&nbsp;<?php wp_days_ago_v3(); ?> -</span>
                                    <span class="pull-left">&nbsp;<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
                                <!-- end .category --></div>
                                <div class="post">
                                    <a href="<?php the_permalink(); ?>" title="Read more" class="btn btn-success btn-sm read-more">Read More</a>
                                <!-- end .post --></div>
                            <!-- end .has-text --></div>
                        <!-- end .post-item --></div>
                    <!-- end .col-md-4 --></div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <!-- end .row --></div>
            <?php } ?>
        <!-- end .col-md-12 --></div>
    <!-- end .row --></div>
<!-- end #content --></div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>