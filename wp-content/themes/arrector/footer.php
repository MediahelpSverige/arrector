<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>




<footer>
	<div class="footer_part">
    	<!--footer top part-->
    	<div class="footer_top">
        	<div class="container">
            	<div class="row">
            		<?php dynamic_sidebar('sidebar-2');?>

                    <div class="col-md-4 col-sm-8 col-xs-6">
                    	<div class="footer_logo clearfix">
                        	<a href="#"><img src="<?php echo get_field('footer_image1',4); ?>" alt=""></a>
                            <a href="#"><img src="<?php echo get_field('footer_image2',4); ?>" alt=""></a>
                        </div>
                        <div class="row">
                        	<div class="col-sm-11 col-sm-offset-1">
                            	<h5>KONTAKT</h5>
                            	<?php dynamic_sidebar('sidebar-3'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer top part end-->
        
        <!--footer btm part-->
        <div class="container">
            <div class="footer_btm">
               
                    
                    <?php dynamic_sidebar('sidebar-4');?>
 
                   
            </div>
        </div>
        <!--footer btm part end-->
    </div>
</footer>
<!--footer part end-->
	<?php wp_footer(); ?>

</body>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.1.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>


</html>
