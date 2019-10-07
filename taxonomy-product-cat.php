<?php get_header(); ?>

<?php 
$currTerm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

$termID = $currTerm->term_id;

$taxonomies = array( 'product-cat');
$args = array( 
    'exclude'=>array('25'), //exclude category bestseller
    'hide_empty'=> false,
    'parent' => $termID,
    
);
$terms = getTaxTerms($taxonomies, $args);
?>
   
<div class="container clearfix  mT60">
    
    <div class="postcontent nobottommargin clearfix">
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
        
        <div class="divider divider-rounded divider-center"><i class="icon-certificate"></i></div>
    
        <div class="post-grid grid-3 clearfix mB50">
            <?php if (have_posts()) : ?> 			
                <?php while (have_posts()) : the_post(); ?>
                <?php
                    $price = rwmb_meta( 'price', 'type=text' ) ? rwmb_meta( 'price', 'type=text' ) : '';
                    $priceOff = rwmb_meta( 'price-off', 'type=text' ) ? rwmb_meta( 'price-off', 'type=text' ) : '';
                    $currency = rwmb_meta( 'currency', 'type=select' ) ? rwmb_meta( 'currency', 'type=select' ) : '' ;
                ?>
                <div class="entry clearfix product-item">

                        <div class="entry-image">
                            <a href="<?php if ( has_post_thumbnail() ) { echo the_post_thumbnail_url( 'full' );  } ?>" data-lightbox="image">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('full');
                                } 
                                ?>
                            </a>
                        </div>
                        <div class="entry-title">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <div class="product-price">
                            <?php if ($priceOff != ''): ?>
                            <del><?php echo $priceOff .' '. $currency; ?></del> 
                            <?php endif; ?>
                            <ins><?php echo $price .' '. $currency; ?></ins>
                        </div>
                        <div class="entry-content clearfix">
                            <a href="<?php the_permalink(); ?>" class="more-link">Read More</a>
                        </div>

                </div> <!-- //entry clearfix -->


                <?php endwhile; ?>
            <?php else : ?>
                <h2>Nothing found</h2>
            <?php endif; ?>
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
            
<!--            <h4>Наша Продукция</h4>
            <ul>
                <?php foreach( $terms as $term ){ ?>
                    <li><a  <a href="/product-cat/<?php echo $term->slug; ?>" ><div><?php echo $term->name; ?></div></a></li>
                <?php } ?>               
            </ul>-->

        
    </div>
</div> <!-- //.container -->



<?php get_footer(); ?>