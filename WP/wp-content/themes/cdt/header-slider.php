<section class="slider">
    <div class="slider-content">
<?php
$args = array(
    'post_type' => 'slider',
    'order' => 'ASC'
);
/*
$args['tax_query'] = array(
        array(
            'taxonomy' => 'filiale', // Ovdje stavi tvoj tip sa sajta
            'field' => 'id',
            'terms' => 7
        )
);
*/

$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
  while ($the_query->have_posts()) : $the_query->the_post();
  ?>
      <div>
         <?php
         $image = "";
          if (has_post_thumbnail( $post->ID ) ) {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
              if(isset($image[0])){
                $image = $image[0];
              }
          }

         ?>
          <div class="wrap-image" style="background-image: url('<?php print $image; ?>');">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="wrap-content">
                              <h1 class="anim-ro showed full-visible"><?php  the_title(); ?></h1>
                              <p class="anim-lo showed full-visible"><?php print get_field("subtext"); ?></p>
                              <div class="read-more anim-to showed full-visible">
                                  <a class="hvr-sweep-to-right" href="<?php print get_field("link"); ?>" tabindex="-1"><?php _e( 'Više', 'cdt' );  ?> <i class="fa fa-angle-right"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <?php
  endwhile;
}
wp_reset_query();
?>



</div>
<div class="container" style="top: 0px!important">
  <div class="row">
	  <div class="col-md-12">
			<div class="slider-arrows"><div class="wrapper"></div></div>
	  </div>
  </div>
</div>
</section>
