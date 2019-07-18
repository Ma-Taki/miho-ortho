<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
<link rel="shortcut icon" href="/wp/wp-content/uploads/2018/12/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.min.css" type="text/css" />	
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>">	
<script src="<?php bloginfo('template_url');?>/js/jquery-1.11.2.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/jquery.matchHeight-min.js"></script>
<script src="<?php bloginfo('template_url');?>/js/common.js"></script>

<?php wp_head(); ?>
<?php //echo get_option('analytics_tracking_code');?>
</head>

<body <?php body_class();?>>

<!-- spNavBtn -->
<a id="spMenuBtn" href="javascript:void(0);">
<p>
<span></span>
<span></span>
<span></span>
</p>
</a>
	
<div id="gNavSP">
	<div class="inr">
		<p class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">美帆矯正歯科クリニック</a></p>
		<p class="description"><?php bloginfo( 'description' ); ?></p>
		<div class="fs0">
			<?php wp_nav_menu( array('menu' => 'spNav' )); ?>
		</div>
		<p class="btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/reservation/">初診相談予約</a></p>
	</div>
</div>
<!-- /spNavBtn -->

<!-- #header -->
<header id="header">
	<div class="wrap">
		<div class="alignleft headLogo">
			<p><?php bloginfo( 'description' ); ?></p>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		
		<div class="alignright headNav fs0">
			<?php wp_nav_menu( array('menu' => 'headNav' )); ?>
		</div>
	</div>
	
	<nav id="nav" class="fs0">
		<?php wp_nav_menu( array('menu' => 'gNav' )); ?>
	</nav>
</header>
<!-- /#header -->





