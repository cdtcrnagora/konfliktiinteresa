<?php get_header(); ?>
<?php get_header("parallelax"); ?>


<section id="content" class="article">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1><?php  
		  $title = get_field( "custom_title" );
		  if ($title == false || $title ==  "") {
			  the_title(); 
		  } else {
			  print $title;
		  }
		  ?></h1>
        </div>
		</div>
		</div>
		
		
		
<div class="row">
     <div class="col-md-9 col-sm-9 col-xs-12">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<!-- article -->
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="feature-image-post">
							<div class="date-post">
								 <?php the_time('d'); ?>
								<span><?php the_time('M'); ?></span>
							</div>
							
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
							  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							  <img src="<?php echo $image[0]; ?>" class="" alt="cdt" style="width: 100%;">
						<?php endif; ?>

						
						</div>
						<?php the_content(); ?>
						<br class="clear">
						<?php edit_post_link(); ?>
					</div>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>
					<div>
						<h2><?php _e( 'Sorry, nothing to display.', 'cdt' ); ?></h2>
					</div>
				<?php endif; ?>
		<div class="social-share">
              <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print get_permalink();?>">
                <div class="share fb">
                  <i class="fa fa-facebook"></i>
                </div>
              </a>
              <a href="https://twitter.com/intent/tweet?text=<?php print get_permalink();?>">
                <div class="share tw">
                  <i class="fa fa-twitter"></i>
                </div>
              </a>
              <a href="https://plus.google.com/share?url=<?php print get_permalink();?>">
                <div class="share gp">
                  <i class="fa fa-google-plus"></i>
                </div>
              </a>
       </div>
	 </div>
	 
	 <div class="col-md-3 col-sm-3 col-xs-12">
	    <?php
			wp_nav_menu( array(
				'theme_location' => 'sidebar-menu',
				'container' => '',
				'menu_class'=> 'list-group',
				'walker'        => new SidebarMenuWalker
			 ));
		
		?>
	  	<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
				 <?php dynamic_sidebar( 'sidebar-page' ); ?>
			<?php endif; ?>
	 </div>
</div>
				

  </div>
</section>

<?php get_footer(); ?>
