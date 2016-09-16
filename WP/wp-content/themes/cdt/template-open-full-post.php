<?php
/*
WP Post Template: Open Full Single
Description: This part is optional, but helpful for describing the Post Template
*/
?>

<?php get_header(); ?>
<?php get_header("openfull"); ?>


<section id="content" class="article">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1 id="head-start"><?php 
		  
		  $title = get_field( "custom_title" );
		  //var_dump($title);
		  if ($title == false || $title ==  "") {
			  the_title(); 
		  } else {
			  print $title;
		  }
		  
		  ?></h1>
		  
        </div>

	


	
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<!-- article -->
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
						<?php //comments_template( '', true ); // Remove if you don't want comments ?>
						<br class="clear">
						<?php edit_post_link(); ?>
					</div>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>
					<div>
						<h2><?php _e( 'Sorry, nothing to display.', 'budva' ); ?></h2>
					</div>
				<?php endif; ?>



  </div>
</section>



<?php get_footer(); ?>

