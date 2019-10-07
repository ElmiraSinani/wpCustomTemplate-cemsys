<?php

require_once("templates/inc/meta-box-products.php");

require_once("templates/inc/cpt-globeSettings.php");
//require_once("templates/inc/cpt_the_deals.php");
//require_once("function-the-deals.php");
//require_once("templates/inc/cpt-about-slider.php");
//require_once("templates/inc/cpt-consultation.php");

// Add RSS links to <head> section
automatic_feed_links();

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Page Settings
add_theme_support('post-thumbnails');  

/*set_post_thumbnail_size( 'front_slider_small', 169, 169, true );    
add_image_size( 'front_slider_small', 169, 169, true ); 

set_post_thumbnail_size( 'front_slider_big', 450, 370, true );
add_image_size( 'front_slider_big', 450, 370, true );

set_post_thumbnail_size( 'about_slider_small', 196, 150, true );
add_image_size( 'about_slider_small', 196, 150, true );

set_post_thumbnail_size( 'about_slider_big', 574, 264, true );
add_image_size( 'about_slider_big', 574, 264, true );*/


function register_cem_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu','cem'),
            'footer-menu' => __('Footer Menu','cem'),
        )
    );
}
add_action('init', 'register_cem_menus');

function crackingthecode_sidebar_init() {
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id' => 'right-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => 'Under Frontpage Slider Sidebar',
        'id' => 'under-slider-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 3',
        'id' => 'footer-sidebar-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 4',
        'id' => 'footer-sidebar-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
 add_action( 'init', 'crackingthecode_sidebar_init' );
 
 function load_styles_and_scripts() {
    
//load styles     
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');  
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');  
    wp_enqueue_style('dark', get_template_directory_uri() . '/css/dark.css'); 
    wp_enqueue_style('fonticons', get_template_directory_uri() . '/css/font-icons.css'); 
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css'); 
    wp_enqueue_style('magnificpopup', get_template_directory_uri() . '/css/magnific-popup.css'); 
    
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css'); 
    
    //-- External JavaScripts
    //============================================= -->  
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), '', true);
    }
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), '', true);
    
    //<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
//    wp_enqueue_script('themepunch-tools', get_template_directory_uri() . '/include/rs-plugin/js/jquery.themepunch.tools.min.js', array(), '', true);
//    wp_enqueue_script('themepunch-rev', get_template_directory_uri() . '/include/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), '', true);
//    
//    //-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
//    wp_enqueue_style('rev-settings', get_template_directory_uri() . '/include/rs-plugin/css/settings.css'); 
        
    wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js', array(), '', true);
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '', true);
    
 }
 
 add_action('wp_enqueue_scripts', 'load_styles_and_scripts');
 

 
function getTaxTerms($taxonomies, $args){
    $terms = get_terms($taxonomies, $args);
    return $terms;
}

function my_breadcrumbs() {
 
    /* === OPTIONS === */
    $text['home']     = 'Главная'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page
 
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ' &raquo; '; // delimiter between crumbs
    $before         = '<span class="current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */
 
    global $post;
    $home_link    = home_url('/');
    $link_before  = '<span>';
    $link_after   = '</span>';
    $link_attr    = '  ';
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');
 
    if (is_home() || is_front_page()) {
 
        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<div class="breadcrumbs" >';
        if ($show_home_link == 1) {
            echo '<a href="' . $home_link . '" >' . $text['home'] . '</a>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }
 
        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                
                if( $post_type->name == 'products') {
                    printf($link, $home_link . 'our-products/', 'Продукция');
                }else {
                    printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                }                
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
                
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( $post_type->labels->singular_name == 'Product' ){
                $post_type->labels->singular_name = 'Продукция';
            }
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</div><!-- .breadcrumbs -->';
 
    }
}