<?php 

/**
 * Template Name: Products Page
 */

get_header();


$taxonomies = array( 'product-cat');
$args = array( 
    'exclude'=>array('25'), //exclude category bestseller
    'hide_empty'=> false,
    'parent' => 0,
    
);
$terms = getTaxTerms($taxonomies, $args);
?>
   
<div class="container clearfix  mT60 mB50">
    
    
    <div class="postcontent nobottommargin clearfix">
        
        <div class="divider divider-rounded divider-center mT0"><i class="icon-certificate"></i></div>
        <div class="post-grid grid-3 clearfix">
            <?php foreach ($terms as $term) { ?>
            <?php 
                if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url($term->term_id) != ""){
                    $productImg = z_taxonomy_image_url($term->term_id);
                }else{
                    if( Z_IMAGE_PLACEHOLDER ){
                        $productImg = Z_IMAGE_PLACEHOLDER;
                    }
                }
            ?>
                <div class="entry clearfix product-item bg-light-gray">

                        <div class="entry-image">
                            <a href="<?php echo $productImg; ?>" data-lightbox="image">
                                <img src="<?php echo $productImg; ?>" />
                            </a>
                        </div>
                        <div class="entry-title">
                            <h2><a href="/product-cat/<?php echo $term->slug; ?> "><?php echo $term->name; ?></a></h2>
                        </div>

                </div> <!-- //entry clearfix -->

            <?php } ?>    
        </div>
               
        
    </div><!-- //postcontent nobottommargin clearfix -->
    <div class="sidebar  col_last widget_nav_menu clearfix ">        
        <?php     
            $taxonomies = array( 'product-cat');
            $args = array( 
                'exclude'=>array('25'), //exclude category bestseller
                'hide_empty'=> false,
                'parent' => 0
            );
            $terms = getTaxTerms($taxonomies, $args);    
        ?>

        <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
            <ul>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
            </ul>
        <?php endif; ?>        
    </div>
</div> <!-- //.container -->



<?php get_footer(); ?>