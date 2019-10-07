<?php get_header(); ?>
<style type="text/css">
    .owl-theme .owl-controls {
        position: relative ;
        top: 0;
        bottom: 0;
        width: auto;
        right: 0;
    }
</style>



<div class="container clearfix  mT60 mB50">    
    
    <div class="postcontent nobottommargin single-product clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <?php
            $price = rwmb_meta( 'price', 'type=text' ) ? rwmb_meta( 'price', 'type=text' ) : '';
            $priceOff = rwmb_meta( 'price-off', 'type=text' ) ? rwmb_meta( 'price-off', 'type=text' ) : '';
            $currency = rwmb_meta( 'currency', 'type=select' ) ? rwmb_meta( 'currency', 'type=select' ) : '' ;
            $options = rwmb_meta( 'product_options', 'type=wysiwyg' ) ? rwmb_meta( 'product_options', 'type=wysiwyg' ) : '' ;
            $galleryImages = rwmb_meta( 'product_gallery', 'type=image_advanced' ) ? rwmb_meta( 'product_gallery', 'type=image_advanced' ) : '' ;
            
        ?>
        
        <div class="row">
            <div class="col-md-6">
                
                <?php if ( $galleryImages != '' ){ ?>
                <div id="oc-portfolio-sidebar">                    
                    <?php foreach ($galleryImages as $img) {   ?>
                        <div class="oc-item ">
                            <div class="iportfolio">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="<?php echo $img['full_url']; ?>" alt="<?php echo $img['title']; ?>">
                                    </a>
                                    <div class="portfolio-overlay">
                                        <a href="<?php echo $img['full_url']; ?>" class="center-icon" data-lightbox="image">
                                            <i class="icon-line-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } // end foreach?>
                 </div>  
                <?php } else { ?>
                    <div class="img-border">
                        <a href="<?php if ( has_post_thumbnail() ) { echo the_post_thumbnail_url( 'full' );  } ?>" data-lightbox="image">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('medium');
                            } 
                            ?>
                        </a>
                    </div>
                <?php }  ?>
               
            </div>
            <div class="col-md-6 options">
                
                <h4><?php the_title(); ?></h4>
                
                <div class="product-price">
                    <?php if ($priceOff != ''): ?>
                    <del><?php echo $price .' '. $currency; ?></del> 
                    <?php endif; ?>
                    <ins><?php echo $priceOff .' '. $currency; ?></ins>
                </div>
            
                <?php echo $options; ?>
                
            </div>
            
        </div>
        <div class="descripton">
            <h4 >ОПИСАНИЕ</h4>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        </div>

        <?php // comments_template(); ?>

        <?php endwhile; endif; ?>


        
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