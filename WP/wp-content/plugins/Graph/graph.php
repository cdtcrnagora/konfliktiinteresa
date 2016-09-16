<?php

/*
Plugin Name: Grafovi Gotovi
Plugin URI: https://www.facebook.com/armin.kardovic
Description: Ovdje je spisak grafova 
Author: Armin Kardovic
Version: 1.00
Author URI: https://www.facebook.com/armin.kardovic
*/

class Graph_Widget extends WP_Widget
{

	private $listOfGraph = array(
		"1"=>"Prosjek po godinama", 
		"2"=>"Prosjek po godinama linearno", 
		"3"=>"Linearno Politicari",
		"4"=>"Politicar u odnosu na prosjek",
		"5"=>"Prosjecne plate u CG i funkcioneri"
	);
		
    // widget constructor
    public function __construct()
    {
        parent::__construct(
            'graph_widget',
            __('Grafovi', 'graph_widget'),
            array(
                'classname' => 'graph_widget',
                'description' => __('Politicari zadnji dodati', 'graph_widget')
            )
        );
    }

    public function widget($args, $instance)
    {
        extract($args);
		switch($instance['type']){
			case "1" :
				$primanja = $this->prosjecnaPrimanjaData();
				ksort($primanja);
				$tmp = array();
				foreach($primanja as $key=>$val) $tmp[] = array($key . "", round($val));
				$this->prosjekPoGodinama($tmp);
			break;
			
			case "2" :
				$primanja = $this->prosjecnaPrimanjaData();
				ksort($primanja);
				$tmp = array();
				foreach($primanja as $key=>$val) $tmp[] = array($key . "", round($val));
				$this->prosjekPoGodinamaLine($tmp);
			break;
			
			case "3":
			    $limit = isset($instance['limit']) ? $instance['limit'] : -1;
				$limit = intval($limit);
				$limit = (($limit < 1 ) ? $limit : -1);
				
				$ids = isset($instance['politicar_id']) ? trim($instance['politicar_id']) : "";
				
				$ids_search = array();
				if($ids == "" || $ids == null){
					$ids_search = array();
				} else {
					$pieces = explode(",", $ids);
					$ids_search = array_map(function($dd) { 
									return intval($dd);
								}, $pieces);
				}

				$data = $this->poredjenjePoliticaraData($limit, $ids_search);
				
				if(!isset($data[0]) || !isset($data[0]) ) return;
				$imena = array();

				foreach($data[0] as $key=>$val){
					$imena[] = isset($val['name']) ? $val['name'] : "";
				}
				
				$fullData = array();
				$tmp_data = $data[0];
				foreach($data[1] as $key=>$val){
					
					$v_year = array_map(function($dd) use ($val) { 
							return isset($dd['years'][$val]) ? intval($dd['years'][$val]) : 0;
					}, $tmp_data);
					
					$v_year = array_values($v_year);
					array_unshift($v_year , $val);
					$fullData[] = $v_year;
				}
			
				$this->linearniZaPoliticare($imena, $fullData);
			break;
			
			case "4" :
				$limit = isset($instance['limit']) ? $instance['limit'] : -1;
				$limit = intval($limit);
				$limit = (($limit < 1 ) ? $limit : -1);
				
				$ids = isset($instance['politicar_id']) ? trim($instance['politicar_id']) : "";
				
				$queried_object = get_queried_object();
				if ( $queried_object ) {
					$post_id = $queried_object->ID;
					if ( get_post_type( $queried_object->ID ) == 'politicar' ) {
						$ids  = $queried_object->ID;
					}
				}
				
				
				$ids_search = array();
				if($ids == "" || $ids == null){
					$ids_search = array();
				} else {
					$pieces = explode(",", $ids);
					$ids_search = array_map(function($dd) { 
									return intval($dd);
								}, $pieces);
				}

				$primanja = $this->prosjecnaPrimanjaData();
				$data = $this->poredjenjePoliticaraData($limit, $ids_search);
				
				if(!isset($data[0]) && !is_array($data[0])) return;

				$imena = array("PK"=>__("Prosjek", "cdt"));
				$data_full = array();
				foreach($primanja as $key=>$val) {
					
					$tmpArr =  array($key . "");
					$tmpArr[] = isset($primanja[$key]) ? intval($primanja[$key]) : 0;
					
					foreach($data[0] as $user){
						$imena[$user["name"]] = $user["name"];
						$tmpArr[] = isset($user["years"][$key]) ? intval($user["years"][$key]) : 0;
					}
					
					$data_full[] = $tmpArr;
				}
				$imena = array_values($imena);
				$this->linearniZaPoliticare($imena, $data_full);
			break;
			
			case "5" :
				$limit = isset($instance['limit']) ? $instance['limit'] : -1;
				$limit = intval($limit);
				$limit = (($limit < 1 ) ? $limit : -1);
				
				$ids = isset($instance['politicar_id']) ? trim($instance['politicar_id']) : "";
				
				$queried_object = get_queried_object();
				if ( $queried_object ) {
					$post_id = $queried_object->ID;
					if ( get_post_type( $queried_object->ID ) == 'politicar' ) {
						$ids  = $queried_object->ID;
					}
				}
				
				
				$ids_search = array();
				if($ids == "" || $ids == null){
					$ids_search = array();
				} else {
					$pieces = explode(",", $ids);
					$ids_search = array_map(function($dd) { 
									return intval($dd);
								}, $pieces);
				}

				$primanja = $this->prosjecnaPrimanjaData();

				$data = array(
					array("20"=>array(
						"name"=>"Prosječna primanja u CG",
						"years"=>array(
							"2006"=> "282",
							"2007"=> "338",
							"2008"=> "416",
							"2009"=> "463",
							"2010"=> "479",
							"2011"=> "484",
							"2012"=> "497",
							"2013"=> "486",
							"2014"=> "484", 
							"2015"=> "489",
							"2016"=> "489"
							)
					))
				);

				if(!isset($data[0]) && !is_array($data[0])) return;

				$imena = array("PK"=>__("Prosjek funkcionera", "cdt"));
				$data_full = array();
				foreach($primanja as $key=>$val) {
					
					$tmpArr =  array($key . "");
					$tmpArr[] = isset($primanja[$key]) ? intval($primanja[$key]) : 0;
					
					foreach($data[0] as $user){
						$imena[$user["name"]] = $user["name"];
						$tmpArr[] = isset($user["years"][$key]) ? intval($user["years"][$key]) : 0;
					}
					
					$data_full[] = $tmpArr;
				}
				$imena = array_values($imena);
				$this->prosjecnePlate($imena, $data_full);
			break;
			
			default:
				$this->prosjekPoGodinama();
		}
    }
	
