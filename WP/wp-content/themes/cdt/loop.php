<div class="clearfix"></div>
<?php $i = 0; if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php

	///$sub = ret_subtitle();
	if(strlen($sub) > 250){
	 $sub = substr ($sub , 0, 250) . " ... ";
	}

			if( $i%2 == 0 ) {
			?>
<div class="row category-row">
	 <div class="left txttag anim-to">
		<div class="description">
			<h3><?php the_title(); ?></h3>
			<p>
				<?php	print $sub; ?>
			</p>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-primary" >Read more</a>
		</div>
	 </div>
	 <div class="right imgtag anim-to">
			 <?php the_post_thumbnail('archive', array('class' => 'full-image')); ?>
	 </div>
</div>

			<?php
			} else {
			?>
			<div class="row category-row">
		    <div class="left imgtag anim-to">
		       <?php the_post_thumbnail('archive', array('class' => 'full-image')); ?>
		    </div>
		    <div class="right txttag anim-to">
		     <div class="description">
					 <h3><?php the_title(); ?></h3>
					 <p>
		 			   	<?php	print $sub; ?>
		 			 </p>
					 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-primary" >Read more</a>
		     </div>
		    </div>
		  </div>
			<?php
			}
$i++;
endwhile;
endif;
?>
