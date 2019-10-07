<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="ekWeb" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
        
        
        <style>

        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

    </style>
    
    
</head>


<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Top Bar
        ============================================= -->
        <div id="top-bar" class="hidden-xs">

            <div class="container clearfix">

                <div class="col_half nobottommargin">

                    <p class="nobottommargin">
                         <?php 
                            $headerContacts = get_option('headerContacts', TRUE);
                            echo stripslashes($headerContacts);
                        ?>
                    </p>

                </div>

                <div class="col_half col_last fright nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">
                        
                        <div class="fright clearfix">
                            <?php 
                                $socialIcons = get_option('socialIcons', TRUE);
                                echo stripslashes($socialIcons);
                            ?>
                        </div>
                    </div><!-- .top-links end -->

                </div>

            </div>

        </div><!-- #top-bar end -->

        <!-- Header
        ============================================= -->
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <?php 
                            $standardLogo = get_option('standardLogo');
                            $retinaLogo = get_option('retinaLogo');                            
                        ?>
                        <a href="<?php echo home_url(); ?>" class="standard-logo" data-dark-logo="<?php echo $standardLogo; ?>">                            
                            <img src="<?php echo $standardLogo; ?>" alt="">
                        </a>
                        <a href="<?php echo home_url(); ?>" class="retina-logo" data-dark-logo="<?php echo $retinaLogo; ?>">
                            <img src="<?php echo $retinaLogo; ?>" alt="">
                        </a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">
                        <?php
                            $args = array(
                                'menu' => 'main-menu',
                                'menu_class' => 'main-menu',
                                'container' => 'ul'
                                
                            );
                            wp_nav_menu( $args );
                        ?>


                        

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="search.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div><!-- #top-search end -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->
        <?php if ( !is_front_page() ): ?>
        <?php $breadcrumbBg = get_option('breadcrumbBg', TRUE);  ?>
            <div class="page-breadcrumb" style="background-image:url( '<?php echo $breadcrumbBg; ?>') ">
                <div class="container">
                    <?php 
                        $currTerm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
                        if ( $currTerm->taxonomy == 'product-cat' ) {                        
                    ?>                    
                    <h1> <?php echo  $currTerm->name; ?> </h1>
                    <?php } else { ?>
                    <h1><?php echo get_the_title(); ?></h1>
                    <?php } ?>
                    <div class="bcrumb">
                        <?php if (function_exists('my_breadcrumbs')) my_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>