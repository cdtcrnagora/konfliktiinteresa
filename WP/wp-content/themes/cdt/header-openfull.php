<section id="header" class="open">
  	 <?php the_post_thumbnail('full'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 gradient">
        <div class="content-header">
          <div class="breadcrumbs">
            <ul>
              <?php if(function_exists('bcn_display'))
              {
                  bcn_display_list();
              }?>
            </ul>
          </div>
          <div class="description">
            <h1>
              <?php the_title(); ?>
            </h1>
            <p>
              <?php the_subtitle(); ?>
            </p>
            <a href="#head-start" class="goto">
              Start reading
              <i class="fa fa-chevron-down"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-7"></div>
    </div>
</section>
