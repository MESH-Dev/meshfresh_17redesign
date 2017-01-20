<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php if(is_home() || is_front_page()){ bloginfo('name'); ?> | <?php bloginfo('description'); }else{ wp_title(''); ?> | <?php bloginfo('name'); } ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/assets/img/touch-icon-ipad-retina.png" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,700,800" rel="stylesheet">

	<!-- Memphis font -->
	<script type="text/javascript" src="http://fast.fonts.net/jsapi/2cc1f66a-61d9-44d7-9b16-40e651bd3c09.js"></script>
	<!-- Raleway font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500" rel="stylesheet">

	<?php wp_head(); ?>
</head>
<body <?php echo body_class(); ?>>
<!-- <div id="mobileMenu" class="mobile">
	<div class="">
		<div class="close">CLOSE</div>
		<?php $defaults = array(
				'theme_location'  => 'main-nav',
				'menu'            => 'main-nav',
				'container'       => 'nav',
				'container_class' => '',
				'container_id'    => 'mainNav',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			); wp_nav_menu( $defaults ); ?>
	</div>
</div> -->

<div id="sayHello" class="cf">
	<div class="container">
		<div class="row">
			<div class="sh">
				<div class="title">Say Hello!</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						<strong>Brooklyn Studio</strong><br>
						67 West Street, Suite 403<br>
						Brooklyn, New York 11222<br>
					</div>
				</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						<strong>Charleston Studio</strong><br>
						609 Tennessee Ave.<br>
						Charleston, West Virginia 25302<br>
			 
					</div>
				</div>
				<div class="columns-4 loc">
					<div class=""><!-- gutter -->
						Inquiries, please email:<br>
						<strong><a href="mailto:hello@meshfresh.com">hello@meshfresh.com</a></strong>
					</div>
				</div>
			</div>
		</div>
		<div id="sayHello-caret"></div>
	</div>
</div> 
<div id="siteWrap">
<header <?php if (is_page_template('templates/tpl-frontpage-alt.php')){ echo 'class="new"';} //remove this when page is live?> >
	<div class="container">
		<div class="row">
		<div class="gateway-nav">
					<div class="say-hello">
						Say Hello
					</div>
						<?php $defaults = array(
							'theme_location'  => 'social-nav',
							'menu'            => 'social-nav',
							'container'       => 'nav',
							'container_class' => '',
							'container_id'    => 'social',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '<span class="sr-only">',
							'link_after'      => '</span>',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						); wp_nav_menu( $defaults ); ?>
				
				</div>
		<div class="columns-12"><!-- gutter cf -->
				<div id="logo">
					<a href="<?php echo bloginfo('url'); ?>"><img src="<?php echo header_image(); ?>" /></a>
				</div>
				<div class="sidr-nav">
					<div class="sidr-close">CLOSE</div>
				<?php $defaults = array(
						'theme_location'  => 'main-nav',
						'menu'            => 'main-nav',
						'container'       => 'nav',
						'container_class' => '',
						'container_id'    => 'mainNav',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					); wp_nav_menu( $defaults ); ?>
				</div>
				<div id="menuTrigger" class="mobile sidr-trigger">
					Menu
				</div>
				
			</div>
		</div>
	</div>
</header>
