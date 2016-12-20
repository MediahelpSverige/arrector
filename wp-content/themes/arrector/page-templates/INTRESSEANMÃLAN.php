<?php
/**
 * Template Name: INTRESSEANMÃLAN
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
        	<div class="titl">
        	<h2><?php the_title(); ?></h2>
        	</div>
        	<div class="row">
            		<div class="col-sm-8">
            			<h3 class="titl">Ev. medsökande</h3>
            				<div class="introuter">
            			         <div class="intrname"> <h4> name</h4></div>
            		            	<div class="nterfield"><input type="text" class="coninput" /></div>
            				</div>
				           <div class="introuter">
            			         <div class="intrname"> <h4> name</h4></div>
            		            	<div class="nterfield"><input type="text" class="coninput" /></div>
            				</div>
            								<div class="introuter">
            			         <div class="intrname"> <h4> name</h4></div>
            		            	<div class="nterfield"><input type="text" class="coninput" /></div>
            				</div>
            				
                    </div>
                       
                        <div class="col-md-4">
                        	<h3>Ev. medsökande</h3>
						 <?php echo do_shortcode('[contact-form-7 id="164" title="Contact form 1"]'); ?>

                       </div>
     			</div>
     		</div>
        </div>
    </div>


<?php get_footer(); ?>
