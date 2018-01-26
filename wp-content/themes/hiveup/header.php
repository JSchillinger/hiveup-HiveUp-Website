<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?php wp_title('•', true, 'right'); bloginfo('name'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<div id="loading">
	<?php get_template_part('loading'); ?>
</div>

<body <?php body_class(); ?>>

<nav class="navbar navbar-expand-md fixed-top navbar-light" id="main-nav">
	<div class="container-fluid">
	  <!--<a class="navbar-brand" href="<#?php echo esc_url( home_url('/') ); ?>">-->
			<!--<#?php bloginfo('name'); ?>--><?php the_custom_logo(); ?>
		<!--</a>-->
		<div class="desktop-menu hidden-sm">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <?php
		      wp_nav_menu( array(
		        'theme_location'	=> 'navbar',
		        'container'       => false,
		        'menu_class'		  => '',
		        'fallback_cb'		  => '__return_false',
		      	'items_wrap'		  => '<ul id="%1$s" class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
		        'depth'			      => 2,
			      'walker'  	      => new hiveup_walker_nav_menu()
		      ) );
		    ?>
		    <!-- <#?php get_template_part('navbar-search'); ?> -->

		  </div>

		</div>
		<?php
		wp_nav_menu( array(
				'theme_location' => 'social-links',
				'container_class' => 'custom-menu-class' ) );
		?>

		<div class="mobile-menu">
			<div class="open-menu"><span class="navbar-toggler-icon"></span></div>
		</div>
	</div>
</nav>


<!-- Overlay Navigation Menu -->
<div class="overlay">
	<nav class="navbar navbar-expand-md">
	<div class="container-fluid">
		<?php the_custom_logo(); ?>
		<div class="close-menu"><i class="fa fa-times" aria-hidden="true"></i></div>
	</div>
	</nav>

  <nav class="navbar-nav overlay-menu">
		<?php
			wp_nav_menu( array(
				'theme_location'	=> 'navbar',
				'container'       => false,
				'menu_class'		  => '',
				'fallback_cb'		  => '__return_false',
				'items_wrap'		  => '<ul id="%1$s" class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
				'depth'			      => 2,
				'walker'  	      => new hiveup_walker_nav_menu()
			) );
		?>
		<!-- <#?php get_template_part('navbar-search'); ?> -->

		<?php
		wp_nav_menu( array(
				'theme_location' => 'social-links',
				'container_class' => 'mobile-custom-menu-class' ) );
		?>
  </nav>
</div>