	private function prosjecnaPrimanjaData(){
		$posts = get_posts(array(
            'post_type' => 'politicar',
            'posts_per_page' => -1,
        ));

        if ($posts) {
            $politicari = array();
            $years = array();
            foreach ($posts as $post) {
				
				$data_pol = get_field("prosjecna_mjesecna_primanja", $post->ID);
				if(!is_array($data_pol)) $data_pol = array();

				$godine = array();
				
                foreach ($data_pol as $year_data) {
					$year_d = isset($year_data['godina']) ? $year_data['godina'] : "";
					$value_d = isset($year_data['prihod']) ? $year_data['prihod'] : "";
                    $years[] = $year_d;
                    $godine[$year_d] = $value_d;
                }
				
				if(is_array($godine)) ksort($godine);
				
                $politicari[$post->ID] = array("years" => $godine);
            }

            asort($years);
            $years = array_unique($years);
			$zaGodinu = array();
			$kolicina = array();
			foreach ($politicari as $politicar) {
                foreach($years as $year){
                    $y = isset($politicar['years'][$year]) ? floatval($politicar['years'][$year]) : 0;
					
					if($y != 0 ) {
						if(isset($kolicina[$year])) {
							$kolicina[$year] = $kolicina[$year] + 1;
						} else {
							$kolicina[$year] = 1;
						}
					}
					
					$zaGodinu[$year] = isset($zaGodinu[$year]) ? ($zaGodinu[$year] + $y) : $y;
                }
            }
			array_walk( $zaGodinu, function(&$a, $b) use ($kolicina) { 
					$num = (isset($kolicina[$b]) ? $kolicina[$b] : 1);
					$a = round(($a / $num),2);
			});
			return $zaGodinu;
		}
		return array();
		
	}
	
