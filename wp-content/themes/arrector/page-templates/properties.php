<?php
/**
 * Template Name: properties
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="content">

<div class="slider_btm_part">
	<div class="slider_btm_top">
        <div class="container">
        	<div class="row">
            	<div class="col-sm-8 col-sm-offset-2">
                    <h3><?php the_title(); ?></h3>
                    <?php while(have_posts()): the_post();
                    	the_content();
endwhile;
                    	?>
     			</div>
     		</div>
        </div>
    </div>
    <div class="separator"></div>
</div>
     
       
<!--slider btm part start-->


<!--btm slider part-->
<div class="btm_slider">
	<div class="container">
    	<div class="btm_slider_hd clearfix row">
    		<div class="col-sm-7">
            <?php echo get_field('properties_title',$post->ID);?>
            <?php echo get_field('properties_content',$post->ID);?>
            </div>
            <div class="col-sm-5 serachingpost">
          	<div class="search_area clearfix">
          		<?php 
	$searchproperties = $_GET['searchproperties'];?>
          	       <form role="search" method="get" id="searchpost" class="searchform" action="">
							<input type="text" value="<?php echo $searchproperties; ?>" placeholder="Search Your Properties"  name="searchproperties" id="searchproperties" />
							<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
					</form>
					</div>
					</div>
                 </div>
            	<div class="row properties">
            		
<?php 
		if(empty($_GET['searchproperties'])){
		if ( get_query_var( 'paged' ) )
			$paged = get_query_var('paged');
		else if ( get_query_var( 'page' ) )
			$paged = get_query_var( 'page' );
		else
			$paged = 1;
		
		$per_page    = 6;
		$number_of_series = count( get_terms( 'propertiycat' ) );
		$offset      = $per_page * ( $paged - 1) ;
		$big=999999999999999999;
		$args = array(
		        'order'        => 'DESC',
		        'orderby'      => 'menu_order',
				'offset'       => $offset,
				'number'       => $per_page,
				'hide_empty' => 0,
				
		);
		
		$series = get_terms( 'propertiycat', $args );
		$the_query = new WP_Query( array('post_type' => 'fastighet' ));


		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) { ?>
				<?php
				$the_query->the_post();?>
				<a href="<?php echo get_permalink();?>">
				<div class="col-sm-4">
                	<div class="overlay">
                	</div>
                	<div class="fastighet_img"><?php the_post_thumbnail(); ?></div>
                	<div class="captext3">
				
				<div class="title"> <?php the_title(); ?></div>
				<?php the_content(); ?>
				<?php the_field(''); ?>
				</div>
				</div>
				</a>
			<?php } 
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata(); ?>

		<?php /*foreach($series as $s)
		{
			 $term_link = get_term_link( $s );
 ?>
 
                <a href="<?php echo  esc_url( $term_link ); ?>">
                	<div class="col-sm-4">
                    	<div class="overlay">
                        	<div class="price_tag">$ <?php  the_field('properties_price',$s); ?></div>
                        </div>
                    	<div class="captext3">
                        	<span><img src="<?php bloginfo('template_directory');?>/images/tag_pic.png" alt=""></span>
                            <div class="title"><?php echo $s->name; ?></div>
                            <p><?php echo $s->description; ?></p>
                            <div class="red_text"><?php  the_field('properties_area',$s); ?></div>
                            <div class="bold_text"><?php  the_field('properties_address',$s); ?></div>
                        </div>
                    	<span><img src="<?php  the_field('image',$s); ?>" alt=""></span>
                    </div>
                   </a>
    <?php } ?>
    */ ?>

				   <div class="clearfix">        
				   	<ul class="pagination">
				    <?php 
					echo paginate_links( array(
						'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'  => '?paged=%#%',
						'current' => $paged,
						'prev_text'     => '<<',
				        'next_text'     => '>>',
						'total'   => ceil( $number_of_series / $per_page ) // 3 items per page
					) );
				 ?>    
				 </ul>
				 </div>  
 <?php } else{
 	global $wpdb;
		$searchproperties = $_GET['searchproperties'];
		
		  $result = $wpdb->get_results("SELECT * FROM  `wp_terms` WHERE  `name` LIKE  '%$searchproperties%'");
				$total = count($result);
				$post_per_page =6;
				$page  = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
			    $offset         = ( $page * $post_per_page ) - $post_per_page;
		$result2 = $wpdb->get_results("SELECT * FROM  `wp_terms` WHERE  `name` LIKE  '%$searchproperties%' LIMIT ".$offset.", ".$post_per_page." ");
		        $totalPage         = ceil($total / $post_per_page);
				  
		foreach ($result2 as $value) {
			$serach_term_ids = $value->term_id;
		    $category = get_term_by('id', $serach_term_ids, 'propertiycat');
			 $term_link = get_term_link( $category );
?>
 
            <a href="<?php echo  esc_url( $term_link ); ?>">
                	<div class="col-sm-4">
                    	<div class="overlay">
                        	<div class="price_tag">$ <?php  the_field('properties_price',$category); ?></div>
                        </div>
                    	<div class="captext3">
                        	<span><img src="<?php bloginfo('template_directory');?>/images/tag_pic.png" alt=""></span>
                            <div class="title"><?php echo $value->name; ?></div>
                            <p><?php echo $category->description; ?></p>
                            <div class="red_text"><?php  echo  get_field('properties_area', $category); ?></div>
                            <div class="bold_text"><?php  echo get_field('properties_address',$category); ?></div>
                        </div>
                    	<span><img src="<?php  echo get_field('image',$category); ?>" alt=""></span>
                    </div>
                   </a>
                   
	<?php 
	}
?>
				   
<?php 
				if($totalPage > 1){
				$customPagHTML     =  '<div>'.paginate_links( array(   
				'base' => add_query_arg( 'cpage', '%#%' ),
				'total' => $totalPage,
				'current' => max( 1, $_GET['cpage'] ),
				'prev_text'     => '<<',
				        'next_text'     => '>>',
				
				)).'</div>';
				}
//echo $customPagHTML;
			    echo '<div class="clearfix">        
				   	<ul class="pagination">';
			            echo $customPagHTML;
			   echo ' </ul>
				 </div>  ';
	 }
	?>

       </div>

    </div>
  
</div>
<!--btm slider end-->
</div>


<?php get_footer(); ?>
