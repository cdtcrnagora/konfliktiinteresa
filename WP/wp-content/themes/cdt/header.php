<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js" lang="">
<!--<![endif]-->

<head>
	  <meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,900italic,900,700italic,700,500italic,500,400italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive-tables.css">
	
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

    <script>
	(window.google || {}).charts || document.write('\
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><\/script>\
	  <script> google.charts.load("current", {"packages":["corechart", "line", "bar"]});<\/script>')
	</script>
</head>

<body <?php body_class(); ?> >
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



<header id="header">
		<div class="container">
				<div class="col-xs-8 col-sm-3 col-md-2 logo">
						<div class="logo-image logo-control">
								<a href="<?php echo home_url(); ?>" title="Konflikt Interesa">
										<img class="logo-img animated  flipInX" src="<?php echo get_template_directory_uri(); ?>/images/Logo-h.png" alt="Konflikt in interesa">
										<span>Konflikt in interesa</span>
								</a>
						</div>
				</div>

				<div class="col-xs-4 col-sm-9 col-md-10">
						<div id="nav-icon3" class="toggle-panel h-menu">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
						</div>
						<div class="main-nav hidden-xs hidden-sm anim-tor">
							<?php if ( has_nav_menu( 'main-menu' ) ) { ?>
							     <?php wp_nav_menu( array('theme_location' => 'main-menu','container' => false, 'walker' => new Class_Name_Walker ) ); ?>
							<?php } ?>
						</div>
				</div>
		</div>
</header>