	private function poredjenjePoliticaraData($limit = -1, $ids = array()) {
		
		$args = array(
            'post_type' => 'politicar',
            'posts_per_page' => $limit,
        );
		
		if(count($ids) > 0 && is_array($ids)) $args['post__in'] = $ids;
		
		$posts = get_posts($args);
		
        if ($posts) {
            $politicari = array();
            $years = array();
            foreach ($posts as $post) {
				
				$data_pol = get_field("prosjecna_mjesecna_primanja", $post->ID);
				if(!is_array($data_pol)) $data_pol = array();

				$godine = array();
				
                foreach ($data_pol as $year_data) {
					$year_d = isset($year_data['godina']) ? $year_data['godina'] : "";
					$value_d = isset($year_data['prihod']) ? $year_data['prihod'] : "";
                    $years[] = $year_d;
                    $godine[$year_d] = $value_d;
                }
				
				if(is_array($godine)) ksort($godine);
				
                $politicari[$post->ID] = array("name"=>get_the_title($post->ID), "years" => $godine);
            }
			asort($years);
            $years = array_unique($years);
			return array($politicari, $years);
		}
		return array();
	}
	
	
	private function prosjekPoGodinama($primanja = array()){
		$id = "prosjek_po_god_" . rand(0, 999999);
		?>
		<div id="<?= $id ?>" style="width: 100%; height: 370px; margin: 15px 0px"> </div>
		<script>
			google.charts.setOnLoadCallback(drawStuff);
			function drawStuff() {
				
				var data = new google.visualization.DataTable();
				//data.addColumn('string', '<?php _e("Godina", "cdt"); ?>');
				data.addColumn('string', '');
				data.addColumn('number', '<?php _e("Primanja", "cdt"); ?>');
				data.addRows(<?php print json_encode($primanja); ?>);

				var options = {
				  //title: '<?php _e("Prosjek primanja po godinama", "cdt"); ?>',
				  legend: { position: 'none' },
				  colors: ['#ffb21e'],
				  vAxis: {format: 'decimal'},
				  bar: { groupWidth: "90%" }
				};
				var chart = new google.charts.Bar(document.getElementById('<?= $id ?>'));
				chart.draw(data, google.charts.Bar.convertOptions(options));
			};
		</script>
		<?php
	}
	
	private function prosjekPoGodinamaLine($primanja = array()){
		$id = "prosjek_po_god_line_" . rand(0, 999999);
		?>
		<div id="<?= $id ?>" style="width: 100%; height: 400px;"> </div>
		<script>
			google.charts.setOnLoadCallback(drawBasic);
			function drawBasic() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'X');
				data.addColumn('number', '<?php _e("Primanja", "cdt"); ?>');

				data.addRows(<?php print json_encode($primanja); ?>);

				var options = {
					hAxis: {
					  title: '<?php _e("Godina", "cdt"); ?>'
					},
					vAxis: {
					  title: '<?php _e("Primanja", "cdt"); ?>',
					  format: 'decimal'
					},
					colors: ['#ffb21e']
				};

