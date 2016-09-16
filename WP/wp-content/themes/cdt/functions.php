<?php

function register_themes_menu()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu', 'budva')
        )
    );
}

add_action('init', 'register_themes_menu');

function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes = array('active ');
    } else {
        $classes = array();
    }
    return $classes;
}


class Class_Name_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item Menu item data object.
     * @param  int $depth Depth of menu item. May be used for padding.
     * @param  array $args Additional strings.
     * @return void
     */

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'hvr-underline-from-center menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="hvr-underline-from-center  ' . esc_attr($class_names) . '"' : 'class="hvr-underline-from-center "';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . $class_names . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * @see Walker::end_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Page data object. Not used.
     * @param int $depth Depth of page. Not Used.
     */
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}


class SidebarMenuWalker extends Walker_Nav_Menu
{

    var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );
 
    function start_lvl(&$output, $depth=0, $args=array()) {
        $output .= "<div class='list-group'>";
    }
 
    function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</div>\n";
    }

    function start_el(&$output, $item, $depth=0, $args=array()) {

		$url = get_permalink($item);
        $output .= "<a class='list-group-item' href='" . $url . "'>" . esc_attr($item->post_title);
    }
 
    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</a>\n";
    }
}


class FooterMenuWalker extends Walker_Nav_Menu
{

    var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );

    function start_el(&$output, $item, $depth=0, $args=array()) {

		$url = get_permalink($item);
        $output .= "<li><a class='hvr-underline-from-center' href='" . $url . "'>" . esc_attr($item->post_title);
    }
 
    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</a></li>\n";
    }
}


add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function cdt_widgets_init()
{
	
	register_sidebar(array(
        'name' => __('Funkcioner', 'cdt'),
        'id' => 'funkcioner-single',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "",
        'after_title' => "",
    ));
	
    register_sidebar(array(
        'name' => __('Footer position II', 'cdt'),
        'id' => 'footer-position-ii',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "<h5 class=\"module-title anim-to full-visible\"><span>",
        'after_title' => "</span></h5>",
    ));

    register_sidebar(array(
        'name' => __('Homepage list', 'cdt'),
        'id' => 'homepage-list',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "",
        'after_title' => "",
    ));

    register_sidebar(array(
        'name' => __('Homepage Footer I', 'cdt'),
        'id' => 'homepage-footer-i',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "",
        'after_title' => "",
    ));

    register_sidebar(array(
        'name' => __('Homepage Footer II', 'cdt'),
        'id' => 'homepage-footer-ii',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "",
        'after_title' => "",
    ));

    register_sidebar(array(
        'name' => __('Homepage list second', 'cdt'),
        'id' => 'homepage-list-sec',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "",
        'after_title' => "",
    ));

    register_sidebar(array(
        'name' => __('Footer position I', 'cdt'),
        'id' => 'footer-position-i',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "<h5 class=\"module-title anim-to full-visible\"><span>",
        'after_title' => "</span></h5>",
    ));

    register_sidebar(array(
        'name' => __('Footer position III', 'cdt'),
        'id' => 'footer-position-iii',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "<h5 class=\"module-title anim-to full-visible\"><span>",
        'after_title' => "</span></h5>",
    ));

    register_sidebar(array(
        'name' => __('Footer position IV', 'cdt'),
        'id' => 'footer-position-iv',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "<h5 class=\"module-title anim-to full-visible\"><span>",
        'after_title' => "</span></h5>",
    ));

    register_sidebar(array(
        'name' => __('Sidebar', 'cdt'),
        'id' => 'sidebar-page',
        'before_widget' => "",
        'after_widget' => "",
        'class' => "",
        'before_title' => "<h2 class=\"module-title anim-to full-visible\"><span>",
        'after_title' => "</span></h2>",
    ));
}

add_action('widgets_init', 'cdt_widgets_init');

function budva_widget_content_wrap($content)
{
    $content = "<div class=\"module-content anim-to full-visible\"><div class=\"custom-\">" . $content . "</div></div>";
    return $content;
}

add_filter('widget_text', 'budva_widget_content_wrap');


if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size('archive', 950, 400); //300 pixels wide (and unlimited height)
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);

    }
}


add_image_size('profile-list', 335, 220, true);

