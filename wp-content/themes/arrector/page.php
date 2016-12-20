<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

		<div class="content">
<!--banner part start-->
<div class="banner_part">

    	<div class="singlebanner">
    		<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>           				
								
			<span><img src="<?php echo $image[0]; ?>" alt=""></span>
			</div>

</div>
</div>



<div class="slider_btm_part">
	<div class="slider_btm_top">
        <div class="container">
        	<div class="row">
        		
					        		
        		
            	<div class="col-sm-12">
                    <h3><?php the_title(); ?> </h3>
                    
                  <?php
                  while(have_posts()): the_post();
                   the_content(); 
				  endwhile;
                   ?>

                        </div>
                    </div>
     			</div>
     		</div>
        </div>
    </div>
<?php get_footer(); ?>
