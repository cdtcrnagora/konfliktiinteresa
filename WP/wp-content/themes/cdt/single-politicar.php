<?php get_header(); ?>
<?php get_header("parallelax"); ?>


<div class="container single-politicar">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="page-header">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-9 col-xs-12">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<a href="#" class="thumbnail">
						<?php 
						
						$image = get_the_post_thumbnail(null, "profile-list"); 
						if(strlen(trim($image)) < 10) {
							$url = get_template_directory_uri() . "/images/avatar.png";
							$image = '<img width="335" height="213" src="' . $url . '" class="attachment-profile-list size-profile-list wp-post-image" alt="GetImage" />';
						}
						print $image;
						
						?>
					</a>
				</div>
                
				<div class="col-md-7 col-sm-12 col-xs-12 csx">

					<table class="table table-user-information">
						<tbody>
							<tr>
								<td style="width:60%;"><b>Funkcija: </b></td>
								<td>
								<?php
								    print get_field("funkcija");
								?>
								</td>
							</tr>
							
							<tr>
								<td><b>Ostale javne funkcije:</b></td>
								<td>
									<?php
								    $func = get_field("ostale_javne_funkcije");
									
									if(!is_array($func)) $func = array();
									foreach($func as $ni) {
										print_r($ni['funkcija'] . "<br/>");
									}
								?>
								</td>
							</tr>
							
							<tr>
								<td><b>Period obavljanja funkcije:</b></td>
								<?php
								$od = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_od"));
								if($od != false) {
									$od = $od->format('Y');
								}
								
								$do = DateTime::createFromFormat('d/m/Y', get_field("period_obavljanja_funkcije_do"));
								if($do != false) {
									$do = $do->format('Y');
								}
								
								?>
								<td><?php
										$trenutna = (get_field("trenutno_na_funkciji") == "da") ? __("Trenutno", "cdt") : $do;
										
										$pocetna = get_field("poceo_u_godini");
										$pocetna = (strlen($pocetna) > 3) ? $pocetna : $od;
										print $pocetna  . " - " . $trenutna ;
									?>
								</td>
							</tr>
							
							<tr>
								<td><b>Dodatni prihodi:</b></td>
								<td>
									<?php
								    $func = get_field("dodatni_prihodi");
									
									if(!is_array($func)) $func = array();
									foreach($func as $ni) {
										print_r($ni['prihod'] . "<br/>");
									}
								?>
								</td>
							</tr>
							
							<tr>
								<td colspan="2"><b>Prosječna primanja u periodu obavljanja funkcije:</b></td>
							</tr>
							<tr>
								<td><b>Mjesecna: </b><?php
										 print @number_format (get_field("prosjecna_mjesecna_primanja_u_periodu_obavljanja_funkcije"));
								?></td>
								<td><b>Godisnja: </b><?php
										 print @number_format (get_field("prosjecna_godisnja_primanja_u_periodu_obavljanja_funkcije"));
									?></td>
							</tr>

						</tbody>
					</table>

				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<?php if ( is_active_sidebar( 'funkcioner-single' ) ) : ?>
							<?php dynamic_sidebar( 'funkcioner-single' ); ?>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h2 class="year-h"><?php _e("Prosječna mjesečna primanja", "cdt");?></h2>
					<div class="table-responsive">
					    <?php
							$data = get_field("prosjecna_mjesecna_primanja");
							if(!is_array($data)) $data = array();
							
							$tmp = array();
							foreach($data as $year_data) {
								$year_d = isset($year_data['godina']) ? $year_data['godina'] : "";
								$value_d = isset($year_data['prihod']) ? $year_data['prihod'] : "";
								$tmp[$year_d] = $value_d;
							}
							ksort($tmp);
						?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<?php
										foreach($tmp as $key=>$val){
										?>
											<td>
												<b><?= $key ?></b>
											</td>
										<?php
										}
									?>
									</tr>
							</thead>
							<tbody>
								<tr>
									<?php
										foreach($tmp as $key=>$val){
										?>
											<td>
												<?= @number_format ($val) ?>
											</td>
										<?php
										}
									?>
								</tr>
							</tbody>
						</table> 
					</div>
				</div>	
			</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="year-h"><?php _e("Nepokretna imovina", "cdt");?></h2>
			</div>
			<?php
					$data_f = get_field("nepokretna_imovina");
					if(!is_array($data_f)) $data_f = array();
					
					$data_l = get_field("nepokretna_imovina_z");
					if(!is_array($data_l)) $data_l = array();
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $od ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Vrsta imovine", "cdt");?> <b></td>
									<td><b><?php _e("Površina m2", "cdt");?> <b></td>
									<td><b><?php _e("Mjesto", "cdt");?> <b></td>
									<td><b><?php _e("Udio", "cdt");?><b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_f as $first) { ?>
									<tr>
										<td><?php print isset($first['vrsta_imovine']) ? $first['vrsta_imovine'] : "" ; ?></td>
										<td><?php print isset($first['povrsina_m2']) ? $first['povrsina_m2'] : "" ; ?></td>
										<td><?php print isset($first['mjesto']) ? $first['mjesto'] : "" ; ?></td>
										<td><?php print isset($first['udio']) ? $first['udio'] : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $do ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Vrsta imovine", "cdt");?> <b></td>
									<td><b><?php _e("Površina m2", "cdt");?> <b></td>
									<td><b><?php _e("Mjesto", "cdt");?> <b></td>
									<td><b><?php _e("Udio", "cdt");?><b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_l as $first) { ?>
									<tr>
										<td><?php print isset($first['vrsta_imovine']) ? $first['vrsta_imovine'] : "" ; ?></td>
										<td><?php print isset($first['povrsina_m2']) ? $first['povrsina_m2'] : "" ; ?></td>
										<td><?php print isset($first['mjesto']) ? $first['mjesto'] : "" ; ?></td>
										<td><?php print isset($first['udio']) ? $first['udio'] : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="year-h"><?php _e("Pokretna imovina", "cdt");?></h2>
			</div>
			<?php
					$data_f = get_field("pokretna_imovina");
					if(!is_array($data_f)) $data_f = array();
					
					$data_l = get_field("pokretna_imovina_z");
					if(!is_array($data_l)) $data_l = array();
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $od ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Vrsta imovine", "cdt");?> <b></td>
									<td><b><?php _e("Godina proizvodnje", "cdt");?> <b></td>
									<td><b><?php _e("Vrijednost/količina", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_f as $first) { ?>
									<tr>
										<td><?php print isset($first['vrsta_imovine']) ? $first['vrsta_imovine'] : "" ; ?></td>
										<td><?php print isset($first['godina_proizvodnje']) ? $first['godina_proizvodnje'] : "" ; ?></td>
										<td><?php print isset($first['vrijednost_kolicina']) ? $first['vrijednost_kolicina'] : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
				
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $do ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Vrsta imovine", "cdt");?> <b></td>
									<td><b><?php _e("Godina proizvodnje", "cdt");?> <b></td>
									<td><b><?php _e("Vrijednost/količina", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_l as $first) { ?>
									<tr>
										<td><?php print isset($first['vrsta_imovine']) ? $first['vrsta_imovine'] : "" ; ?></td>
										<td><?php print isset($first['godina_proizvodnje']) ? $first['godina_proizvodnje'] : "" ; ?></td>
										<td><?php print isset($first['vrijednost_kolicina']) ? $first['vrijednost_kolicina'] : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="year-h"><?php _e("Vlasništvo u privrednim društvima", "cdt");?></h2>
			</div>
			<?php
					$data_f = get_field("vlasnistvo_u_privrednim_drustvima");
					if(!is_array($data_f)) $data_f = array();
					
					$data_l = get_field("vlasnistvo_u_privrednim_drustvima_z");
					if(!is_array($data_l)) $data_l = array();
			?>
			<!--
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $od ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Naziv firme", "cdt");?> <b></td>
									<td><b><?php _e("Udio", "cdt");?> <b></td>
									<td><b><?php _e("Vrijednost", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_f as $first) { ?>
									<tr>
										<td><?php print isset($first['naziv_firme']) ? $first['naziv_firme'] : "" ; ?></td>
										<td><?php print isset($first['udio']) ? $first['udio'] : "" ; ?></td>
										<td><?php print isset($first['vrijednost']) ? @number_format($first['vrijednost']) : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
				
			</div>
			-->
			<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $do ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Naziv firme", "cdt");?> <b></td>
									<td><b><?php _e("Udio", "cdt");?> <b></td>
									<td><b><?php _e("Vrijednost", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_l as $first) { ?>
									<tr>
										<td><?php print isset($first['naziv_firme']) ? $first['naziv_firme'] : "" ; ?></td>
										<td><?php print isset($first['udio']) ? $first['udio'] : "" ; ?></td>
										<td><?php print isset($first['vrijednost']) ? @number_format ($first['vrijednost']) : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2 class="year-h"><?php _e("Kredit", "cdt");?></h2>
			</div>
			<?php
					$data_f = get_field("kredit");
					if(!is_array($data_f)) $data_f = array();
					
					$data_l = get_field("kredit_z");
					if(!is_array($data_l)) $data_l = array();
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $od ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Banka", "cdt");?> <b></td>
									<td><b><?php _e("Ukupna vrijednost", "cdt");?> <b></td>
									<td><b><?php _e("Mjesečna rata", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_f as $first) { ?>
									<tr>
										<td><?php print isset($first['banka']) ? $first['banka'] : "" ; ?></td>
										<td><?php print isset($first['ukupna_vrijednost']) ? $first['ukupna_vrijednost'] : "" ; ?></td>
										<td><?php print isset($first['mjesecna_rata']) ? @number_format ($first['mjesecna_rata']) : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td colspan="4"><b><?php _e("Godina", "cdt");?> - <?= $do ?><b></td>
								</tr>
								<tr>
									<td><b><?php _e("Banka", "cdt");?> <b></td>
									<td><b><?php _e("Ukupna vrijednost", "cdt");?> <b></td>
									<td><b><?php _e("Mjesečna rata", "cdt");?> <b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_l as $first) { ?>
									<tr>
										<td><?php print isset($first['banka']) ? $first['banka'] : "" ; ?></td>
										<td><?php print isset($first['ukupna_vrijednost']) ?  $first['ukupna_vrijednost']: "" ; ?></td>
										<td><?php print isset($first['mjesecna_rata']) ? @number_format ($first['mjesecna_rata']) : "" ; ?></td>
									</tr>
								<?php } ?>
								
							</tbody>
						</table> 
				</div>
			</div>
			
			<?php 
				$napomena = get_field("napomena");
				if(strlen($napomena)>5) { ?>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h2 class="year-h"><?php _e("Napomena", "cdt");?></h2>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="napomena">
								<?= $napomena ?>
							</div>
						</div>
			<?php } ?>

			
		</div>
			<?php endwhile; ?>
		</div>

		<div class="col-md-3 col-xs-12">
			<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
				 <?php dynamic_sidebar( 'sidebar-page' ); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php else: ?>
	<div>
		<h2><?php _e( 'Sorry, nothing to display.', 'cdt' ); ?></h2>
	</div>
	<?php endif; ?>


</div>
<?php get_footer(); ?>