if (function_exists('vc_map')) {

    vc_map(array(
        "name" => esc_html__("Profili politicara", "cdt"),
        "base" => "vc_portfolio_itemsx",
        "icon" => "icon-vc-pego",
        "category" => esc_html__('Content', 'cdt'),
        "params" => array()
    ));

    vc_map(array(
        "name" => esc_html__("Analiticki prikaz", "cdt"),
        "base" => "vc_analiticki_prikaz",
        "icon" => "icon-vc-pego",
        "category" => esc_html__('Content', 'cdt'),
        "params" => array()
    ));

    vc_map(array(
        "name" => esc_html__("Export Podataka", "cdt"),
        "base" => "vc_export_podataka",
        "icon" => "icon-vc-pego",
        "category" => esc_html__('Content', 'cdt'),
        "params" => array()
    ));


    function portfolio_itemsx_sh($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'number_of_items' => '-1', 'flag_text' => '', 'first_item' => ''), $atts));


//$args = array('post_type'=> 'politicar', 'posts_per_page' => -1, 'order'=> 'ASC');
//$posts = get_posts($args);

        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $output = "";
            foreach ($posts as $post) {

                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

                $image = get_the_post_thumbnail($post->ID, 'profile-list');
				
				if(strlen(trim($image)) < 10) {
					$url = get_template_directory_uri() . "/images/avatar.png";
					$image = '<img width="335" height="213" src="' . $url . '" class="attachment-profile-list size-profile-list wp-post-image" alt="GetImage" />';
				}
				
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

          <div class='team-desc' itemscope='itemscope' itemtype='https://schema.org/Person'>
              <a class='team-member-name' href='#'>
                <a href='" . $link . "' style='text-decoration:none;'><span class='team-member-name'>
                  " . get_the_title($post->ID) . " </span></a>
                
              </a>
          </div>
      </div>";
            }
        }

        return $output;
    }


    function analiticki_prikaz_sh($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'number_of_items' => '-1', 'flag_text' => '', 'first_item' => ''), $atts));

        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {

            $translated_text = __("Funkcioneri", "cdt");


            $politicari = array();
            $years = array();
            foreach ($posts as $post) {

                $data_pol = get_field("prosjecna_mjesecna_primanja", $post->ID);
                if (!is_array($data_pol)) $data_pol = array();

                $godine = array();

                foreach ($data_pol as $year_data) {
                    $year_d = isset($year_data['godina']) ? $year_data['godina'] : "";
                    $value_d = isset($year_data['prihod']) ? @number_format($year_data['prihod']) : "";
                    $years[] = $year_d;
                    $godine[$year_d] = $value_d;
                }

                if (is_array($godine)) ksort($godine);

                $politicari[$post->ID] = array("ime" => get_the_title($post->ID), "url" => get_permalink($post->ID), "years" => $godine);
            }

            asort($years);
            $years = array_unique($years);
            $column_count = count($years) + 1;


            $output = "<table class=\"tablesorter-bootstrap responsive\">
                <thead>
                <tr class=\"dark-row hidden-sm hidden-xs\">
                    <th colspan=\"{$column_count}\" class=\"sorter-false\">
                        <h2>{$translated_text}</h2>
                    </th>
                </tr>";


            $output .= "<tr>";

            $output .= "<th class=\"ime-reduce\">" . __("Prezime i ime", "cdt") . "</th>";
            foreach ($years as $key => $val) {
                $output .= "<th data-sorter=\"true\" data-filter=\"true\" >{$val}</th>";
            }
            $output .= "</tr></thead>";

            $output .= "<tfoot>";
            $output .= "<tr>";

            $output .= "<th class=\"ime-reduce\" >Prezime i ime</th>";
            foreach ($years as $key => $val) {
                $output .= "<th>{$val}</th>";
            }


            $output .= "</tr>
                <tr class=\"dark-row hidden-sm hidden-xs \">
                    <th colspan=\"{$column_count}\">
                        <div id=\"tab-sort-pager\" class=\"pager\">
							<button type=\"button\" class=\"first btn btn-primary more \">&lt;&lt;</button>
                            <button type=\"button\" class=\"prev btn btn-primary more \">&lt;</button>
                            <span class=\"pagedisplay\"></span>
                            <button type=\"button\" class=\"next btn btn-primary more \">&gt;</button>
                            <button type=\"button\" class=\"last btn btn-primary more \">&gt;&gt;</button>
                            <select class=\"pagesize\" title=\"Select page size\" style=\"padding: 10px;\">
                                <option value=\"10\">10</option>
                                <option value=\"20\">20</option>
                                <option value=\"30\">30</option>
                                <option value=\"40\">40</option>
                            </select>
							<select class=\"gotoPage\" title=\"Select page number\" style=\"padding: 10px;\" ></select>
                        </div>
                    </th>
                </tr>
                </tfoot>";

            $output .= "<tbody>";
            foreach ($politicari as $politicar) {
                $ime = isset($politicar["ime"]) ? $politicar["ime"] : "";
                $url = isset($politicar["url"]) ? $politicar["url"] : "#";
                $output .= "<tr>";

                $output .= "<td><a href='{$url}'>{$ime}</a></td>";

                foreach ($years as $year) {
                    $y = isset($politicar['years'][$year]) ? $politicar['years'][$year] : "0";
                    $output .= "<td>{$y}</td>";
                }

                $output .= "</tr>";
            }
            $output .= "</tbody>";

            $output .= "</tbody></table>";
        }


        return $output;
    }

    function export_podataka_sh($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'number_of_items' => '-1', 'flag_text' => '', 'first_item' => ''), $atts));
        $output = "";
        $url = site_url() . "/wp-admin/admin.php?page=download_report&";
        $reportList = array(
            "general"=>__("Generalne Informacije","cdt"),
            "avg_mont_incomme"=>__("Prosječna mjesečna primanja","cdt"),
            "property"=>__("Nepokretna imovina","cdt"),
            "property_muvables"=>__("Pokretna imovina","cdt"),
            "securities"=>__("Vlasništvo u privrednim društvima","cdt"),
            "loans"=>__("Krediti","cdt")
        );

        $output .= "<div class=\"well center-block\"><div class='row'>";

        foreach($reportList as $key=>$val) {
            $output .="
                <div class='col-md-4 col-sm-6 col-xs-12'>
                    <a href=\"{$url}{$key}\"class=\"btn btn-primary btn-lg btn-block more\" style=\"padding: 10px 30px; margin-bottom: 10px;\">{$val}</a>
                </div>";
        }

        $output .="</div></div>";

        return $output;
    }


    add_shortcode('vc_portfolio_itemsx', 'portfolio_itemsx_sh');
    add_shortcode('vc_analiticki_prikaz', 'analiticki_prikaz_sh');
    add_shortcode('vc_export_podataka', 'export_podataka_sh');

}