				var chart = new google.visualization.LineChart(document.getElementById('<?= $id ?>'));
				chart.draw(data, options);
		  
			}
		</script>
		<?php
	}
	
	private function linearniZaPoliticare($imena = array(), $fullData = array()){
		$id = "linearni_za_politicare_" . rand(0, 999999);
		?>
		<div id="<?= $id ?>" style="width: 100%; height: 400px;"> </div>
		<script>
			google.charts.setOnLoadCallback(drawBasic);
			function drawBasic() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Godina');
				<?php
					foreach($imena as $ime) {
						?>
							data.addColumn('number', '<?= $ime ?>');
						<?php
					}
				?>

				var posLeg = (window.innerWidth < 620) ? "top" : "right";
				
				data.addRows(<?php print json_encode($fullData); ?>);

				var options = {
					chart: {
					  title: 'Poređenje funkcionera'
					},
			
					hAxis: {
					  title: '<?php _e("Godina", "cdt"); ?>'
					},
					vAxis: {
					  title: '<?php _e("Primanja", "cdt"); ?>',
					  format: 'decimal'
					},
					
					legend: { position: posLeg }
				};

				var chart = new google.visualization.LineChart(document.getElementById('<?= $id ?>'));
				chart.draw(data, options);
			}
		</script>
		<?php
	}
	
	private function prosjecnePlate($imena = array(), $fullData = array()){
		$id = "prosjecne_plate_" . rand(0, 999999);
		?>
		<div id="<?= $id ?>" style="width: 100%; height: 400px;"> </div>
		<script>
			google.charts.setOnLoadCallback(drawBasic);
			function drawBasic() {
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Godina');
				<?php
					foreach($imena as $ime) {
						?>
							data.addColumn('number', '<?= $ime ?>');
						<?php
					}
				?>

				var posLeg = (window.innerWidth < 620) ? "top" : "right";
				
				data.addRows(<?php print json_encode($fullData); ?>);

				var options = {
					chart: {
					  title: 'Poređenje funkcionera'
					},
			
					hAxis: {
					 // title: '<?php _e("Godina", "cdt"); ?>'
					},
					vAxis: {
					  //title: '<?php _e("Primanja", "cdt"); ?>',
					  format: 'decimal'
					},
					chartArea: {'width': '80%', 'height': '80%'},					
					legend: { position: "top" }

				};

				var chart = new google.visualization.LineChart(document.getElementById('<?= $id ?>'));
				chart.draw(data, options);
			}
		</script>
		<?php
	}
	
	public function form($instance) 
	{
        $defaults = array(
            'type' => __('1', 'graph_widget')
        );
        $instance = wp_parse_args((array)$instance, $defaults); ?>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Izaberite tip:', 'graph_widget'); ?></label>
			<select class='widefat' id="<?php echo $this->get_field_id('type'); ?>"
                name="<?php echo $this->get_field_name('type'); ?>" type="text">
				
				<?php foreach ($this->listOfGraph as $key=>$val) { ?>
					<option value='<?= $key ?>' <?= ($key==$instance['type'])?'selected':''; ?>><?= $val ?></option>
				<?php } ?>
				
			</select>
        </p>
		
		 <?php 
		 if("3" == $instance['type'] || "4" == $instance['type'] ) {
				?>
				<p>
					<label for="<?php echo $this->get_field_id('politicar_id'); ?>"><?php _e('Unesite id funkcionera:', 'graph_widget'); ?></label>
					<input id="<?php echo $this->get_field_id('politicar_id'); ?>"
						   name="<?php echo $this->get_field_name('politicar_id'); ?>"
						   value="<?php echo $instance['politicar_id']; ?>"
						   style="width:100%;"/>
				</p>
				
				<p>
					<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Unesite max broj funkcionera:', 'graph_widget'); ?></label>
					<input id="<?php echo $this->get_field_id('limit'); ?>"
						   name="<?php echo $this->get_field_name('limit'); ?>"
						   value="<?php echo $instance['limit']; ?>"
						   style="width:100%;"/>
				</p>
				<?php
		 }?>
		 
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['type'] = strip_tags($new_instance['type']);
		$instance['limit'] = strip_tags($new_instance['limit']);
		$instance['politicar_id'] = strip_tags($new_instance['politicar_id']);
        return $instance;
    }

}

add_action('widgets_init', function () {
    register_widget('Graph_Widget');
});
