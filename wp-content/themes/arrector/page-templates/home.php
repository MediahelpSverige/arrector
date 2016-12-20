<?php
/**
 * Template Name: Home
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="content">
<!--banner part start-->
<div class="banner_part">
	<div class="custom1">
    	<div class="item">
    		<?php $bannerpage = get_page( 75 ) ?>
    		<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( 75 ), 'full' ); ?>           				
								
			<span><img src="<?php echo $image[0]; ?>" alt=""></span>
            <div class="caption_area">
            	<div class="container">
                	<div class="captext_inr">
                        <h2><?php echo $bannerpage->post_title; ?></h2> 
                     <p> <?php echo $bannerpage->post_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <?php $bannerpage = get_page( 75 ) ?>
            <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( 75 ), 'full' ); ?>                          
                                
            <span><img src="<?php echo $image[0]; ?>" alt=""></span>
            <div class="caption_area">
                <div class="container">
                    <div class="captext_inr">
                        <h2><?php echo $bannerpage->post_title; ?></h2> 
                     <p> <?php echo $bannerpage->post_content; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--banner part end-->

<!--slider btm part start-->
<div class="slider_btm_part">
	<div class="slider_btm_top">
        <div class="container">
        	<div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
     				<div class="blog_area">
                    	<div class="row">
                    		<?php	
					$args = array(
					    'post_type'      => 'page',
					    'posts_per_page' => -1,
					    'post_parent'    => 80,
					    'order'          => 'ASC',
					    'orderby'        => 'menu_order'
					 );
					
					$parent = new WP_Query( $args );
					
					if ( $parent->have_posts() ) : ?>
					
					    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>


                        	<div class="col-sm-4">
                            	<div class="blog_pic">
                                	<span><img src="<?php echo get_field('animation_image',$post->ID); ?>" alt=""></span>
                                	<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>           				
                                    <img src="<?php echo $image[0]; ?>" alt="">
                                </div>
                                <h4><?php the_title(); ?></h4>
                                <?php the_content(); ?>
                            </div>
					
					    <?php endwhile; ?>
					
					<?php endif; wp_reset_query(); ?>
                        </div>
                    </div>
     			</div>
     		</div>
        </div>
    </div>
    
    <div class="separator"></div>
    
    <div class="container">
        <div class="voluptas_area">
        	<div class="row">
            	<div class="col-md-9 col-sm-7">
                    <div class="slider_outter">
                    	<div class="slider_top">
                            <div class="custom2">


                            	
                            	<?php $event_query = new WP_Query(array('post_type'  => 'fastighet', 'posts_per_page' => '-1','order'=> 'DESC' ));
                                     while ( $event_query->have_posts() ) : $event_query->the_post(); ?>  

                                <div class="item">
                                <div class="image-wrap">
                                	<div class="captext2">
                                    	<span><?php the_title(); ?></span>
                                    </div>
                                     <div class="price_area">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <span class="price_btn">Läs mer</span>
                                            </a>
                                        </div>
         				         <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>           				
                                    <img class="homeproper" src="<?php echo $image[0]; ?>" alt="" >
                                    </div>
                                <div class="star_area">
                            	<p class="pull-left"><?php echo wp_trim_words( get_the_content(), 13 );?></p>
                            </div>
                                                           <div class="quea_area">
                        	
                       
                        	<div class="row">
                               <?php $slideinfo = get_cfc_meta( 'extrabild',$post->ID);      ?>
                                  <?php foreach( $slideinfo as $key => $value ){ 
                            if ($value['extrabild'] != '') {?>
                            	<div class="col-sm-4">
                                	<div class="quea_cell">
                                    	<span><img src="<?php the_cfc_field( 'extrabild','extrabild', false, $key ); ?>" alt=""></span>
                                        <p><?php the_cfc_field( 'extrabild','bildtext', false, $key ); ?></p>
                                    </div>
                                </div>
                                        <? } ?>
                                                        <?php }  ?>
                            </div>
                        </div>
                        </div>
                               
                         <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                	<div class="nyheter">
                    	<div class="nyheter_hd">nyheter</div>
                    	<?php $event_query = new WP_Query(array('post_type'  => 'voluptassite', 'posts_per_page' => '3','order'=> 'DESC', 'tax_query' => array( array( 'taxonomy'  => 'voluptastax','field' => 'id' ,'terms'  => '14' , 'operator'  => 'IN')),)        ); 
                          while ( $event_query->have_posts() ) : $event_query->the_post(); ?>
                        <div class="nyheter_cell">
                        	<h3><?php the_title(); ?></h3>
                           <p> <?php echo wp_trim_words( get_the_content(), 40,'[...]' );?></p>
                            <div class="time_text clearfix">
                            	<span class="pull-left"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . '  Ago';?></span>
                                <div class="pull-right">
                                    <a href="<?php the_permalink(); ?>">
                                        Se nyheter
                                        <i class="fa fa-long-arrow-right"></i>
                                     </a>
                                 </div>
                            </div>
                        </div>
                         <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

                        <div class="gray_btn">
                        	<a href="#">
                            	Se alla nyheter
                                <img src="<?php bloginfo('template_directory'); ?>/images/right_arrow.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--slider btm part end-->


</div>

<?php get_footer(); ?>
