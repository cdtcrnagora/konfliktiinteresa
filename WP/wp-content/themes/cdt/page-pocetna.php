<?php get_header(); ?>
<?php get_header("slider"); ?>

<?php
$posts = get_posts(array(
    'post_type' => 'politicar',
    'posts_per_page' => 3,
));

if ($posts) {

    $output = "<div class='wrapper-profils-home'><div class='container'><div class='row'><h1>" . __("Profili funkcionera", "cdn") . "</h1><div class='clearfx'></div>";
    foreach ($posts as $post) {
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        $image = get_the_post_thumbnail($post->ID, 'profile-list');
        $link = get_permalink($post->ID);

        $view = __('Pogledaj profil', 'cdt');

        $output .= "<div class='col-xs-12 col-sm-6 col-md-6 col-lg-4 item-holder'>
          <div class='team-thumbnail'>
            <a href='" . $link . "'>
              " . $image . "
              <div class='team-overlay'></div>
            </a>
            <ul class='team-networks'>
              <li>

              </li>
              <li>
                <a href='" . $link . "' title=' " . get_the_title($post->ID) . "'>
                  <i class='fa fa-search'></i>
                </a>
                <a href='" . $link . "' class='vprofile'>" . $view . "</a>
              </li>
              <li>

              </li>
            </ul>

          </div>

      </div>";
    }

	$output = $output . "</div>
			<a href=\"/imovinski-kartoni/\" class=\"pull-right\" style=\"padding: 15px;padding-top: 0px; text-decoration: none!important; :hover {color: #333333;}\">
					<h4 style='font-weight: 500; color: #FFF;'>Ostali profili <i class=\"fa fa-arrow-right\" aria-hidden=\"true\"></i></h4>
			</a></div></div> ";
    print $output;
}

?>

<div class="wrapper-news down-arrow">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h1 class="naslov-news"><?= __('Najnovije vijesti', 'cdt'); ?></h1>

                <?php
                $posts = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                ));
                $more = __('Više', 'cdt');
                if ($posts) {
                    foreach ($posts as $post) {
                        $image = get_the_post_thumbnail($post->ID, 'profile-list');
                        $link = get_permalink($post->ID);
                        ?>
                        <div class="item pull-left">
                            <div class="image-wrapper animated fadeIn">
                               <?= $image ?>
                            </div>
                            <div class="desc-item">
                                <div class="right-desc">
                                    <h1>
                                        <a href="<?= $link; ?>"><?php print get_the_title($post->ID) ?></a>
                                    </h1>

                                    <p class="text">
                                        <?php
										$field = get_field("subtitle", $post->ID);
                                        $content = (strlen($field) > 15) ? $field : $post->post_content;
                                        if (strlen($content) < 130) {
                                            print $content;
                                        } else {
                                            print substr($content, 0 , 130) . " ... ";
                                        }
                                        ?>
                                    </p></div>
                                <a href="<?= $link; ?>" class="btn btn-primary more"><?= $more ?></a>
                            </div>

                        </div>
                        <?php
                    }
                    $posts = false;
                }
                ?>

				<div class="item pull-left" style="width: 100%;">
					<a href="<?= get_category_link( 1 ); ?>" class="btn btn-primary more" style="transform: translateX(-50%);margin-left: 50%;">
						Ostale vijesti 
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
				<h1 class="naslov-news" style="Visibility: hidden;">Profili funkcionera</h1>
				<div class="center-h">
				<?php if ( is_active_sidebar( 'homepage-list-sec' ) ) : ?>
					<?php dynamic_sidebar( 'homepage-list-sec' ); ?>
				<?php endif; ?>
				</div>
			</div>
        </div>
    </div>
</div>


<div class="wrapper-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
				<?php if ( is_active_sidebar( 'homepage-footer-i' ) ) : ?>
					<?php dynamic_sidebar( 'homepage-footer-i' ); ?>
				<?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-12">
				<?php if ( is_active_sidebar( 'homepage-footer-ii' ) ) : ?>
					<?php dynamic_sidebar( 'homepage-footer-ii' ); ?>
				<?php endif; ?>
			</div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
