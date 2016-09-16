<?php

/*
Plugin Name: Politicari zadnji dodati
Plugin URI: https://www.facebook.com/armin.kardovic
Description:Politicari zadnji dodati
Author: Armin Kardovic
Version: 1.00
Author URI: https://www.facebook.com/armin.kardovic
*/

class Politicari_Widget extends WP_Widget
{

    // widget constructor
    public function __construct()
    {
        parent::__construct(
            'politicari_widget',
            __('Politicari zadnji dodati', 'politicari_widget'),
            array(
                'classname' => 'politicari_widget',
                'description' => __('Politicari zadnji dodati', 'politicari_widget')
            )
        );
    }

    public function widget($args, $instance)
    {
        extract($args);
		
         $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => $instance['num']
        ));
		
		$reportList = array(
			"general"=>__("Generalne Informacije","cdt"),
            "avg_mont_incomme"=>__("Prosječna mjesečna primanja","cdt"),
            "property"=>__("Nepokretna imovina","cdt"),
            "property_muvables"=>__("Pokretna imovina","cdt"),
            "securities"=>__("Vlasništvo u privrednim društvima","cdt"),
            "loans"=>__("Krediti","cdt")
		);
		
		 $url = site_url() . "/wp-admin/admin.php?page=download_report&";
		
		?>
		<div class="page-header">
			<h3><?= __("Preuzmi bazu u CSV", "cdt");?></h3>
		</div>
		<div class="well center-block" > 
			<?php
				 foreach($reportList as $key=>$val) {
					print "<a href=\"{$url}{$key}\"class=\"btn btn-primary btn-lg btn-block more\" style=\"padding: 10px 30px; margin-bottom: 10px; font-size: 12px; \" >{$val}</a>";
				}
			?>
		</div>
		
		<div class="page-header">
			<h3>Ostali funkcioneri</h3>
		</div>
		
		<?php
		if ($posts) {
            foreach ($posts as $post) {
				
				$url_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'profile-list' );
                $link = get_permalink($post->ID);

				$title = get_the_title($post->ID);
             ?>
			 
			 <div class="row">
					 <div class="col-md-6">
						<a href ="<?= $link; ?>">
							<img src="<?= $url_img; ?>" class="img-thumbnail" alt="<?= $title ?>" >
						</a>
					 </div>
					 <div class="col-md-6">
						<h4><?= $title ?></h4>
						
						<a href="<?= $link ?>" class="btn btn-primary btn-block more" style="padding: 3px;"><?php print __("Pogledaj Profil", "cdt"); ?></a>
					 </div>
			 </div>

			 <?php
            }
        }
    }

    public function form($instance)
    {

        $defaults = array(
            'num' => __('4', 'politicari_widget')
        );
        $instance = wp_parse_args((array)$instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('num'); ?>"><?php _e('Number:', 'politicari_widget'); ?></label>
            <input id="<?php echo $this->get_field_id('num'); ?>"
                   name="<?php echo $this->get_field_name('num'); ?>"
                   value="<?php echo $instance['num']; ?>"
                   style="width:100%;"/>
            <br/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
      
        $instance['num'] = strip_tags($new_instance['num']);

        return $instance;
    }

}

add_action('widgets_init', function () {
    register_widget('Politicari_Widget');
});
