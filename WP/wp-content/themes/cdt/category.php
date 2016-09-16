<?php get_header(); ?>
<?php get_header("parallelax"); ?>


<section id="content" class="article">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Vijesti</h1>
        </div>
		</div>
		</div>
			
<div class="row">
     <div class="col-md-9 col-sm-9 col-xs-12">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : the_post(); ?> 
			
			<div class="blog__post row anim-to">

			<div class="col-md-8 col-xs-12 layout-golden--one__left">
				<?php
					 $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array(620,300) );
					 $url = isset($thumbnail[0]) ? $thumbnail[0] : "";
				?>
				<img itemprop="image" src="<?= $url; ?>" class="img-responsive blog__post__image" alt="<?php the_title(); ?>">
			</div> <!-- layout left end -->

			<div class="col-md-4 col-xs-12 layout-golden--one__right" style="visibility: visible; ">
				<div class="blog__post__right">
					<div class="blog-post__meta">
						<span class="post-meta__time">
							<time class="entry-date published"><?php the_time('l, F jS, Y') ?></time>
						</span>
					</div>
					<header class="entry-header">
						<h3 itemprop="headline" class="entry-title">
							<a href="<?= get_permalink(get_the_ID()); ?>" class="element-title element-title--post" rel="bookmark" itemprop="name"><?php the_title(); ?></a>
						</h3>
					</header><!-- .entry-header -->
					<div class="blog__post__excerpt" itemprop="description">
					   <p>
						 <?php
										$field = get_field("subtitle");
                                        $content = (strlen($field) > 15) ? $field : strip_tags(get_the_content());
                                        if (strlen($content) < 130) {
                                            print $content;
                                        } else {
                                            print substr($content, 0 , 130) . " ... ";
                                        }
                          ?>
					   </p>
					</div><!-- .blog__post__excerpt -->

					
				</div><!-- Blog Post right end -->
			</div><!-- layout right end -->
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		</main><!-- #main -->
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

