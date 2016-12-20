<?php
/**
 * Template Name: properties Inner
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<style type="text/css">

.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {
    
    // var
    var $markers = $el.find('.marker');
    
    
    // vars
    var args = {
        zoom        : 16,
        center      : new google.maps.LatLng(0, 0),
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    
    
    // create map               
    var map = new google.maps.Map( $el[0], args);
    
    
    // add a markers reference
    map.markers = [];
    
    
    // add markers
    $markers.each(function(){
        
        add_marker( $(this), map );
        
    });
    
    
    // center map
    center_map( map );
    
    
    // return
    return map;
    
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   $marker (jQuery element)
*  @param   map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
        position    : latlng,
        map         : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content     : $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

        });
    }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type    function
*  @date    8/11/2013
*  @since   5.0.0
*
*  @param   n/a
*  @return  n/a
*/
// global var
var map = null;

$(document).ready(function(){

    $('.acf-map').each(function(){

        // create map
        map = new_map( $(this) );

    });

});

})(jQuery);
</script>


<?php //echo get_the_ID(); 
    global $wp_query;
    $term = $wp_query->get_queried_object();
    $id = $term->term_id;

?>
<div class="content">

 <div class="slider_btm_part">   

    <div class="container">

        <div class="voluptas_area">
        	<div class="row">
            	<div class="col-md-9 col-sm-7">

                    <div class="slider_outter">
                    	<div class="slider_top">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            	<div class="carousel-inner">
                            		
                            		<?php $event_query = new WP_Query(array('post_type'  => 'fastighet', 'posts_per_page' => '-1','order'=> 'DESC'));
                                     $c=1;
                                     while ( $event_query->have_posts() ) : $event_query->the_post(); ?>  
                                    <div class="item <?php if($c==1){ echo 'active'; }?>">
                                    <div class="fastighet_name">
                                        <h2><?php the_field('fastighetsnamn'); ?></h2>
                                    </div>
                                       <div class="image-wrap">
                                        <div class="captext2">
                                            <span><?php the_title(); ?></span>
                                        </div>
                                        <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>           				
                                       <span><img src="<?php echo $image[0]; ?>" alt="" class="proimg"></span>
                                       </div>
                                       <div class="quea_area">
                            <h4>Interiör</h4>
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
                                       <div class="infoarea">
                                       <h4>Lägenhetstyper</h4>
                                       <?php the_field('lagenhetstyper'); ?>
                                       <h4>P-plats</h4>
                                       <?php the_field('p-plats'); ?>
                                        <h4>Hiss</h4> 
                                        <?php the_field('hiss'); ?>
                                        <h4>K-TV</h4> 
                                        <?php the_field('k-tv'); ?>  
                                        <h4>Bredband</h4> 
                                        <?php the_field('Telia'); ?>   
                                       </div>
                            <div class="maparea">
                            <h2>Lägenhetens placering</h2>
                            <?php 

                                $location = get_field('lagenhetens_placering');

                                if( !empty($location) ):
                                ?>
                                <div class="acf-map">
                                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                </div>
                            <?php endif; ?>
                                
                            </div>
                            
                                    </div>
                      <?php $c++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
                               </div>
                           </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-5">
 
                	<div class="nyheter">
                    	<div class="nyheter_hd">Våra andra fastigheter</div>
                    
						<div class="property_list content">
                        		<ul class="nav nav-pills nav-justified">
                        			<?php //echo get_the_ID(); 
									    global $wp_query;
									    $term = $wp_query->get_queried_object();
									    $id2 = $term->term_id;
									
									?>
                        			<?php $event_query = new WP_Query(array('post_type'  => 'fastighet', 'posts_per_page' => '-1','order'=> 'DESC'));
                                     $c=0;
                                     while ( $event_query->have_posts() ) : $event_query->the_post(); ?>               	
                                	<li  data-target="#myCarousel" data-slide-to="<?php echo $c; ?>" <?php if($c==0){ ?>class="active" <?php }?>>
                                    	<a href="<?php echo get_permalink(); ?>">
                                            <div class="property_cell">
                                                <div class="captext2">
                                                    <div class="title"><?php the_title(); ?></div>
                                                </div>
                                                <?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>           				
                                                <span><img src="<?php echo $image[0]; ?>" alt=""></span>
                                            </div>
                                        </a>
                                    </li>
<?php $c++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
                            	</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--slider btm part end-->
<?php get_footer(); ?>
