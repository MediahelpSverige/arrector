<?php
/**
 * Template Name: Kontakt
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


<div class="content">
<!--banner part start-->
<div class="banner_part">

</div>
</div>
<div class="slider_btm_part">
	<div class="slider_btm_top">
        <div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-7">
<?php echo do_shortcode('[contact-form-7 id="164" title="Contact form 1"]'); ?>

                        </div>
                        <div class="col-md-4 col-sm-5 right-info">
						<?php while(have_posts()): the_post();
							the_content();
endwhile;
							?>
                        
                    </div>
     			</div>
     		</div>
        </div>
    </div>
<?php get_footer(); ?>
