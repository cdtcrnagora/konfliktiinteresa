<section class="main-footer">
    <div class="container">
        <div class="row">
            <div id="rectangle"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer-back.png" alt="" class="footer-top-background">
            <div class="col-md-12 col-sm-12">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Logo.png" alt="logo" class="logo-footer anim-to full-visible"/>
          </div>
      </div>

        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
			   <?php if ( is_active_sidebar( 'footer-position-i' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-position-i' ); ?>
               <?php endif; ?>
            </div>
            <div class="col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-md-3 col-sm-12 col-xs-12">
				<h5 class="anim-to full-visible"><span><?php _e("Korisni linkovi", "cdt");?></span></h5>
                <div class="menu-footer anim-to full-visible">
					 <?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'container' => '',
							'menu_class'=> '',
							'walker'        => new FooterMenuWalker
						 ));
		
					?>
					<?php if ( is_active_sidebar( 'footer-position-ii' ) ) : ?>
							<?php dynamic_sidebar( 'footer-position-ii' ); ?>
					<?php endif; ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
			       <h5 class="anim-to full-visible"><span><?php _e("Kontakt Informacije", "cdt");?> </span></h5>
				   <div class="contact-footer">
						  <?php if ( is_active_sidebar( 'footer-position-iii' ) ) : ?>
								<?php dynamic_sidebar( 'footer-position-iii' ); ?>
						  <?php endif; ?>
				  </div>
            </div>


        </div>
    </div>

    <div class="container mainfooter">
        <div class="row">
            <div class="col-md-6 col-xs-6 anim-lo  ">


                <div class="custom-">
                    <p>&copy; <?php echo date("Y") ?> Centar za demokratsku tranziciju / All Rights Reserved</p>
                </div>

            </div>
            <div class="col-md-6 col-xs-6 text-right anim-ro  ">

				<!--
                <div class="custom-vendor">
                    <p>
                      <a class="bild" title="" href="https://www.facebook.com/armin.kardovic" target="_blank">Developed by</a>
                    </p>
                </div>
				-->
            </div>
        </div>
    </div>
</section>



<div id="mobile-menu-off" class="h-menu">
  <?php if ( has_nav_menu( 'main-menu' ) ) { ?>
       <?php wp_nav_menu( array('theme_location' => 'main-menu','container' => false)); ?>
  <?php } ?>
     <a href="#" class="btn btn-danger mm-title m-close" ><i class="fa fa-times"></i></a>
</div>