/*********************************** NJEGOVO **********************************/

class CSVExport
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $keys = array_keys($_GET);
        $result = !empty(array_intersect($keys, $this->query_vars(array())));

        if (count($result) > 0 && $result != false) {
            $csv = "";
            $name = "nodata.csv";

            if (isset($_GET['general'])) {
                $csv = $this->generate_GeneralInfo();
                $name = "General.csv";
            }

            if (isset($_GET['avg_mont_incomme'])) {
                $csv = $this->generate_AvgMonthIncome();
                $name = "AvgMonthIncome.csv";
            }

            if (isset($_GET['property'])) {
                $csv = $this->generate_Property();
                $name = "Property.csv";
            }

            if (isset($_GET['property_muvables'])) {
                $csv = $this->generate_PropertyPokretna();
                $name = "PropertyChattel.csv";
            }

            if (isset($_GET['loans'])) {
                $csv = $this->generate_loans();
                $name = "Loans.csv";
            }

            if (isset($_GET['securities'])) {
                $csv = $this->generate_securitas();
                $name = "Securities.csv";
            }

            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false);
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"{$name}\";");
            header("Content-Transfer-Encoding: binary");

            echo $csv;
            exit;
        }

        // Add extra menu items for admins
        //@add_action('admin_menu', array($this, 'admin_menu'));

        // Create end-points
        add_filter('query_vars', array($this, 'query_vars'));

    }

    /**
     * Allow for custom query variables
     */
    public function query_vars($query_vars)
    {
        $query_vars[] = 'avg_mont_incomme';
        $query_vars[] = 'property';
        $query_vars[] = 'general';
        $query_vars[] = 'property_muvables';

        $query_vars[] = 'loans';
        $query_vars[] = 'securities';
        return $query_vars;
    }

    /**
     * Converting data to CSV
     */
    public function generate_AvgMonthIncome()
    {
        $data = $this->getAvgMonthIncome();
        return $this->generateCsv($data);
    }

    function getAvgMonthIncome()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $data_pol = get_field("prosjecna_mjesecna_primanja", $post->ID);
                if (!is_array($data_pol)) $data_pol = array();

                $name = get_the_title($post->ID);

                foreach ($data_pol as $year_data) {
                    $year_d = isset($year_data['godina']) ? $year_data['godina'] : "";
                    $value_d = isset($year_data['prihod']) ? $year_data['prihod'] : "";
                    $tmp = array("id" => $post->ID, "slug" => $post->post_name, "fullName" => $name, "year" => $year_d, "avgMontIncomme" => $value_d);
                    $return[] = $tmp;
                }
            }
            return $return;
        }
        return array();
    }

    /**
     * Converting data to CSV
     */
    public function generate_Property()
    {
        $data = $this->getProperty();
        return $this->generateCsv($data);
    }

    function getProperty()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $name = get_the_title($post->ID);

                $data_f = get_field("nepokretna_imovina", $post->ID);
                if (!is_array($data_f)) $data_f = array();

                $data_l = get_field("nepokretna_imovina_z", $post->ID);
                if (!is_array($data_l)) $data_l = array();


                $od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od", $post->ID));
                if ($od != false) {
                    $od = $od->format('Y');
                }

                $do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do", $post->ID));
                if ($do != false) {
                    $do = $do->format('Y');
                }

                foreach ($data_f as $property) {
                    $vrsta_imovine = isset($property['vrsta_imovine']) ? $property['vrsta_imovine'] : "NA";
                    $povrsina_m2 = isset($property['povrsina_m2']) ? $property['povrsina_m2'] : "NA";
                    $mjesto = isset($property['mjesto']) ? $property['mjesto'] : "NA";
                    $udio = isset($property['udio']) ? $property['udio'] : "NA";
                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $od,
                        "propertyType" => $vrsta_imovine,
                        "place" => $mjesto,
                        "area_m2" => $povrsina_m2,
                        "share" => $udio
                    );
                    $return[] = $tmp;
                }

                foreach ($data_l as $property) {

                    $vrsta_imovine = isset($property['vrsta_imovine']) ? $property['vrsta_imovine'] : "NA";
                    $povrsina_m2 = isset($property['povrsina_m2']) ? $property['povrsina_m2'] : "NA";
                    $mjesto = isset($property['mjesto']) ? $property['mjesto'] : "NA";
                    $udio = isset($property['udio']) ? $property['udio'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $do,
                        "propertyType" => $vrsta_imovine,
                        "place" => $mjesto,
                        "area_m2" => $povrsina_m2,
                        "share" => $udio
                    );
                    $return[] = $tmp;
                }
            }
            return $return;
        }
        return array();
    }


    /**
     * Converting data to CSV
     */
    public function generate_PropertyPokretna()
    {
        $data = $this->getPropertyPokretna();
        return $this->generateCsv($data);
    }

    function getPropertyPokretna()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $name = get_the_title($post->ID);

                $data_f = get_field("pokretna_imovina", $post->ID);
                if (!is_array($data_f)) $data_f = array();

                $data_l = get_field("pokretna_imovina_z", $post->ID);
                if (!is_array($data_l)) $data_l = array();


                $od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od", $post->ID));
                if ($od != false) {
                    $od = $od->format('Y');
                }

                $do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do", $post->ID));
                if ($do != false) {
                    $do = $do->format('Y');
                }

                foreach ($data_f as $property) {
                    $vrsta_imovine = isset($property['vrsta_imovine']) ? $property['vrsta_imovine'] : "NA";
                    $godina_proizvodnje = isset($property['godina_proizvodnje']) ? $property['godina_proizvodnje'] : "NA";
                    $vk = isset($property['vrijednost_kolicina']) ? $property['vrijednost_kolicina'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $od,
                        "propertyType" => $vrsta_imovine,
                        "production_year" => $godina_proizvodnje,
                        "worth" => $vk,

                    );
                    $return[] = $tmp;
                }

                foreach ($data_l as $property) {
                    $vrsta_imovine = isset($property['vrsta_imovine']) ? $property['vrsta_imovine'] : "NA";
                    $godina_proizvodnje = isset($property['godina_proizvodnje']) ? $property['godina_proizvodnje'] : "NA";
                    $vk = isset($property['vrijednost_kolicina']) ? $property['vrijednost_kolicina'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $do,
                        "propertyType" => $vrsta_imovine,
                        "production_year" => $godina_proizvodnje,
                        "worth" => $vk,

                    );
                    $return[] = $tmp;
                }
            }
            return $return;
        }
        return array();
    }


    public function generate_GeneralInfo()
    {
        $data = $this->getGeneralInfo();
        return $this->generateCsv($data);
    }


    function getGeneralInfo()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $name = get_the_title($post->ID);

                $od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od", $post->ID));
                if ($od != false) {
                    $od = $od->format('Y');
                }
                $od = ($od == false || $od == "") ? "NA" : $od;
				$pocetna = get_field("poceo_u_godini", $post->ID);
				$od = (strlen($pocetna) > 3) ? $pocetna : $od;

                $do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do", $post->ID));
                if ($do != false) {
                    $do = $do->format('Y');
                }
				
                $do = ($do == false || $do == "") ? "NA" : $do;
				$do = (get_field("trenutno_na_funkciji", $post->ID) == "da") ? __("now", "cdt") : $do;

                $funkcija = get_field("funkcija", $post->ID);
                $funkcija = ($funkcija == "") ? "NA": $funkcija;

                $mjesecna = get_field("prosjecna_mjesecna_primanja_u_periodu_obavljanja_funkcije", $post->ID);
                $mjesecna = ($mjesecna == "") ? "NA": $mjesecna;

                $godisnja = get_field("prosjecna_godisnja_primanja_u_periodu_obavljanja_funkcije", $post->ID);
                $godisnja = ($godisnja == "") ? "NA": $godisnja;

                $data_f = get_field("ostale_javne_funkcije", $post->ID);
                if (!is_array($data_f)) $data_f = array();

                $data_f = array_map(function ($val){
                        return isset($val['funkcija']) ? $val['funkcija'] : "NA";
                }, $data_f);

                $data_f = (count($data_f) < 1) ? "NA": implode('; ', $data_f);

                $return[] = array(
                    "id" => $post->ID,
                    "slug" => $post->post_name,
                    "fullName" => $name,

                    "mainFunction" => $funkcija,
                    "secondFunction" => $data_f,

                    "startMainFunction" => $od,
                    "endMainFunction" => $do,
                    "averageAnnualMonthIncome" => $mjesecna,
                    "averageAnnualIncome" => $godisnja,
                );
            }
            return $return;
        }
        return array();
    }

    public function generate_loans()
    {
        $data = $this->getLoans();
        return $this->generateCsv($data);
    }

    function getLoans()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $name = get_the_title($post->ID);

                $data_f = get_field("kredit", $post->ID);
                if (!is_array($data_f)) $data_f = array();

                $data_l = get_field("kredit_z", $post->ID);
                if (!is_array($data_l)) $data_l = array();


                $od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od", $post->ID));
                if ($od != false) {
                    $od = $od->format('Y');
                }

                $do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do", $post->ID));
                if ($do != false) {
                    $do = $do->format('Y');
                }

                foreach ($data_f as $property) {
                    $bank = isset($property['banka']) ? $property['banka'] : "NA";
                    $ukupna_vrijednost = isset($property['ukupna_vrijednost']) ? $property['ukupna_vrijednost'] : "NA";
                    $mr = isset($property['mjesecna_rata']) ? $property['mjesecna_rata'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $od,
                        "bank" => $bank,
                        "total_value" => $ukupna_vrijednost,
                        "monthly_repayments" => $mr,

                    );
                    $return[] = $tmp;
                }

                foreach ($data_l as $property) {
                    $bank = isset($property['banka']) ? $property['banka'] : "NA";
                    $ukupna_vrijednost = isset($property['ukupna_vrijednost']) ? $property['ukupna_vrijednost'] : "NA";
                    $mr = isset($property['mjesecna_rata']) ? $property['mjesecna_rata'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $od,
                        "bank" => $bank,
                        "total_value" => $ukupna_vrijednost,
                        "monthly_repayments" => $mr,

                    );
                    $return[] = $tmp;
                }
            }
            return $return;
        }
        return array();
    }

    public function generate_securitas()
    {
        $data = $this->getSecuritas();
        return $this->generateCsv($data);
    }

    function getSecuritas()
    {
        $posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $return = array();
            foreach ($posts as $post) {

                $name = get_the_title($post->ID);

                $data_f = get_field("vlasnistvo_u_privrednim_drustvima_z", $post->ID);
                if (!is_array($data_f)) $data_f = array();


                $od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od", $post->ID));
                if ($od != false) {
                    $od = $od->format('Y');
                }

                $do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do", $post->ID));
                if ($do != false) {
                    $do = $do->format('Y');
                }

                foreach ($data_f as $property) {
                    $naziv_firme = isset($property['naziv_firme']) ? $property['naziv_firme'] : "NA";
                    $share = isset($property['udio']) ? $property['udio'] : "NA";
                    $vrijednost = isset($property['vrijednost']) ? $property['vrijednost'] : "NA";

                    $tmp = array(
                        "id" => $post->ID,
                        "slug" => $post->post_name,
                        "fullName" => $name,
                        "year" => $od,
                        "companyName" => $naziv_firme,
                        "share" => $share,
                        "worth" => $vrijednost,

                    );
                    $return[] = $tmp;
                }
            }
            return $return;
        }
        return array();
    }

    function generateCsv($data)
    {
        $fh = fopen('php://temp', 'rw');
		fprintf($fh, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fh, array_keys(current($data)));
        foreach ($data as $row) {
			fprintf($fh, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($fh, $row);
        }
        rewind($fh);
        $csv = stream_get_contents($fh);
        fclose($fh);

        return $csv;
    }
}

$csvExport = new CSVExport();