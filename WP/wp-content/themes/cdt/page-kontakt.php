<?php get_header(); ?>
<?php get_header("map"); ?>

<section id="content" class="article">
  <div class="container kontakt">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1><?php the_title(); ?></h1>
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
    </div> <!-- END OF ROW -->
  
  
  
<style>
.item-contact h3 {
    margin-top: 10px;
    font-size: 16px!important;
}

.container.kontakt .btn-circle {
    width: 146px!important;
    height: 33px!important;
    font-size: 15px!important;
}

.container.kontakt p {
    margin-top: 0!important;
}
.article p {
    font-size: 15px!important;
    line-height: 18px!important;
    padding: 4px 0;
    text-align: center!important;
}
.ajax-loader {
	width: 15px!important;
}

.wpcf7-textarea{
		height:150px!important;
		overflow:hidden;
}

.fa-ul> li {
	    margin-bottom: 11px;
}
</style>


  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-body">
            <h1><?php _e("Konflikt interesa – CDT", "cdt"); ?></h1>
			<br/>
		<br/>
	    <br/>
		<div class="wpb_wrapper" style="text-align: left">
			<ul class="fa-ul">
			<li><i class="fa fa-map-marker"></i>&nbsp; &nbsp;dr. Vukašina Markovića bb, 81 000 Podgorica, Crna Gora</li>
			<li><i class="fa fa-phone"></i>&nbsp; +382 20 234 522</li>
			<li><i class="fa fa-envelope-o"></i>&nbsp; <a href="mailto:cdtmn@t-com.me">cdtmn@t-com.me</a></li>
			</ul>
			<p>&nbsp;</p>
			<ul class="fa-ul">
			<li><i class="fa fa-map-marker"></i>&nbsp; &nbsp;Rimski Trg 10, 81 000 Podgorica, Crna Gora</li>
			<li><i class="fa fa-phone"></i>&nbsp; +382 20 234 522</li>
			<li><i class="fa fa-envelope-o"></i>&nbsp; <a href="mailto:infocentar@cdtmn.org">infocentar@cdtmn.org</a></li>
			</ul>

		</div>
<br/>


        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-default">
          <div class="panel-body">
		 
			<?php echo do_shortcode("[contact-form-7 id=\"10\" title=\"Contact form\" html_class=\"form-horizontal\"]"); ?>

        </div>
      </div>
    </div>

  </div>
  </div>
</section>

<?php get_footer(); ?>
