<?php get_header(); ?>
<div class="container clearfix  mT60 mB50">    
    
    <div class="postcontent nobottommargin clearfix">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="single" id="post-<?php the_ID(); ?>">
                    <h2><?php the_title(); ?></h2>
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