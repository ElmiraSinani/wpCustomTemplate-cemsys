<?php get_header(); ?>


<?php echo do_shortcode('[layerslider id="1"]'); ?>


<div class="under-slider-sidebar">
    <?php if ( dynamic_sidebar( 'under-slider-sidebar' ) ) : ?>
    <?php endif; ?> 
</div>


<div class="container clearfix">
    
    <?php $frontBlock1 = get_option('frontBlock1', TRUE);  ?>
    <div class="fancy-title paddT40 heading-block center">
        <h3><?php echo stripslashes($frontBlock1); ?></h3>
    </div>   
    <?php     
        $taxonomies = array( 'product-cat');
        $args = array( 
            'exclude'=>array('25'), //exclude category bestseller
            'hide_empty'=> false,
            'parent' => 0
        );
        $terms = getTaxTerms($taxonomies, $args);    
    ?>

    <div id="oc-portfolio" class="owl-carousel portfolio-carousel ">
        <?php foreach( $terms as $term ){ ?>
        <div class="oc-item">
            <div class="iportfolio">
                <div class="portfolio-image padd50">
                    <a href="/product-cat/<?php echo $term->slug; ?>" >
                        <?php 
                            if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url($term->term_id) != ""){
                                $productImg = z_taxonomy_image_url($term->term_id);
                            }else{
                                if( Z_IMAGE_PLACEHOLDER ){
                                    $productImg = Z_IMAGE_PLACEHOLDER;
                                }
                            }
                        ?>
                        <img src="<?php echo $productImg; ?>" />
                    </a>
                    <div class="portfolio-overlay">
                        <a href="<?php echo $productImg; ?>" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                        <a href="/product-cat/<?php echo $term->slug; ?>" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                    </div>
                </div>
                <div class="portfolio-desc text-center bg-light-gray">
                    <h3> <a href="/product-cat/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></h3>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="bg-light-gray mT60 paddB70">
    <div class="container clearfix">

        <?php $frontBlock2 = get_option('frontBlock2', TRUE);  ?>
        <div class="fancy-title paddT40 heading-block center">
            <h3><?php echo stripslashes($frontBlock2); ?></h3>
        </div> 
        
        <?php
        
        // The Query
        $bestsellerArgs = array(
            'post_type' => 'products',
            'tax_query' => array(
		     array(
			'taxonomy' => 'product-cat',
			'field'    => 'slug',
		        'terms'    => 'bestseller',
		    )
            	)
            
        );
        $the_query = new WP_Query( $bestsellerArgs );

        
        ?>
        
        <div id="oc-products" class="owl-carousel products-carousel">
            <?php  if ( $the_query->have_posts() ) { ?>
            <?php  while ( $the_query->have_posts() ) { ?>
            <?php  $the_query->the_post(); ?>
             <?php
                $price = rwmb_meta( 'price', 'type=text' ) ? rwmb_meta( 'price', 'type=text' ) : '';
                $priceOff = rwmb_meta( 'price-off', 'type=text' ) ? rwmb_meta( 'price-off', 'type=text' ) : '';
                $currency = rwmb_meta( 'currency', 'type=select' ) ? rwmb_meta( 'currency', 'type=select' ) : '' ;
               
            ?>
            <div class="oc-item ">
                <div class="product iproduct clearfix">
                    <div class="product-image">
                        <a href="#">
                            <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } 
                            ?>
                        </a>
                        <!--<div class="sale-flash">50% Off*</div>-->
                        <div class="product-overlay">
                            <a href="<?php if( has_post_thumbnail() ){ the_post_thumbnail_url(); } ?>" class="add-to-cart left-icon" data-lightbox="image">
                                <i class="icon-zoom-in2"></i>
                            </a>
                             <a href="<?php the_permalink(); ?>" class="item-quick-view" >
                                <i class="icon-line-ellipsis"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-desc center">
                        <div class="product-title">
                            <h3><a href="#"><?php the_title(); ?></a></h3>
                        </div>
                        <div class="product-price">
                            <?php if ($priceOff != ''): ?>
                            <del><?php echo $priceOff .' '. $currency; ?></del> 
                            <?php endif; ?>
                            <ins><?php echo $price .' '. $currency; ?></ins>
                        </div>
<!--                        <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                        </div>-->
                    </div>
                </div>
            </div>
            <?php } //and while 
                } else {
                        // no posts found
                } //end if
                // Restore original Post Data 
                wp_reset_postdata(); 
            ?>
        
        </div>
    </div>
</div>



<div class="our-partners paddB70 container">
    <?php $ourPartners = get_option('frontBlock3', TRUE);  ?>
    <div class="fancy-title paddT40 heading-block center">
        <h3><?php echo stripslashes($ourPartners); ?></h3>
    </div>
    <?php echo do_shortcode('[logo-carousel id=our-partners]'); ?>
</div>


<?php get_footer(); ?>