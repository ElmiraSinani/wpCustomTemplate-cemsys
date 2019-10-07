<!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="col_one_third">

                            <div class="widget clearfix">                               
                                <?php if ( dynamic_sidebar( 'footer-sidebar-1' ) ) : ?>
                                <?php endif; ?> 
                            </div>

                        </div>

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">
                                <?php if ( dynamic_sidebar( 'footer-sidebar-2' ) ) : ?>
                                <?php endif; ?> 
                            </div>

                        </div>

                        <div class="col_one_third col_last">
                            <!--http://staticmapmaker.com/yandex/-->
                            <div style="background: url('<?php echo bloginfo('template_directory'); ?>/images/world-map.png') no-repeat center center; background-size: 100%;">
                                <?php if ( dynamic_sidebar( 'footer-sidebar-3' ) ) : ?>
                                <?php endif; ?>   
                            </div>
                        </div>

                    </div>

                    <div class="col_one_third col_last">                        
                        <?php if ( dynamic_sidebar( 'footer-sidebar-4' ) ) : ?>
                        <?php endif; ?> 
                     </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half paddT40">
                        Copyrights &copy; <?php echo date('Y'); ?> All Rights Reserved by <?php bloginfo('name'); ?>.
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                             <?php 
                                $socialIcons = get_option('socialIcons', TRUE);
                                echo stripslashes($socialIcons);
                            ?>
                        </div>

                        <div class="clear"></div>
                            
                        <?php 
                            $footerContacts = get_option('footerContacts', TRUE);
                            echo stripslashes($footerContacts);
                        ?>
                        
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>


	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>
